<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin
            [
                'barangay_id'=> 1,
                'name'      => 'Admin',
                'username'  => 'admin',
                'email'     => 'admin@gmail.com',
                'password'  => Hash::make('admin'),
                'role'      => 'admin',
                'status'    => 'active',
                // 'brgy'      => 'N/A',
            ],

            // User
            [
                'barangay_id'=> 2,
                'name'      => 'User',
                'username'  => 'user',
                'email'     => 'user@gmail.com',
                'password'  => Hash::make('user'),
                'role'      => 'user',
                'status'    => 'active',
                // 'brgy'      => 'N/A',
            ],
        ]);
    }
}
