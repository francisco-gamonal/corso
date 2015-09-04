<?php
/**
 * Created by PhpStorm.
 * User: anwar
 * Date: 02/09/15
 * Time: 07:22 PM
 */

namespace Corso\Repositories;


use Corso\Entities\Record;

class RecordRepository extends  BaseRepository
{

    public function getModel()
    {
        return new Record();
    }

    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-09-03
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: Con esta consulta buscamos en la tabla de record si se
    | encuentra un archivo con las caracteristicas seleccionadas por el
    | usuario
    |@param $dia, $mes, $year, $producto
    |----------------------------------------------------------------------
    | @return array
    |----------------------------------------------------------------------
    */
    public function verifyContent($dia,$mes, $year, $producto)
    {
        return $this->newQuery()->where('day',  $dia)
                                ->where('month',  $mes)
                                ->where('year',  $year)
                                ->where('product_id',  $producto)->get();
    }
}