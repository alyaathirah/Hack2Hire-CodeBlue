<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = DB::table('activity')->get();
        return view('pages.activity-list', ['activities' => $activities]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get activity details
        $activity =  DB::table('activity')->where('id', $id)->first();
        // get user and dependent details
        // $users = DB::table('users')->where('id', auth()->user()->id)->get();
        // return view('pages.register-activity', ['activity' => $activity, 'users' => $users]);
        $users = null;
        return view('pages.register-activity', ['activity' => $activity,  'users' => $users]);
    }

    public function getList()
    {
        $activities = DB::table('activity')
                    ->select('name', 'start_time', 'end_time', 'age_category', 'max_slot', 'current_slot', 'type')
                    ->get();

        return view('pages.admin-activity-list', ['activities' => $activities]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
