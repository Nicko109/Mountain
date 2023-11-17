<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Filters\CategoryFilter;
use App\Http\Filters\GuaranteeFilter;
use App\Http\Requests\Api\Guarantee\IndexRequest;
use App\Http\Requests\Guarantee\StoreGuaranteeRequest;
use App\Http\Requests\Guarantee\UpdateGuaranteeRequest;
use App\Http\Resources\Guarantee\GuaranteeResource;
use App\Models\Category;
use App\Models\Guarantee;
use App\Services\GuaranteeService;

class GuaranteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        $filter = app()->make(GuaranteeFilter::class, ['queryParams' => array_filter($data)]);

        $guarantees = Guarantee::filter($filter)->paginate($perPage, ['*'], 'page', $page);

        $guarantees = GuaranteeResource::collection($guarantees);

        return $guarantees;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuaranteeRequest $request)
    {
        $data = $request->validated();

        $guarantee = GuaranteeService::store($data);


        $guarantee = GuaranteeResource::make($guarantee)->resolve();


        return $guarantee;

    }
    /**
     * Show the form for creating a new resource.
     */
    /**
     * Display the specified resource.
     */
    public function show(Guarantee $guarantee)
    {
        $guarantee = GuaranteeResource::make($guarantee)->resolve();

        return $guarantee;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuaranteeRequest $request, Guarantee $guarantee)
    {
        $data = $request->validated();
        GuaranteeService::update($guarantee, $data);
        $guarantee = GuaranteeResource::make($guarantee)->resolve();

        return $guarantee;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guarantee $guarantee)
    {
        GuaranteeService::destroy($guarantee);

        return redirect()->route('api.guarantees.index');
    }
}
