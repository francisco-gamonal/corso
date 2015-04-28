<?php namespace Corso\models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Eloquent\Model;
/**
 * Description of Observacione
 *
 * @author Anwar Sarmiento
 */
class Observation extends Model{
    //put your code here
    
    public function status(){
        
        return $this->belongsTo('Corso\models\Statu','estados_id','id');
    }
}
