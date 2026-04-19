<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public static function getAllCategory() {
        return Category::all();
    }

}
