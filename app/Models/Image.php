<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'article_id'
    ];
    
    public $timestamps = false;
    
    /**
     * Image belongs to an article
     *
     * @return Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }
}
