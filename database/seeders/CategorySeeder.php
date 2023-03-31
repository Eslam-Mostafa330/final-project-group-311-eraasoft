<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Programming']);
        Category::create(['name' => 'Art']);
        Category::create(['name' => 'Design']);
        Category::create(['name' => 'Cryptocurrency']);
        Category::create(['name' => 'Freelancing']);
        Category::create(['name' => 'Network']);
        Category::create(['name' => 'AI']);
        Category::create(['name' => 'Security']);
        Category::create(['name' => 'E-marketing']);
        Category::create(['name' => 'Entrepreneurship']);
    }
}
