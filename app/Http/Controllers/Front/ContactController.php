<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data['settings'] = Setting::first();
        return view('front.contact')->with($data);
    }
}
