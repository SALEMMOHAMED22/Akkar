<?php

namespace Database\Seeders;

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
            'type'        => 'individual',
            'email'       => 'user@example.com',
            'phone'       => '01000000001',
            'password'    => Hash::make('password'),
            'name'        => 'Test User',
            'age'         => 28,
            'job_title_id'=> 1, // أو id موجود من جدول job_titles
            'bio'         => 'This is a test individual user.',
            'is_active'   => true,
        ]);



         User::create([
            'type'            => 'company',
            'email'           => 'company@example.com',
            'phone'           => '01000000002',
            'password'        => Hash::make('password123'),
            'company_name'    => 'Demo Company',
            'username'        => 'democompany',
            'company_type_id' => null, 
            'bio'             => 'This is a test company account.',
            'is_active'       => true,
        ]);
    }
}
