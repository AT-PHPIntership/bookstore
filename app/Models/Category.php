<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug'
    ];
    
    public $timestamps = false;
    
    /**
     * Category has categoryDetails
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function categoryDetails()
    {
        return $this->hasMany('App\Models\CategoryDetail');
    }
}
