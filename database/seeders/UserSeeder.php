<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Aafiyah Balqis',
            'nis' => '202322060',
            'email' => 'afiyah@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Achmad Rizqi',
            'nis' => '202322061',
            'email' => 'iki@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Adhitya Chandra Nugraha',
            'nis' => '202322062',
            'email' => 'adit@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Ahmad Alif Badawi',
            'nis' => '202322063',
            'email' => 'alip@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Ahmad Anthoni',
            'nis' => '202322064',
            'email' => 'anton@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Aldyan Saputra',
            'nis' => '202322065',
            'email' => 'aldy@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Alvin Christian Farrell',
            'nis' => '202322066',
            'email' => 'alvin@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Araechpaet R. Gading',
            'nis' => '202322067',
            'email' => 'arapah@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Arga Pratama',
            'nis' => '202322068',
            'email' => 'arga@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Arsya Brilliant Perdana',
            'nis' => '202322069',
            'email' => 'arsya@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Bintang Dwi Anggara',
            'nis' => '202322070',
            'email' => 'bintang@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Driyo Uno Pandu Handoyo',
            'nis' => '202322071',
            'email' => 'driyo@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Duvadilan Davin Rheyadi',
            'nis' => '202322072',
            'email' => 'dilan@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Elgin Meysa Espandiani',
            'nis' => '202322073',
            'email' => 'elgin@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Fahri Ramadhan Gani',
            'nis' => '202322074',
            'email' => 'gani@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Faiz Asfar Triansyah',
            'nis' => '202322075',
            'email' => 'faiz@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'developer',
        ]);

        User::create([
            'name' => 'Gunawan Madia Pratama',
            'nis' => '202322076',
            'email' => 'gunawan@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'developer',
        ]);

        User::create([
            'name' => 'Hanna Nailah Ansaria',
            'nis' => '202322077',
            'email' => 'hanna@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Ilham Sikumbang',
            'nis' => '202322078',
            'email' => 'ilham@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Imanuel Halim',
            'nis' => '202322079',
            'email' => 'manuel@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Keisha Rainuri Wihandy',
            'nis' => '202322080',
            'email' => 'keisha@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'M. Pasha Praba Sakti Hutabarat',
            'nis' => '202322081',
            'email' => 'pasha@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Muhammad Althafiyawan Siregar',
            'nis' => '202322082',
            'email' => 'altap@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Mikel Ibrahim',
            'nis' => '202322083',
            'email' => 'mikel@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'developer',
        ]);

        User::create([
            'name' => 'Muhammad Jibril Muqodas',
            'nis' => '202322084',
            'email' => 'jibril@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Muhammad Fahri',
            'nis' => '202322085',
            'email' => 'fahri@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'developer',
        ]);

        User::create([
            'name' => 'Muhammad Pasya Rakhasyah',
            'nis' => '202322086',
            'email' => 'pasya@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Muhammad Rezky',
            'nis' => '202322087',
            'email' => 'rezky@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Nur Apriliyanti Putri',
            'nis' => '202322088',
            'email' => 'nur@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Panglima Akbar Abdillah',
            'nis' => '202322089',
            'email' => 'panglima@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Rafif Dzaky Akmal',
            'nis' => '202322090',
            'email' => 'rafif@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'developer',
        ]);

        User::create([
            'name' => 'Roihan Fajareno',
            'nis' => '202322091',
            'email' => 'roihan@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Sanders Michael Ruang',
            'nis' => '202322092',
            'email' => 'uung@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Siddharta Purnama Siddi Wijaya',
            'nis' => '202322093',
            'email' => 'darta@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Siti Mutia Mutmainah Suharta',
            'nis' => '202322094',
            'email' => 'mutia@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Vylan Yoza Sinaga',
            'nis' => '202322095',
            'email' => 'vylan@example.com',
            'kelas' => 'XII',
            'password' => Hash::make('password'),
            'role' => 'developer',
        ]);
    }
}
