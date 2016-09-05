<?php
namespace App\Repositories;
 
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;
 
class ArticleRepository extends Repository
{
 
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Article';
    }
    
    /**
     * Skip rows
     *
     * @param int $rows number rows are skipped
     *
     * @return $this
     */
    public function skip($rows = 15)
    {
        return $this->model->skip($rows);
    }
    
    /**
     * Take rows
     *
     * @param int $rows number rows are taken
     *
     * @return $this
     */
    public function take($rows = 15)
    {
        return $this->model->take($rows);
    }
}
