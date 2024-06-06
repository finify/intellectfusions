<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertdetail extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'user_id', 
        'phone_number',
        'about', 
        'field_of_study', 
        'project_type', 
        'balance', 
        'created_at',
        'updated_at',
    ];
}
