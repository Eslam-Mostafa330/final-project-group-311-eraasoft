<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create(['name' => 'Eslam']);
        Author::create(['name' => 'Mostafa']);
        Author::create(['name' => 'Ali']);
        Author::create(['name' => 'Mohamed']);
        Author::create(['name' => 'Nour']);
        Author::create(['name' => 'Sara']);
        Author::create(['name' => 'Samar']);
        Author::create(['name' => 'Eng.Mohamed Amr']);
        Author::create(['name' => 'Eng.Mostafa Mahfouz']);
    }
}
