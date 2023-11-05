<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Performer;

class PerformerService
{
    public static function index()
    {
        return Performer::all();
    }

    public static function store(array $data) : Performer
    {

        return Performer::create($data);
    }


    public static function update(Performer $performer, array $data)
    {

        return $performer->update($data);
    }

    public static function destroy(Performer $performer)
    {
        return $performer->delete();
    }
}