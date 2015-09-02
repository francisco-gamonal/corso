<?php namespace Corso\Http\Controllers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Corso\Http\Controllers\Controller;

/**
 * Description of baseUploadController
 *
 * @author Anwar Sarmiento
 */
abstract class baseUploadController extends Controller {
    //put your code here
    
    protected function period($id) {
        $range = $this->convertionObjeto();
        $period = $this->serparatorPeriodo($range->range);
        $period = explode('/', trim($period[$id]));
        return ($period);
    }
    
    protected function serparatorPeriodo($range) {
      $rangeSeparator = explode('-', $range);
        return $rangeSeparator;
    }
}
