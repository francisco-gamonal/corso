<?php namespace Comer\models;

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

         	return $this->belongsTo('Comer\models\Observation','observaciones_id','id');
         }

         public function citys(){

         	return $this->belongsTo('Comer\models\City','ciudades_id','id');
         }

         public function staffs(){

         	return $this->belongsTo('Comer\models\Staff','empleados_id','id');
         }
          public function records(){

         	return $this->belongsTo('Comer\models\Record','historials_id','id');
         }
}
