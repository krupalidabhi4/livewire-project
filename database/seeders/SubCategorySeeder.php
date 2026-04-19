<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SubCategorySeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // category_id references: 1=Infrastructure, 2=Residential, 3=Commercial, 4=Industrial, 5=Transportation
        $subCategories = [
            // Infrastructure
            ['category_id' => 1, 'name_en' => 'Water Supply',        'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['category_id' => 1, 'name_en' => 'Sewage System',       'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['category_id' => 1, 'name_en' => 'Electrical Grid',     'is_active' => true, 'created_at' => $now, 'updated_at' => $now],

            // Residential
            ['category_id' => 2, 'name_en' => 'Apartment Complex',   'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['category_id' => 2, 'name_en' => 'Villa Development',   'is_active' => true, 'created_at' => $now, 'updated_at' => $now],

            // Commercial
            ['category_id' => 3, 'name_en' => 'Shopping Mall',       'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['category_id' => 3, 'name_en' => 'Office Tower',        'is_active' => true, 'created_at' => $now, 'updated_at' => $now],

            // Industrial
            ['category_id' => 4, 'name_en' => 'Manufacturing Plant', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['category_id' => 4, 'name_en' => 'Warehouse Facility',  'is_active' => true, 'created_at' => $now, 'updated_at' => $now],

            // Transportation
            ['category_id' => 5, 'name_en' => 'Highway Construction','is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['category_id' => 5, 'name_en' => 'Bridge Engineering',  'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('sub_categories')->insert($subCategories);
    }
}
