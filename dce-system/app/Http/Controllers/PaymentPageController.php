<?php

namespace App\Http\Controllers;

class PaymentPageController extends Controller
{
    public function show()
    {
        return view('auth.payment-page');
    }
}
