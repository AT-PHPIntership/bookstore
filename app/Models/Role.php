<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'description'
    ];
    
    public $timestamps = false;
    
    /**
     * Role has users
     *
     * @return Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
