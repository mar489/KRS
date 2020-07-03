<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function confid()
    {
        return view('info.confidentiality_info');
    }

    public function offer()
    {
        return view('info.public_offer_info');
    }

    public function coop()
    {
        return view('info.cooperation_info');
    }

    public function contacts()
    {
        return view('info.contacts_info');
    }

    public function delivery()
    {
        return view('info.delivery_info');
    }

    public function payment()
    {
        return view('info.payment_info');
    }

    public function faq()
    {
        return view('info.faq_info');
    }
}
