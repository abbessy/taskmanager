<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

      protected $fillable = [
        'title',
        'description',
        'comment',
        'responsable_id',
        'agent_id',
        'status',
        'creation_time',
        'limit_time'
    ];
}
