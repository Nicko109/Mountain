<?php

namespace App\Http\Controllers;


use App\Http\Requests\Performer\StorePerformerRequest;
use App\Http\Requests\Performer\UpdatePerformerRequest;
use App\Http\Resources\Performer\PerformerResource;
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

        return view('performer.index', compact('performers'));
    }


    public function create()
    {
        return view('performer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePerformerRequest $request)
    {
        $data = $request->validated();

        $performer = PerformerService::store($data);


        $performer = PerformerResource::make($performer)->resolve();


        return redirect()->route('performers.index');

    }
    /**
     * Show the form for creating a new resource.
     */
    /**
     * Display the specified resource.
     */
    public function show(Performer $performer)
    {


        return view('performer.show', compact('performer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Performer $performer)
    {
        return view('performer.edit', compact('performer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerformerRequest $request, Performer $performer)
    {
        $data = $request->validated();
        PerformerService::update($performer, $data);
        return redirect()->route('performers.show', compact('performer'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Performer $performer)
    {
        PerformerService::destroy($performer);

        return redirect()->route('performers.index');
    }
}
