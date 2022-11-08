<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index()
    {
        $event = DB::table('event')->where('id', '1')->first();
        $users = DB::table('participant')
            ->select([ 'participant.id', 'participant.firstname', 'participant.lastname',DB::raw('group_concat(activity.name) AS activity') ,'participant.age_category', 'participant.code', 'participant.age_category'])
            ->join('activity_participant', 'participant.id', '=', 'activity_participant.participant_id')
            ->join('activity', 'activity.id', '=', 'activity_participant.activity_id')
            ->groupBy('participant.id')
            ->where('participant.account_id', '=', '1')
            ->get();

        return view('pages.ticket-page', ['event' => $event, 'users' => $users]);
    }
}
