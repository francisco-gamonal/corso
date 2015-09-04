<?php
/**
 * Created by PhpStorm.
 * User: anwar
 * Date: 02/09/15
 * Time: 07:27 PM
 */

namespace Corso\Repositories;


use Corso\Entities\DataCompanie;

class DataCompaniesRepository extends BaseRepository
{

    public function getModel()
    {
        return new DataCompanie();
    }

    public function dataCount($data,$datos)
    {
        return $this->newQuery()->where($data,$datos)->count();
    }
}