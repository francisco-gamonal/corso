<?php

namespace Corso\Entities;

use Illuminate\Database\Eloquent\Model;

class Record extends Entity
{
    protected $fillable =['month','year','url','product_id','created_at','updated_at'];

    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-09-03
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: Creamos el arreglo para pasarlo a la validación de los
    |   campos requeridos.
    |----------------------------------------------------------------------
    | @return mixed
    |----------------------------------------------------------------------
    */
    public function getDatos()
    {
        return ['month'=>'required','year'=>'required','url'=>'required','product_id'=>'required'];
    }
    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-09-02
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: La relacion con la tabla productos contra el historial
    |----------------------------------------------------------------------
    | @return mixed
    |----------------------------------------------------------------------
    */
    public function products(){
        return $this->belongsTo(Product::getClass(),'product_id','id');
    }

    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-09-02
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: La Relacion de historial a la tabla de datos de los
    |archivos de las empresas.
    |----------------------------------------------------------------------
    | @return mixed
    |----------------------------------------------------------------------
    */
    public function DataCompanies(){
        return $this->hasMany(DataCompanie::getClass(),'record_id','id');
    }


}
