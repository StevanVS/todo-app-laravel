<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'Tareas',
            'color' => '#00aa00',
            'status' => 1
        ]);
        DB::table('categories')->insert([
            'name' => 'Proyectos',
            'color' => '#aa00aa',
            'status' => 1
        ]);
    }
}
