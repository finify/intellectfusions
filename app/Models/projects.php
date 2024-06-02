<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'project_title',
        'description',
        'project_type',
        'subject_area',
        'project_attachment_id',
        'deadline',
        'progress',
        'expert_id',
        'price'
    ];
}
