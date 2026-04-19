<?php
namespace App\Repositories;

use App\Models\SubCategory;

class SubcategoryRepository
{
    public static function getAllSubCategory() {
        return SubCategory::all();
    }

}
