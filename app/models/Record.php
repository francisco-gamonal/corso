<?php namespace App\models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Eloquent\Model;
/**
 * Description of Record
 *
 * @author Anwar Sarmiento
 */
class Record extends Model {
    //put your code here
    protected $table= 'historials';
    
    
    public function products(){
        return $this->belongsTo('App\models\Product','productos_id','id');
    }
    
    public function DataCompanies(){
        return $this->hasMany('App\models\DataCompanie','historials_id','id');
    }
}
