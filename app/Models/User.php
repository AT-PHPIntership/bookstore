<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'token', 'email', 'password', 'isActive'
    ];
    
    public $timestamps = false;
    
    /**
     * User has a profile
     *
     * @return Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }
    
    /**
     * User has roles
     *
     * @return Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_role', 'user_id', 'role_id');
    }
    
    /**
     * User has articles
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }
    
    /**
     * User has reports
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function reports()
    {
        return $this->hasMany('App\Models\Report');
    }
    
    /**
     * User review violations
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function violations()
    {
        return $this->hasMany('App\Models\Violation');
    }
}
