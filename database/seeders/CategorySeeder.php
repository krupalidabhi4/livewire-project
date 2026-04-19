<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $categories = [
            ['name_en' => 'Infrastructure', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name_en' => 'Residential',    'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name_en' => 'Commercial',     'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name_en' => 'Industrial',     'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name_en' => 'Transportation', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('project_categories')->insert($categories);
    }
}
