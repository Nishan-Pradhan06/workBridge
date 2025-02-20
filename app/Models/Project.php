<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'job_post_id',
        'title',
        'date',
        'status',
    ];

    // public function jobPost()
    // {
    //     return $this->belongsTo(JobPost::class, 'job_post_id');
    // }

    // public function payments()
    // {
    //     return $this->hasMany(Payment::class);
    // }

    // public function client()
    // {
    //     return $this->belongsTo(User::class, 'client_id');
    // }

}
