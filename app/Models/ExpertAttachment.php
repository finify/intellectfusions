<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertAttachment extends Model
{
    use HasFactory;
    protected $table = 'expert_attachment';
    protected $fillable = [
        'user_id', 
        'project_id', 
        'filename',
        'original_filename',
        'status'
    ];
}
