<?php namespace Corso\models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Eloquent\Model;
/**
 * Description of DataCompanie
 *
 * @author Anwar Sarmiento
 */
class DataCompanie extends Model {
    //put your code here
    protected $table='datos_empresas';
    
    
     public function observations(){

         	return $this->belongsTo('Corso\models\Observation','observaciones_id','id');
         }

         public function citys(){

         	return $this->belongsTo('Corso\models\City','ciudades_id','id');
         }

         public function staffs(){

         	return $this->belongsTo('Corso\models\Staff','empleados_id','id');
         }
}
