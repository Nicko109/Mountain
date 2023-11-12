<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\Performer\StorePerformerRequest;
use App\Http\Requests\Performer\UpdatePerformerRequest;
use App\Http\Resources\Performer\PerformerResource;
use App\Http\Resources\Task\TaskResource;
use App\Models\Performer;
use App\Services\PerformerService;

class PerformerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $performers = PerformerService::index();
        $performers = PerformerResource::collection($performers)->resolve();

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
}
