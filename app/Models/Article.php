<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'state', 'type', 'price', 'slug', 'category_id',
         'city_id', 'user_id'
    ];
    
    public $timestamps = false;
    
    /**
     * Article has images
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function articles()
    {
        return $this->hasMany('App\Models\Image');
    }
    
    /**
     * Article belongs to a user.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    /**
     * Article belongs to a category.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    
    /**
     * Article belongs to a report.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function report()
    {
        return $this->belongsTo('App\Models\Report');
    }
    
    /**
     * Article belongs to a city.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    
    /**
     * Article belongs to a violation.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function violation()
    {
        return $this->belongsTo('App\Models\Violation');
    }
}
