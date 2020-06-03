<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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
            'email' => 'required|email',
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
            'email' => 'required|email',
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
}
