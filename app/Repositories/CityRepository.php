<?php
/**
 * Created by PhpStorm.
 * User: anwar
 * Date: 02/09/15
 * Time: 08:00 PM
 */

namespace Corso\Repositories;


use Corso\Entities\City;

class CityRepository extends BaseRepository
{

    public function getModel()
    {
        return new City();
    }


}