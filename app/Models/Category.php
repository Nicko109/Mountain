<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes, HasFilter;

    protected $guarded = false;
    protected $table = 'categories';

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }




    public function tasksFinished()
    {
        return $this->tasks()->where('is_finished',  true);
    }




    public function taskOneOfHottest()
    {
        return $this->hasOne(Task::class)->ofMany('deadline', 'min');
    }
    public function setImagePathAttribute($value)
    {
        $this->attributes['image_path'] = $value;
    }



}
