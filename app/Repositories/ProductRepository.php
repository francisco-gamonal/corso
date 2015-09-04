<?php

namespace Corso\Repositories;
use Corso\Entities\Product;

/**
 * Created by PhpStorm.
 * User: anwar
 * Date: 02/09/15
 * Time: 05:19 PM
 */
class ProductRepository extends BaseRepository
{

    public function getModel()
    {
        return new Product();
    }
}