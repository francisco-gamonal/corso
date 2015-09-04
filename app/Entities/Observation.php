<?php

namespace Corso\Entities;

use Illuminate\Database\Eloquent\Model;

class Observation extends Entity
{
    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-09-02
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: Relación de tabla observaciones con estados del producto
    |----------------------------------------------------------------------
    | @return mixed
    |----------------------------------------------------------------------
    */
    public function status(){
        return $this->belongsTo(Status::getClass(),'status_id','id');
    }

    public function getDatos()
    {
        // TODO: Implement getDatos() method.
    }
}
