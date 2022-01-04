<?php

namespace App\Services\Impl;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Database\Eloquent\Collection;

class CategoryServiceImpl implements CategoryService
{
    public function getAll(): Collection
    {

        return Category::all();
    }
}
