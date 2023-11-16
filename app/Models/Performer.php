<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Performer extends Model
{
    use HasFactory, SoftDeletes, HasFilter;

    protected $guarded = false;
    protected $table = 'performers';

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
