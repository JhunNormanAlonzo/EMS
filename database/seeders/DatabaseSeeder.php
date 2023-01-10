<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        \App\Models\User::create([
            'name' => 'Jhun Norman Alonzo',
            'email' => 'alonzojhunnorman@gmail.com',
            'password' => bcrypt('admin123'),
            'mobile_number' => '09361246825',
            'department_id' => '3',
            'role_id' => '3',
            'designation' => 'Programmer',
            'start_from' => '2023-01-10',
            'image' => 'default.png'
        ]);
    }
}
