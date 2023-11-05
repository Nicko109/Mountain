<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;
    protected $table = 'tasks';

    public function guarantee()
    {
        return $this->hasOne(Guarantee::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function performers()
    {
        return $this->belongsToMany(Performer::class);
    }
}
