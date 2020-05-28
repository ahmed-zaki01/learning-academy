<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Course;
use App\Student;
use App\Trainer;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        // data of counter section
        $data['courseNum'] = Course::count();
        $data['trainerNum'] = Trainer::count();
        $data['studentNum'] = Student::count();

        return view('front.about')->with($data);
    }
}
