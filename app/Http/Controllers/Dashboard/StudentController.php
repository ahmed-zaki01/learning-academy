<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Student;
use App\Course;

class StudentController extends Controller
{
    public function index()
    {
        $data['students'] = Student::select('id', 'name', 'phone', 'email', 'spec')->orderBy('id', 'DESC')->paginate(10);
        return view('dashboard.students.index')->with($data);
    }

    public function create()
    {
        return view('dashboard.students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:60',
            'email' => 'required|email|max:75|unique:students',
            'phone' => 'nullable|string|max:50',
            'spec' => 'required|string|max:40',
        ]);

        Student::create($data);
        return redirect(route('admin.students'));
    }

    public function edit($id)
    {
        $data['student'] = Student::findOrFail($id);
        return view('dashboard.students.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:60',
            'email' => 'required|email|max:75|unique:students',
            'phone' => 'nullable|string|max:50',
            'spec' => 'required|string|max:40',
        ]);

        Student::findOrFail($request->id)->update($data);
        return redirect(route('admin.students'));
    }

    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        return redirect(route('admin.students'));
    }

    public function showCourses($id)
    {
        $data['studentId'] = $id;
        $data['studentName'] = Student::select('name')->where('id', $id)->first();
        $data['courses'] = Student::findOrFail($id)->courses;
        //dd($data['courses']);
        return view('dashboard.students.show-courses')->with($data);
    }

    public function approveCourse($id, $courseId)
    {

        $whereData = [
            ['student_id', $id],
            ['course_id', $courseId]
        ];
        DB::table('course_student')->where($whereData)->update(['status' => 'approved']);
        return redirect(route('admin.students.showCourses', $id));
    }
    public function rejectCourse($id, $courseId)
    {
        $whereData = [
            ['student_id', $id],
            ['course_id', $courseId]
        ];
        DB::table('course_student')->where($whereData)->update(['status' => 'rejected']);
        return redirect(route('admin.students.showCourses', $id));
    }
    public function pendCourse($id, $courseId)
    {
        $whereData = [
            ['student_id', $id],
            ['course_id', $courseId]
        ];
        DB::table('course_student')->where($whereData)->update(['status' => 'pending']);
        return redirect(route('admin.students.showCourses', $id));
    }

    public function addCourse($id)
    {
        $data['studentId'] = $id;
        $data['courses'] = Course::select('id', 'name')->get();
        return view('dashboard.students.add-course')->with($data);
    }

    public function storeCourse($id, Request $request)
    {
        $data = $request->validate(['course_id' => 'required|exists:courses,id']);
        $studentCourses = DB::table('course_student')->select('course_id')->where('student_id', $id)->get();
        foreach ($studentCourses as $courseId) {
            if ($data['course_id'] == $courseId->course_id) {
                return redirect(route('admin.students.showCourses', $id));
            }
        }

        DB::table('course_student')->insert([
            'student_id' => $id,
            'course_id' => $data['course_id']
        ]);

        return redirect(route('admin.students.showCourses', $id));
    }
}
