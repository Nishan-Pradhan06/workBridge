<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobProposal extends Model
{
  use HasFactory;
  protected $fillable = [
    'job_id',
    'user_id',
    'due_date',
    'amount',
    'project_duration',
    'cover_letter'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function job()
  {
    return $this->belongsTo(JobPost::class);
  }

  public function payment()
  {
    return $this->hasOne(Payment::class, 'proposal_id');
  }
}
