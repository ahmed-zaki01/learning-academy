<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Course;
use App\Student;
use App\Test;
use App\Trainer;

class HomeController extends Controller
{
    public function index()
    {
        // data of course card section
        $data['courses'] = Course::select('id', 'cat_id', 'trainer_id', 'name', 'price', 'short_desc', 'img')->orderBy('id', 'desc')->take(3)->get();

        // data of counter section
        $data['courseNum'] = Course::count();
        $data['trainerNum'] = Trainer::count();
        $data['studentNum'] = Student::count();

        $data['tests'] = Test::select('student_id', 'desc', 'img')->take(3)->get();

        //dd($data['tests']);

        return view('front.index')->with($data);
    }
}
