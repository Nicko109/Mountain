<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    public static function index()
    {
        return Category::all();
    }

    public static function store(array $data) : Category
    {
        $path = Storage::disk('public')->put('category' , $data['image']);
        $fullPath = Storage::disk('public')->url($path);


        $data['image_path'] = $fullPath;
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
