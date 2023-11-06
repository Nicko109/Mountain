<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Performer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;
    protected $table = 'performers';

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}