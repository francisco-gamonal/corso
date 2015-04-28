<?php namespace Corso\models;
 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Eloquent\Model;
/**
 * Description of Business
 *
 * @author Anwar Sarmiento
 */
class Business extends Model {
    //put your code here
    protected $table= 'empresas';
    
    public function Products(){
         return $this->hasMany('Corso\models\Product','empresas_id','id');
    }
}
