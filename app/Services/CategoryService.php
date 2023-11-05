<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public static function index()
    {
        return Category::all();
    }

    public static function store(array $data) : Category
    {

        return Category::create($data);
    }


    public static function update(Category $category, array $data)
    {

        return $category->update($data);
    }

    public static function destroy(Category $category)
    {
        return $category->delete();
    }
}