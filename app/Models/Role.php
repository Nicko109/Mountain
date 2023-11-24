<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    const ROLE_ADMIN = 'admin';
    const ROLE_REDACTOR = 'redactor';
    const ROLE_MODERATOR = 'moderator';

    use HasFactory, SoftDeletes;

    protected $guarded = false;
}
