<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Abdul Wahid Safiudin',
            'email' => 'akuwahid33@gmail.com',
            'password' => bcrypt('wahid130103'),
            'prodi' => 'D3-MI PSDKU Kediri',
            'nim' => '2131730030',
            'tgl' => '2023-11-12',            
        ]);
    }
}
