<?php

namespace App\Http\Controllers;

use App\Http\Requests\Guarantee\StoreGuaranteeRequest;
use App\Http\Requests\Guarantee\UpdateGuaranteeRequest;
use App\Http\Resources\Guarantee\GuaranteeResource;
use App\Models\Guarantee;
use App\Services\GuaranteeService;

class GuaranteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $guarantees = GuaranteeService::index();

        return view('guarantee.index', compact('guarantees'));
    }


    public function create()
    {
        return view('guarantee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuaranteeRequest $request)
    {
        $data = $request->validated();

        $guarantee = GuaranteeService::store($data);


        $category = GuaranteeResource::make($guarantee)->resolve();


        return redirect()->route('guarantees.index');

    }
    /**
     * Show the form for creating a new resource.
     */
    /**
     * Display the specified resource.
     */
    public function show(Guarantee $guarantee)
    {


        return view('guarantee.show', compact('guarantee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guarantee $guarantee)
    {
        return view('guarantee.edit', compact('guarantee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuaranteeRequest $request, Guarantee $guarantee)
    {
        $data = $request->validated();
        GuaranteeService::update($guarantee, $data);
        return redirect()->route('guarantees.show', compact('guarantee'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guarantee $guarantee)
    {
        GuaranteeService::destroy($guarantee);

        return redirect()->route('guarantees.index');
    }
}
