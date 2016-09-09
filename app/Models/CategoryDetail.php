<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug','category_id'
    ];
    
    public $timestamps = false;
    
    /**
     * CategoryDetail belongs to a category.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
