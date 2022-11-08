<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class AttendanceController extends Controller
{
    public function index($code){
        // $post = Participants::find($code);
        $column = 'code';
        $post = Participant::where($column , '=', $code)->first();
    }
    
   
}
