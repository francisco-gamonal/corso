<?php namespace Corso\models;



/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.

 */

use Illuminate\Database\Eloquent\Model;

/**
 * Description of City
 *
 * @author Anwar Sarmiento
 */

class Empleado extends Model {

    //put your code here

    protected $table='empleados';
    protected $fillable = ['fname', 'sname', 'flast', 'slast', 'cedula', 'celular', 'ciudades_id'];

    public function citys(){
    	return $this->belongsTo('Corso\models\City', 'ciudades_id', 'id');
    }

    public function isValid($data) {
        $rules = [
        	'fname' => 'required|string',
            'flast'=>'required|string',
            'cedula'=>'required|unique:empleados',
            'ciudades_id' => 'required|integer'
        ];

        if ($this->exists) {
            $rules['cedula'] .= ',cedula,'.$this->id;
        }

       	$validator = \Validator::make($data, $rules);
        
        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }

    public function nameComplete(){
    	return $this->fname.' '.$this->sname.' '.$this->flast.' '.$this->slast;
    }

}