<?php namespace App\models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Eloquent\Model;
/**
 * Description of Product
 *
 * @author Anwar Sarmiento
 */
class Product extends Model {
    //put your code here
    protected $table='productos';
    
    public function business(){

         	return $this->belongsTo('App\models\Business','empresas_id','id');
         }
}
