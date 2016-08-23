<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'role_id'
    ];
    
    public $timestamps = false;
    
    /**
     * UserRole has users
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
    
    /**
     * UserRole has roles
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function roles()
    {
        return $this->hasMany('App\Models\Role');
    }
}
