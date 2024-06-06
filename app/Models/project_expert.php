<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_expert extends Model
{
    use HasFactory;
    protected $table = 'project_expert';
    public $timestamps = true;

    protected $fillable = [
        'project_id',
        'expert_id',
        'status',
    ];
}
