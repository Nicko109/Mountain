<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Mapper\TaskMapper;
use App\Models\Category;
use App\Models\Performer;
use App\Models\Task;
use App\Services\CategoryService;
use App\Services\TaskService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Задание 1 показываем фильтрацию через метод в Модели
//        $category = Category::find(5);
//        $task = Task::find(11);

//  dd($category->tasksFinished);
//  dd($category->taskOneOfHottest);
//  dd($category->orders);



        //Создаём задачу сразу с id
//        $category = Category::find(5);
//        $task = Task::find(11);
//        $category->tasks()->create([
//            'title' => 'Собрать урожай',
//            'description' => 'Собрать урожай в селе',
//        ]);








        //Создаём отдельно id для задачи
//        $category = Category::find(5);
//        $task = Task::find(13);
//        $task->category_id = $category->id; // Устанавливаем category_id
//
//        $task->save(); // Сохраняем изменения в базе данных
//
//


//        Задание 2 Создаём сразу 2 id performer_id & task_id
//        $performer = Performer::find(2);

//        $task = Task::find(13);
//        $performer->tasks()->syncWithoutDetaching($task->id);
//        $performer->tasks()->toggle($task->id);
//        $performer->tasks()->attach($task->id);
//        $performer->tasks()->detach($task->id);
//        dd($performer->tasks);

//        $task->performers()->detach($task->id);
//        $task->performers()->attach($task->id);
//        $task->performers()->toggle($task->id);
//        $task->performers()->syncWithoutDetaching($task->id);
//        dd($task->performers);




        //Задание 2
//        $performer = Performer::find(2);
//
//        $task = Task::find(2);

//        $performer->tasks()->attach($performer->id);
//        $performer->tasks()->detach($performer->id);
//        $performer->tasks()->syncWithoutDetaching($performer->id);
//        $performer->tasks()->toggle($performer->id);
//        dd($performer->tasks);

//        $task->performers()->detach($task->id);
//        $task->performers()->attach($task->id);
//        $task->performers()->toggle($task->id);
//        $task->performers()->syncWithoutDetaching($task->id);
//        dd($task->performers);


        $categories = CategoryService::index();



        return view('category.index', compact('categories'));
    }


    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        $category = CategoryService::store($data);


        $category = CategoryResource::make($category)->resolve();


        return redirect()->route('categories.index');

    }
    /**
     * Show the form for creating a new resource.
     */
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $tasks = TaskService::index();

        return view('category.show', compact('category', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        CategoryService::update($category, $data);
        return redirect()->route('categories.show', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        CategoryService::destroy($category);

        return redirect()->route('categories.index');
    }
}
