<?php

namespace Corso\Entities;


class DataCompanie extends Entity
{
    protected $table='data_companies';

    protected $fillable=['bar','code','customer_type','comment','customer_name','comment_town',
        'date_delivered','date_received','address','city_id','observation_id','record_id','employee_id'];


    public function getDatos()
    {
        return [
            'code'=>'required',
            'customer_name'=>'required',
            'address'=>'required',
            'city_id'=>'required',
            'observation_id'=>'required',
            'record_id'=>'required',
            'employee_id'=>'required'
        ];
    }
    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-09-02
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: Relación con la tabla observaciones de los estados.
    |----------------------------------------------------------------------
    | @return mixed
    |----------------------------------------------------------------------
    */
    public function observations(){
        return $this->belongsTo(Observation::getClass(),'observation_id','id');
    }
    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-09-02
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: Relación con la tabla Ciudades de los estados.
    |----------------------------------------------------------------------
    | @return mixed
    |----------------------------------------------------------------------
    */
    public function cities(){
        return $this->belongsTo(City::getClass(),'city_id','id');
    }
    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-09-02
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: Relación con la tabla observaciones de los estados.
    |----------------------------------------------------------------------
    | @return mixed
    |----------------------------------------------------------------------
    */
    public function employees(){
        return $this->belongsTo(Employee::getClass(),'employee_id','id');
    }

    public function records(){
        return $this->belongsTo(Record::getClass(),'historials_id','id');
    }

    public function status(){
        return $this->belongsTo(Status::getClass(),'status_id' , $this->observations->status_id);
    }

}
