<?php
/**
 * Created by PhpStorm.
 * User: anwar
 * Date: 02/09/15
 * Time: 06:21 PM
 */

namespace Corso\Repositories;


use Corso\Entities\Business;

class BusinessRepository extends BaseRepository
{

    public function getModel()
    {
        return new Business();
    }
}