<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Filters\CategoryFilter;
use App\Http\Filters\TaskFilter;
use App\Http\Requests\Api\Category\IndexRequest;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Requests\StoreCategoryTaskRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Task\TaskResource;
use App\Models\Category;
use App\Models\Task;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 5;

        $filter = app()->make(CategoryFilter::class, ['queryParams' => $data]);

        $categories = Category::filter($filter)->paginate($perPage, ['*'], 'page', $page);
        Log::channel('category')->info('Список успешно показан');

        $categories = CategoryResource::collection($categories);
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        $category = CategoryService::store($data);

        Log::channel('category')->info('Успешно создано', ['category' => $category]);

        $category = CategoryResource::make($category)->resolve();
        return $category;
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        Log::channel('category')->info('Успешно показано', ['category' => $category]);

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
        Log::channel('category')->info('Успешно обновлено', ['category' => $category]);
        $category = CategoryResource::make($category)->resolve();

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        CategoryService::destroy($category);
        Log::channel('category')->info('Успешно удалено', ['category' => $category]);
        return redirect()->route('api.categories.index');
    }

    public function storeCategoryTask(StoreCategoryTaskRequest $request, Category $category)
    {

        $data = $request->validated();
        foreach ($data['task_ids'] as $taskId) {
            $task = Task::findOrFail($taskId);
            $task->update(['category_id' => $category->id]);
        }
        return $task;
    }
}
