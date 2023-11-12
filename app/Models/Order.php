<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'orders';


    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
