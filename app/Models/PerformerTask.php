<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformerTask extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'performer_task';

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function performers()
    {
        return $this->belongsToMany(Performer::class);
    }

}
