<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'type'        => 'individual',
            'email'       => 'user@example.com',
            'phone'       => '01000000001',
            'password'    => Hash::make('password123'),
            'name'        => 'Test User',
            'age'         => 28,
            'job_title_id'=> null, // أو id موجود من جدول job_titles
            'bio'         => 'This is a test individual user.',
            'is_active'   => true,
        ]);



        
    }
}
