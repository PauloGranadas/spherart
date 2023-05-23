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

    function categories()
    {
        //'project_id', 'category_id'
        return $this->belongsToMany(Category::class, 'project_categories');
    }

    function members()
    {
        return $this->hasMany(ProjectMember::class);
    }

    function scopeFilter($query, array $filters){
        //return request()->query('search');
        //$query->when($filters['search'] ?? false, function($query, $search){
            if ($filters['search'] ?? false) {
                ''
            }

       
    }
}
