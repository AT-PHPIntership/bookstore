<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'article_id', 'reporter_id', 'report_type_id'
    ];
    
    public $timestamps = false;
    
    /**
     * Report belongs to an article
     *
     * @return Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function article()
    {
        return $this->belongsTo('App\Models\Article', 'reporter_id');
    }
    
    /**
     * Report belongs to an user
     *
     * @return Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    /**
     * Report belongs to a report type
     *
     * @return Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function reportType()
    {
        return $this->belongsTo('App\Models\ReportType');
    }
}
