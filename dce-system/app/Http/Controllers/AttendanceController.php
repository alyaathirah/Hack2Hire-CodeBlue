<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function qr_scanner()
    {
        return view("pages.qr-scanner");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $code = $request->qr;
        $column = 'code';
        $current_date_time = date('Y-m-d H:i:s');

        $participants = Participant::where($column , '=', $code)->first();
        $participants->attend_time = $current_date_time;
        $participants->save();
        // return redirect("qr-scanner");
        // return redirect('students')->with('edit_form', $post);
        $participants = Participant::where($column , '=', $code)->first();
        return redirect('qr-scanner')->with('success', $participants);
    }
    // public function show_list()
    // {
    //     // $attend = DB::table('participant')->get();
    //     // return view('pages.attendance-list', ['attend' => $attend]);
    //     return view('pages.attendance-list');
    // }
    public function show_list()
    {
        $participants = DB::table('participant')
        ->orderBy('attend_time','asc')
        ->get();
        return view('pages.attendance-list', ['participants' => $participants]);
    }
   
}
