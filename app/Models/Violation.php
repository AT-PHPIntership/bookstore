<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'reviewer_id', 'article_id'
    ];
    
    public $timestamps = false;
    
    /**
     * Violation has an article
     *
     * @return Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function article()
    {
        return $this->hasOne('App\Models\Article');
    }
    
    /**
     * Violation has an reviewer
     *
     * @return Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'reviewer_id');
    }
}
