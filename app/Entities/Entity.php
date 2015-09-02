<?php
/**
 * Created by PhpStorm.
 * User: anwar
 * Date: 02/09/15
 * Time: 10:10 AM
 */

namespace Corso\Entities;


use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{

    public function getClass(){

        return get_class(new static);
    }
}