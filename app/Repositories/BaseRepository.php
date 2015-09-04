<?php

namespace Corso\Repositories;
/**
 * Created by PhpStorm.
 * User: anwar
 * Date: 02/09/15
 * Time: 05:20 PM
 */
abstract class BaseRepository
{

    abstract public function getModel();

    public function newQuery() {
        return $this->getModel()->newQuery();
    }

    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-09-02
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: Se manda a buscar todos los datos de la tabla a consultar
    |----------------------------------------------------------------------
    | @return mixed
    |----------------------------------------------------------------------
    */
    public function all()
    {
        return $this->newQuery()->get();
    }
    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-09-09
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: Con este Metodo hacemos consultas con un where y le damos
    | @param
    |    $data
    |    $id
    |    $order
    |----------------------------------------------------------------------
    | @return mixed
    |----------------------------------------------------------------------
    */
    public function whereData($data, $id){
        return $this->newQuery()->where($data, $id)->get();
    }

    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-09-03
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: Con esta consulta buscamos el ID de la tabla mediante un
    |   parametro.
    |----------------------------------------------------------------------
    | @return mixed
    |----------------------------------------------------------------------
    */
    public function returnName($data,$parm,$parm1)
    {
        $object = $this->newQuery()->select($parm1)->where($data,$parm)->get();
        if(!$object->isEmpty()):
            return $object[0]->id;
        endif;

        return Null;
    }
    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-00-00
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: Enviamos a buscar por el ID a las tablas requeridas
    |----------------------------------------------------------------------
    | @return mixed
    |----------------------------------------------------------------------
    */
    public function find($id)
    {
        return $this->newQuery()->find($id);
    }
}