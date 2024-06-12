<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'text',
        'notify_id',
        'type',
        'seen',
        'expert_id',
        'created_at',
        'updated_at',
    ];

}
