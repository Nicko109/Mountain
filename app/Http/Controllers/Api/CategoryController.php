<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Task\TaskResource;
use App\Models\Category;
use App\Models\Task;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryService::index();
        $categories = CategoryResource::collection($categories)->resolve();
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        $category = CategoryService::store($data);
        $category = CategoryResource::make($category)->resolve();
        return $category;
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = CategoryResource::make($category)->resolve();

        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        CategoryService::update($category, $data);

        $category = CategoryResource::make($category)->resolve();

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        CategoryService::destroy($category);

        return redirect()->route('api.categories.index');
    }

    public function storeCategoryTask()
    {
        $category = Category::find(4);
        $task = Task::find(23);
        $task->category_id = $category->id; // Устанавливаем category_id

        $task->save(); // Сохраняем изменения в базе данных



        return $task;
    }
}
