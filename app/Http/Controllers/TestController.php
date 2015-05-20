<?php namespace Corso\Http\Controllers;

use Corso\Http\Requests;
use Corso\Http\Controllers\Controller;
use Corso\models\Observation;
use Illuminate\Http\Request;
use Corso\models\Record;
use Corso\models\DataCompanie;
use Corso\models\City;

class TestController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //set_time_limit(0);
        //ini_set('memory_limit', '20240M');
		//		$test = Observation::find(1);
       // $test = Record::find(31); 
		//$test =new RecordsController;
		//$Record = explode(' ', strtolower($test->products->name));
		//switch (count($Record)):
		//	case 1:
		//  	$Record = $Record[0];
		//      break;
		//  case 2:
		//		$Record = $Record[0].'-'.$Record[1];
		//      break;
		//  case 3:
		//      $Record =  $Record[0].'-'.$Record[1].'-'.$Record[2];
		//      break;
		//  case 4:
		//      $Record = $Record[0].'-'.$Record[1].'-'.$Record[2].'-'.$Record[3];
		//      break;
		//  endswitch;
			//echo json_encode(City::all());die;
			$test = Record::select('id')->orderByRaw("Rand()")->first();
			dd($test);
        	$id = 3;
	        $record = Record::where('productos_id','=',$id)
	                ->where('mes','>=','03')
	                ->where('year','>=','2015')
	                ->where('mes','<=','03')
	                ->where('year','<=','2015')->get();

	        foreach ($record AS $datos):
	            $temp = DataCompanie::where('historials_id','=',$datos->id)->get();
	        	//echo json_encode($temp);die;
	        	foreach ($temp as $key => $value) {
	        		if($value->observaciones_id)
	        			echo "$key : $value->observaciones_id /";
	        	}
	            $temp = null;
	        endforeach;
	        die;
       		//echo count($dataClaro[0]);die;
            //$dataClaro = DataCompanie::find(50772);
            
            //echo json_encode($dataClaro->staffs->fname);
        //$dataClaro = DataCompanie::where('historials_id','=',29)->get();
	//	return view('claro.dataProduct',compact('test'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
