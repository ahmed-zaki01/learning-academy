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
            'name' => 'nullable|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'nullable|string|max:191',
            'spec' => 'nullable|string|max:191',
        ]);

        $oldStudent = Student::select('id')->where('email', $data['email'])->first();

        if (!$oldStudent) {
            $student = Student::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'spec' => $data['spec'],
            ]);

            $studentId = $student->id;
        } else {
            $studentId = $oldStudent->id;
            $studentCourses = DB::table('course_student')->select('course_id')->where('student_id', $studentId)->get();
            foreach ($studentCourses as $courseId) {
                if ($data['course_id'] == $courseId->course_id) {
                    return redirect(route('courseDetails', $data['course_id']))->withErrors(['msg' => 'You are already registered!']);
                }
            }
            if ($data['name'] || $data['spec'] || $data['phone']) {
                $oldStudent->update(['name' => $data['name']]);
            }
            if ($data['spec']) {

                $oldStudent->update(['spec' => $data['spec']]);
            }
            if ($data['phone']) {

                $oldStudent->update(['phone' => $data['phone']]);
            }
        }

        DB::table('course_student')->insert([
            'course_id' => $data['course_id'],
            'student_id' => $studentId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back();
    }
}
