<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guarantee extends Model
{
    use HasFactory, SoftDeletes, HasFilter;

    protected $guarded = false;
    protected $table = 'guarantees';

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
