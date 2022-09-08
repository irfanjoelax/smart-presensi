<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'no_induk' => '150105001',
            'name' => 'Auliya Ryska Chairunnisa',
            'email' => 'auliya@gmail.com',
            'password' => Hash::make('123456'),
            'level' => 'mahasiswa',
        ]);

        User::create([
            'no_induk' => '150105002',
            'name' => 'Dewi Noor Alida',
            'email' => 'dewi@gmail.com',
            'password' => Hash::make('123456'),
            'level' => 'mahasiswa',
        ]);

        User::create([
            'no_induk' => '150105003',
            'name' => 'Muhammad Irfan Permana',
            'email' => 'irfan@gmail.com',
            'password' => Hash::make('123456'),
            'level' => 'mahasiswa',
        ]);
    }
}
