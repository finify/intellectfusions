<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertdetail extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'expertdetails';
    protected $fillable = [
        'user_id', 
        'balance',
        'profileimage',
        'about',
        'phone_number',
        'field_of_study',
        'project_type',
        'country',
        'city',
        'degree_obtained',
        'degree_obtained_others',
        'availability',
        'deliver',
        'plagiarism',
        'plagiarismcheck',
        'created_at',
        'updated_at',
    ];
}
