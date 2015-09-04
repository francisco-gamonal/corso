<?php

namespace Corso\Entities;


class Product extends Entity
{
    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-00-00
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: Relacion de muchos a uno que hay con las empresas que
    | trabajan con el corso.
    |
    |----------------------------------------------------------------------
    | @return mixed
    |----------------------------------------------------------------------
    */
    public function business(){
        return $this->belongsTo(Business::getClass(),'business_id','id');
    }

    public function getDatos()
    {
        // TODO: Implement getDatos() method.
    }
}
