<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;
use App\Models\Student;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Student::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        kelas::create([
            'nama' => "10 PPLG 1"
        ]);
        
        kelas::create([
            'nama' => "10 PPLG 2"
        ]);

        kelas::create([
            'nama' => "11 PPLG 1"
        ]);

        kelas::create([
            'nama' => "11 PPLG 11"
        ]);


    }
}