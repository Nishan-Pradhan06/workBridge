<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPost extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at']; //register the deleted_at column for soft deletes
}
