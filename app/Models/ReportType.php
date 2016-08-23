<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type'
    ];
    
    public $timestamps = false;
    
    /**
     * Report type has reports
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function reports()
    {
        return $this->hasMany('App\Models\Report');
    }
}
