<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'no_induk' => '1107057901',
            'name' => 'Sudiyanti, M.Sc., CMA.',
            'email' => 'sudiyanti@gmail.com',
            'password' => Hash::make('123456'),
            'level' => 'dosen',
        ]);

        User::create([
            'no_induk' => '1111068101',
            'name' => 'Yeni Aslina, M.Pd.',
            'email' => 'yeni@gmail.com',
            'password' => Hash::make('123456'),
            'level' => 'dosen',
        ]);
    }
}
