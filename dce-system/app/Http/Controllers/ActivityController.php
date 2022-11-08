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
        $p = explode(",", $request->input('participant_id'));
        foreach ($p as $part_id) {
            DB::table('activity_participant')->insert([
                'participant_id' => $part_id,
                'activity_id' => $request->activity_id,
            ]);
        }

        $activities = DB::table('activity')->get();
        return view('pages.activity-list', ['activities' => $activities, 'success' => 'You have successfully registered for the activity.']);
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

    // ADMIN
    public function getList()
    {
        $activities = DB::table('activity')->get();
        return view('pages.admin-activity-list', ['activities' => $activities]);
    }

    public function create(Request $request)
    {
        $post = new Activity;
        $post->name = $request->input('name');
        $post->event_id = $request->input('event');
        $post->description = $request->input('description');
        $post->start_time = $request->input('start-time');
        $post->end_time = $request->input('end-time');
        $post->age_category = $request->input('age-category');
        $post->save();
        return redirect('admin-activity-list');
    }

    public function showParticipant(Request $request, $id)
    {
        $participants =  DB::table('participant')
                            ->select('firstname', 'lastname', 'phone','age_category', 'employee_status')
                            ->leftjoin('activity_participant', 'activity_participant.participant_id', '=', 'participant.id')
                            ->where('activity_participant.activity_id', $id)
                            ->get();

        $activity = DB::table('activity')
                            ->select('name')
                            ->where('id', $id)
                            ->get();

        return view('pages.admin-activity-participant', ['participants' => $participants, 'activity' => $activity]);
    }

    public function editSession($id)
    {
        $activityData = DB::table('activity')
                            ->where('id', $id)
                            ->get();

        return redirect('admin-activity-list')->with('edit-activity', $activityData);
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
