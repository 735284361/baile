<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    public function index($id)
    {
        $data = Machine::find($id);
        return $data;
    }


}
