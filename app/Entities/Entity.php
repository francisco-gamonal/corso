<?php
/**
 * Created by PhpStorm.
 * User: anwar
 * Date: 02/09/15
 * Time: 10:10 AM
 */

namespace Corso\Entities;


use Illuminate\Database\Eloquent\Model;

abstract class Entity extends Model
{
    abstract public function getDatos();

    public static function getClass(){

        return get_class(new static);
    }

    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-09-02
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: Con este method validamos todos los campos de las
    | Diferentes Entities utilizando una función abstracta para recibir
    | los parametros de cada tabla.
    |----------------------------------------------------------------------
    | @return bool
    |----------------------------------------------------------------------
    */
    public function isValid($data) {

        $rules = $this->getDatos();
        $validator = \Validator::make($data, $rules);
        if ($validator->passes()) {
            return true;
        }
        $this->errors = $validator->errors();
        return false;
    }
}