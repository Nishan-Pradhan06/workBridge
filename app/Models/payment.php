<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class payment extends Model
// {
//     use HasFactory;

//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var array
//      */
//     protected $fillable = [
//         'user_id',
//         'job_id',
//         'amount',
//         'status',
//         'purchase_order_id',
//         'transaction_id',
//         'pidx',
//         'payment_url',
//     ];

//     /**
//      * The attributes that should be cast to native types.
//      *
//      * @var array
//      */
//     protected $casts = [
//         'amount' => 'float',
//         'created_at' => 'datetime',
//         'updated_at' => 'datetime',
//     ];

//     public function user()
//     {
//         return $this->belongsTo(User::class);
//     }
//     public function job()
//     {
//         return $this->belongsTo(JobPost::class, 'job_id');
//     }

//     public function project()
//     {
//         return $this->belongsTo(Project::class);
//     }

// }

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'admin_id',
        'freelancer_id',
        'job_id',
        'proposal_id',
        'amount',
        'status',
        'purchase_order_id',
        'transaction_id',
        'pidx',
        'payment_url',
    ];

    protected $casts = [
        'amount' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relations
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id');
    }

    public function job()
    {
        return $this->belongsTo(JobPost::class, 'job_id');
    }

    public function proposal()
    {
        return $this->belongsTo(JobProposal::class, 'proposal_id');
    }
}
