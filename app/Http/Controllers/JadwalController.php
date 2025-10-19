<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $base = $request->date ? Carbon::parse($request->date) : now();
        $start = $base->copy()->startOfWeek(Carbon::MONDAY);
        $end = $base->copy()->endOfWeek(Carbon::SUNDAY);

        $items = Jadwal::with('user')
            ->whereBetween('tanggal', [$start->toDateString(), $end->toDateString()])
            ->orderBy('tanggal')
            ->get()
            ->groupBy(fn($j) => Carbon::parse($j->tanggal)->toDateString());

        $weekDays = [];
        for ($i = 0; $i < 5; $i++) { // Senin-Jumat
            $d = $start->copy()->addDays($i);
            $iso = $d->toDateString();
            // Urutkan berdasarkan nama user (A-Z)
            $dayItems = $items->get($iso, collect())
                ->sortBy(function ($j) {
                    return strtolower($j->user->name ?? '');
                })
                ->values();

            $weekDays[] = [
                'date' => $iso,
                'label' => $d->locale('id')->dayName,
                'items' => $dayItems,
            ];
        }

        return view('pages.piket.jadwal', [
            'weekDays' => $weekDays,
            'allUsers' => User::orderBy('name')->get(),
            'start' => $start,
            'end' => $end,
            'authUser' => Auth::user(),
        ]);
    }

    public function store(Request $request)
    {
        $this->authorizeAdmin($request);

        $data = $request->validate([
            'tanggal' => ['required','date'],
            'user_ids' => ['required','array'],
            'user_ids.*' => ['exists:users,id'],
        ]);

        foreach ($data['user_ids'] as $uid) {
            Jadwal::firstOrCreate([
                'user_id' => $uid,
                'tanggal' => $data['tanggal'],
            ], [
                'status' => 'pending',
            ]);
        }

        return back()->with('status', 'Jadwal tersimpan.');
    }

    public function storeBulk(Request $request)
    {
        $this->authorizeAdmin($request);

        $data = $request->validate([
            'user_ids' => ['required','array'], // keyed by date => []
        ]);

        foreach ($data['user_ids'] as $date => $ids) {
            // validate date key
            try { Carbon::parse($date); } catch (\Exception $e) { abort(422, 'Tanggal tidak valid: '.$date); }
            if (!is_array($ids)) { abort(422, 'Format user_ids untuk tanggal '.$date.' tidak valid'); }

            // validate each id exists
            $validIds = User::whereIn('id', $ids)->pluck('id')->all();

            // Ambil yang sudah ada di DB untuk tanggal tsb
            $currentIds = Jadwal::whereDate('tanggal', $date)->pluck('user_id')->all();

            // Hitung perbedaan
            $toAdd = array_values(array_diff($validIds, $currentIds));
            $toDelete = array_values(array_diff($currentIds, $validIds));

            // Tambahkan yang baru
            foreach ($toAdd as $uid) {
                Jadwal::firstOrCreate([
                    'user_id' => $uid,
                    'tanggal' => $date,
                ], [
                    'status' => 'pending',
                ]);
            }

            // Hapus yang tidak lagi dipilih
            if (!empty($toDelete)) {
                Jadwal::whereDate('tanggal', $date)
                    ->whereIn('user_id', $toDelete)
                    ->delete();
            }
        }

        return back()->with('status', 'Jadwal semua hari tersimpan.');
    }

    private function authorizeAdmin(Request $request): void
    {
        if (!$request->user() || $request->user()->role !== 'admin') {
            abort(403);
        }
    }
}
