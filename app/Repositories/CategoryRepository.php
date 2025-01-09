<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function all()
    {
        return Category::all();
    }

    public function getById($categort_id){

        return Category::find($categort_id);
    }
}
