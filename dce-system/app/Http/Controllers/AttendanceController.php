<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class AttendanceController extends Controller
{
    public function index($code){
        // $post = Participants::find($code);
        $column = 'id';
        $post = Participant::where($column , '=', $code)->first();

        echo "<p>";
        // echo $post->id;
        echo $post->firstname;
        echo "</p>";
    }
   
}
