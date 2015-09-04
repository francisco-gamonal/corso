<?php
/**
 * Created by PhpStorm.
 * User: anwar
 * Date: 02/09/15
 * Time: 06:51 PM
 */

namespace Corso\Entities;


class Employee extends Entity
{

    protected  $fillable = ['fname','sname','flast','slast','charter','phone','city_id'];

    public function getDatos()
    {
        return [
            'fname'=>'required',
            'flast'=>'required',
            'charter'=>'required',
            'phone'=>'required',
            'city_id'=>'required'
        ];
    }

    public function nameComplete()
    {
        return $this->fname.' '.$this->sname.' '.$this->flast.' '.$this->slast;
    }
}