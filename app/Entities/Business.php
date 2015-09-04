<?php

namespace Corso\Entities;



class Business extends Entity
{
    public function getDatos()
    {
        // TODO: Implement getDatos() method.
    }
    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-00-00
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: Relación con la tabla de productos de la empresas
    |
    |----------------------------------------------------------------------
    | @return mixed
    |----------------------------------------------------------------------
    */
    public function Products(){
        return $this->hasMany(Product::getClass(),'business_id','id');
    }


}
