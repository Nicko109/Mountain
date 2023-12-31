<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaint extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;
    protected $table = 'complaints';

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

}
