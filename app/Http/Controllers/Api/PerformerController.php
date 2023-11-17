<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Filters\GuaranteeFilter;
use App\Http\Filters\PerformerFilter;
use App\Http\Requests\Api\Performer\IndexRequest;
use App\Http\Requests\Performer\StorePerformerRequest;
use App\Http\Requests\Performer\UpdatePerformerRequest;
use App\Http\Requests\StorePerformerTaskRequest;
use App\Http\Resources\Performer\PerformerResource;
use App\Http\Resources\Task\TaskResource;
use App\Models\Performer;
use App\Models\Task;
use App\Services\PerformerService;

class PerformerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        $filter = app()->make(PerformerFilter::class, ['queryParams' => array_filter($data)]);

        $performers = Performer::filter($filter)->paginate($perPage, ['*'], 'page', $page);

        $performers = PerformerResource::collection($performers);

        return $performers;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePerformerRequest $request)
    {
        $data = $request->validated();

        $performer = PerformerService::store($data);

        $performer = PerformerResource::make($performer)->resolve();


        return $performer;

    }
    /**
     * Show the form for creating a new resource.
     */
    /**
     * Display the specified resource.
     */
    public function show(Performer $performer)
    {
        $performer = PerformerResource::make($performer)->resolve();

        return $performer;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerformerRequest $request, Performer $performer)
    {
        $data = $request->validated();
        PerformerService::update($performer, $data);

        $performer = PerformerResource::make($performer)->resolve();
        return $performer;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Performer $performer)
    {
        PerformerService::destroy($performer);

        return redirect()->route('api.performers.index');
    }

    public function storePerformerTask(StorePerformerTaskRequest $request, Performer $performer)
    {
        $data = $request->validated();

        foreach ($data['task_ids'] as $task_id) {

        $performer->tasks()->syncWithoutDetaching($task_id);
        }

        return $performer;
    }
}
