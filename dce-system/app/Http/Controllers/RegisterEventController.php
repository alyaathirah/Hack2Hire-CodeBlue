<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\Participant;

class RegisterEventController extends Controller
{
    public function create()
    {
        return view('auth.register-event');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'firstname' => 'required|max:255|min:2',
            'lastname' => 'required|max:255|min:2',
            'employee_status' => 'required',
            'worksite' => 'required',
            'phone' => 'required',
            'shirt_size' => 'required',
            'age_category' => 'required',
            'code' => 'required',
            'attend_time' => 'required',
            'registration_fee' => 'required',
            'ngo_id' => 'required',
            'account_id' => 'required'
        ]);
    }
}
