<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'gudang4',
            'email' => 'gudang44@gmail.com',
            'password' => bcrypt('password'),            'level' => 'apoteker',
            'level' => 'gudang',
            'aktif' => 1
        ]);
       
    }
}