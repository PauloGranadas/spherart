<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [        
        'description',
        'name',
        'status',
        'creator_id',
        'cover',
    ];
    
    function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
