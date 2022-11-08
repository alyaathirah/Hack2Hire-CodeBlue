<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\Participant;
use Illuminate\Http\Request;

class RegisterEventController extends Controller
{
    public function create()
    {
        return view('auth.register-event');
    }

    // public function show()
    // {
    //     return view('auth.payment-page');
    // }

    public function store(Request $request)
    {
        $adult_qty = request()->adult;
        $child_qty = request()->child;
        $total =  intval($adult_qty) + intval($child_qty);
        return view('auth.register-event', ['adult' => $adult_qty , 'child' => $child_qty, 'total' => $total]);
    }

    public function add(Request $request)
    {
        $participants = [];

        $index = 0;
        $firstname =  $request->input('firstname', []);
        foreach ($firstname as $fn) {
            $participants[] = [
                "firstname" => $firstname[$index],
                "lastname" => $request->lastname[$index],
                'employee_status' => $request->employee_status[$index],
                "worksite" => $request->worksite[$index],
                "phone" => $request->phone[$index],
                "shirt_size" => $request->shirt_size[$index],
                // "age_category" => $request->age_category[$index],
                // "registration_fee" => $request->registration_fee[$index],
                "ngo_id" => $request->ngo_id[$index],
                // "account_id" => $request->account_id[$index]
            ];
            $index++;
        }

        // foreach ($request->$participants_number as $index => $participant) {
        //     $participants[] = [
        //         "firstname" => $firstname[$index],
        //         "lastname" => $lastname[$index],
        //         'employee_status' => $employee_status[$index],
        //         "worksite" => $worksite[$index],
        //         "phone" => $phone[$index],
        //         "shirt_size" => $shirt_size[$index],
        //         // "age_category" => $age_category[$index],
        //         // "registration_fee" => $registration_fee[$index],
        //         "ngo_id" => $ngo_id[$index],
        //         // "account_id" => $account_id[$index]
        //     ];
        // }

        $created = Participant::insert($participants);
        return view('auth.payment-page');
    }
}
