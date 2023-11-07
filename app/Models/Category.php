<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;
    protected $table = 'categories';

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function tasksFinished()
    {
        return $this->tasks()->where('is_finished', '=', '1');
    }

    public function taskOneOfHottest()
    {
        return $this->hasOne(Task::class)->ofMany('deadline', 'min');
    }

    public function orders()
    {
        return $this->hasManyThrough(Order::class, Task::class);
    }


}
