<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Activity;

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
    public function create(Request $request)
    {
        $post = new Activity;
        // $post->title = $request->title;
        $post->name = $request->input('name');
        $post->event_id = $request->input('event');
        $post->description = $request->input('description');
        $post->start_time = $request->input('start_time');
        $post->end_time = $request->input('end_time');
        $post->age_category = $request->input('age_category');
        $post->save();
        return redirect('admin-activity-list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'user_id' => 'required',
        //     'activity_id' => 'required',
        // ]);

        DB::table('activity_participant')->insert([
            'participant_id' => $request->user_id,
            'activity_id' => $request->activity_id,
        ]);

        return redirect()->route('activity-list.index')
                        ->with('success','Activity registered successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // get activity details
        $activity =  DB::table('activity')->where('id', $id)->first();
        // get user and dependent details
        // $users = DB::table('users')->where('id', auth()->user()->id)->get();
        // return view('pages.register-activity', ['activity' => $activity, 'users' => $users]);
        $user = auth()->user();
        $dependents =  DB::table('participant')->where('account_id', $user->id)->get();
       
        return view('pages.register-activity', ['activity' => $activity,  'user' => $user, 'dependents' => $dependents]);
    }

    public function getList()
    {
        $activities = DB::table('activity')->get();
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
