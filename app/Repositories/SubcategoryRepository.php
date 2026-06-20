<?php
namespace App\Repositories;

use App\Models\SubCategory;
use App\Repositories\Contracts\SubcategoryRepositoryInterface;

class SubcategoryRepository implements SubcategoryRepositoryInterface
{
    public function getAll()
    {
        return SubCategory::all();
    }
}
