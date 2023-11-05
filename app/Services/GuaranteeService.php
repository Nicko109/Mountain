<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Guarantee;

class GuaranteeService
{
    public static function index()
    {
        return Guarantee::all();
    }

    public static function store(array $data) : Guarantee
    {

        return Guarantee::create($data);
    }


    public static function update(Guarantee $guarantee, array $data)
    {

        return $guarantee->update($data);
    }

    public static function destroy(Guarantee $guarantee)
    {
        return $guarantee->delete();
    }
}