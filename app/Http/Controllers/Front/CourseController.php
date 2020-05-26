<?php

namespace App\Http\Controllers\Front;

use App\Cat;
use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCat($id) {
        $data['cat'] = Cat::findOrFail($id);
        $data['catCourses'] = Course::where('cat_id', $id)->paginate(3);

        return view('front.courses.cat')->with($data);
    }
}
