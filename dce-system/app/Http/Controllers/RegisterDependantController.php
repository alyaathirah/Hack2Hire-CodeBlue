<?php

namespace App\Http\Controllers;
use App\Models\Participant;
use Illuminate\Http\Request;

class RegisterDependantController extends Controller
{
    public function create()
    {
        return view('auth.register-dependant');
    }

    public function store(Request $request)
    {
        $adult_qty = request()->adult;
        $child_qty = request()->child;
        $total =  intval($adult_qty) + intval($child_qty);
        return view('auth.register-event', ['adult' => $adult_qty , 'child' => $child_qty, 'total' => $total]);
    }
}
