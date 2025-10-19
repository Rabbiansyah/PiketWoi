<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Jadwal Piket
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('status'))
                        <div class="mb-4 text-green-600">{{ session('status') }}</div>
                    @endif

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Minggu: {{ $start->format('d M Y') }} - {{ $end->format('d M Y') }}</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($weekDays as $wd)
                            <div class="border rounded-md p-4" data-day-card data-date="{{ $wd['date'] }}">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="font-semibold">{{ ucfirst($wd['label']) }} • {{ \Carbon\Carbon::parse($wd['date'])->format('d M Y') }}</h4>
                                </div>

                                <ul class="list-disc pl-5 mb-3 min-h-6" data-day-list>
                                    @forelse ($wd['items'] as $j)
                                        <li data-user-item data-user-id="{{ $j->user->id }}">
                                            {{ $j->user->name }} <span class="text-gray-500">({{ $j->user->kelas }} • {{ $j->user->jurusan }})</span>
                                            @if ($authUser && $authUser->role === 'admin')
                                                <button type="button" class="ml-2 text-red-600 text-xs" data-remove-user>&times; hapus</button>
                                            @endif
                                        </li>
                                    @empty
                                        <li class="text-sm text-gray-500" data-empty-note>Belum ada nama piket.</li>
                                    @endforelse
                                </ul>

                                @if ($authUser && $authUser->role === 'admin')
                                    <div class="mt-2" data-admin-input>
                                        <button type="button" class="inline-flex items-center px-3 py-2 bg-gray-100 text-gray-800 text-sm font-medium rounded hover:bg-gray-200" data-add-user>
                                            + tambahkan siswa piket
                                        </button>
                                        <div class="mt-2 hidden" data-select-wrap>
                                            <label class="block text-sm font-medium mb-1">Pilih satu siswa</label>
                                            <select class="w-full border rounded p-2" data-select-one>
                                                <option value="">-- pilih siswa --</option>
                                                @foreach ($allUsers as $u)
                                                    <option value="{{ $u->id }}" data-user-name="{{ $u->name }}" data-user-kelas="{{ $u->kelas }}" data-user-jurusan="{{ $u->jurusan }}">{{ $u->name }} ({{ $u->kelas }} • {{ $u->jurusan }})</option>
                                                @endforeach
                                            </select>
                                            <div class="flex gap-2 mt-2">
                                                <button type="button" class="px-3 py-2 bg-blue-600 text-white text-sm rounded" data-confirm-add>Tambah</button>
                                                <button type="button" class="px-3 py-2 bg-gray-200 text-sm rounded" data-cancel-add>Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    @if ($authUser && $authUser->role === 'admin')
                        <form method="POST" action="{{ route('piket.jadwal.storeBulk') }}" id="bulkForm" class="mt-6">
                            @csrf
                            <div id="hiddenInputs"></div>
                            <button type="submit" id="saveAllBtn" class="inline-flex items-center px-4 py-2 bg-slate-900 text-white text-sm font-medium rounded hover:bg-slate-800">
                                Simpan semua hari
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if ($authUser && $authUser->role === 'admin')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const used = new Set(); // user IDs terpakai di salah satu hari
        const dayCards = Array.from(document.querySelectorAll('[data-day-card]'));
        const hiddenInputs = document.getElementById('hiddenInputs');
        const saveAllBtn = document.getElementById('saveAllBtn');

        // Ambil existing assignments dari DOM (server-rendered)
        dayCards.forEach(card => {
            const date = card.getAttribute('data-date');
            const items = card.querySelectorAll('[data-user-item]');
            items.forEach(li => {
                const uid = li.getAttribute('data-user-id');
                used.add(uid);
                addHidden(date, uid);
            });
        });

        // Inisialisasi state tombol simpan
        updateSaveEnabled();

        // Setup interaksi per kartu/hari
        dayCards.forEach(card => setupDayCard(card));

        function setupDayCard(card) {
            const date = card.getAttribute('data-date');
            const list = card.querySelector('[data-day-list]');
            const emptyNote = card.querySelector('[data-empty-note]');
            const addBtn = card.querySelector('[data-add-user]');
            const selectWrap = card.querySelector('[data-select-wrap]');
            const select = card.querySelector('[data-select-one]');
            const confirmAdd = card.querySelector('[data-confirm-add]');
            const cancelAdd = card.querySelector('[data-cancel-add]');

            // Render opsi select awal dan setiap kali state berubah
            function refreshSelectOptions() {
                if (!select) return;
                Array.from(select.options).forEach(opt => {
                    if (!opt.value) return; // placeholder
                    const uid = opt.value;
                    opt.disabled = used.has(uid);
                });
                // Reset pilihan
                select.value = '';
            }

            function showSelect() {
                refreshSelectOptions();
                selectWrap.classList.remove('hidden');
                select.focus();
            }
            function hideSelect() {
                selectWrap.classList.add('hidden');
            }

            addBtn && addBtn.addEventListener('click', showSelect);
            cancelAdd && cancelAdd.addEventListener('click', hideSelect);

            confirmAdd && confirmAdd.addEventListener('click', () => {
                const uid = select.value;
                if (!uid) return;

                // Temukan label dari option
                const opt = select.querySelector(`option[value="${uid}"]`);
                const name = opt?.dataset.userName || 'User';
                const kelas = opt?.dataset.userKelas || '';
                const jurusan = opt?.dataset.userJurusan || '';

                // Tambahkan ke list tampilan
                if (emptyNote) emptyNote.remove();
                const li = document.createElement('li');
                li.setAttribute('data-user-item', '');
                li.setAttribute('data-user-id', uid);
                li.innerHTML = `${name} <span class="text-gray-500">(${kelas} • ${jurusan})</span> <button type="button" class="ml-2 text-red-600 text-xs" data-remove-user>&times; hapus</button>`;
                list.appendChild(li);

                // Tambahkan hidden input
                addHidden(date, uid);

                // Tandai user terpakai dan refresh semua select di semua hari
                used.add(uid);
                document.querySelectorAll('[data-select-one]').forEach(sel => {
                    Array.from(sel.options).forEach(o => {
                        if (!o.value) return;
                        o.disabled = used.has(o.value);
                    });
                });

                // Bind tombol hapus untuk item baru
                bindRemove(li, date, uid);

                // Tutup select dan update save button
                hideSelect();
                updateSaveEnabled();
            });

            // Bind tombol hapus untuk item yang sudah ada di server
            card.querySelectorAll('[data-remove-user]').forEach(btn => {
                const li = btn.closest('[data-user-item]');
                const uid = li.getAttribute('data-user-id');
                bindRemove(li, date, uid);
            });
        }

        function bindRemove(li, date, uid) {
            const btn = li.querySelector('[data-remove-user]');
            btn.addEventListener('click', () => {
                // Hapus hidden input terkait (satu untuk kombinasi date+uid)
                removeHidden(date, uid);
                // Lepas dari DOM
                li.remove();
                // Cek apakah uid masih dipakai di hari lain
                const stillUsedSomewhere = document.querySelector(`[data-user-item][data-user-id="${uid}"]`);
                if (!stillUsedSomewhere) {
                    used.delete(uid);
                    // Refresh semua select agar uid tersedia kembali
                    document.querySelectorAll('[data-select-one]').forEach(sel => {
                        Array.from(sel.options).forEach(o => {
                            if (!o.value) return;
                            o.disabled = used.has(o.value);
                        });
                    });
                }
                // Jika list kosong, tampilkan catatan kosong
                const card = li.closest('[data-day-card]');
                const list = card.querySelector('[data-day-list]');
                if (!list.querySelector('[data-user-item]')) {
                    const empty = document.createElement('li');
                    empty.className = 'text-sm text-gray-500';
                    empty.setAttribute('data-empty-note','');
                    empty.textContent = 'Belum ada nama piket.';
                    list.appendChild(empty);
                }
                updateSaveEnabled();
            });
        }

        function addHidden(date, uid) {
            const name = `user_ids[${date}][]`;
            const id = `hid-${date}-${uid}`;
            if (document.getElementById(id)) return;
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = name;
            input.value = uid;
            input.id = id;
            hiddenInputs.appendChild(input);
        }

        function removeHidden(date, uid) {
            const id = `hid-${date}-${uid}`;
            const el = document.getElementById(id);
            if (el) el.remove();
        }

        function updateSaveEnabled() {
            if (!saveAllBtn) return;
            saveAllBtn.disabled = false;
        }
    });
    </script>
    @endif
</x-app-layout>

