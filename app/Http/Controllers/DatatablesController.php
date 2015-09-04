<?php

namespace Corso\Http\Controllers;

use Corso\Entities\dataCompanie;
use Corso\Entities\User;
use Illuminate\Http\Request;

use Corso\Http\Requests;
use Corso\Http\Controllers\Controller;
use yajra\Datatables\Datatables;

class DatatablesController extends Controller
{
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('datatable.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(User::select('*'))->make(true);
    }
}
