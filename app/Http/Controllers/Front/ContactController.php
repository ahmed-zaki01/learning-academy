<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Message;
use App\Newsletter;
use App\Setting;
use App\Student;


class ContactController extends Controller
{
    public function __invoke()
    {
        $data['settings'] = Setting::first();
        return view('front.contact')->with($data);
    }

    public function handleNewsletter(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:191',
        ]);

        if (Newsletter::create($data)) {
            return back();
        }
    }

    public function handleContact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'subject' => 'required|string|max:191',
            'message' => 'required|string|',
        ]);

        if (Message::create($data)) {
            return back();
        }
    }

    public function handleEnroll(Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'nullable|string|max:191',
            'spec' => 'nullable|string|max:191',
        ]);

        $student = Student::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'spec' => $data['spec'],
        ]);

        $studentId = $student->id;

        DB::table('course_student')->insert([
            'course_id' => $data['course_id'],
            'student_id' => $studentId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back();
    }
}
