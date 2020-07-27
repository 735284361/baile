<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    //

    public function index($id)
    {
        $data = Machine::find($id);
        return view('index',compact('data'));
    }
}
