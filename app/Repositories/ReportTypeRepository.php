<?php
namespace App\Repositories;
 
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;
 
class ReportTypeRepository extends Repository
{
 
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\ReportType';
    }
}
