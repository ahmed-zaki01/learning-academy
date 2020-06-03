<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Course;
use App\Cat;
use App\Trainer;
use Image;

class CourseController extends Controller
{
    public function index()
    {
        $data['courses'] = Course::select('id', 'cat_id', 'trainer_id', 'name', 'price', 'img')->paginate(10);

        return view('dashboard.courses.index')->with($data);
    }

    public function create()
    {
        $data['cats'] = Cat::select('id', 'name')->get();
        $data['trainers'] = Trainer::select('id', 'name')->get();
        return view('dashboard.courses.create')->with($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:60',
            'price' => 'required|integer',
            'short_desc' => 'required|string|max:191',
            'desc' => 'required|string',
            'cat_id' => 'required|exists:cats,id',
            'trainer_id' => 'required|exists:trainers,id',
            'img' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $imgNewName = $data['img']->hashName();
        Image::make($data['img'])->resize(570, 591)->save(public_path('uploads/courses/' . $imgNewName));
        $data['img'] = $imgNewName;
        Course::create($data);
        return redirect(route('admin.courses'));
    }

    public function edit($id)
    {
        $data['course'] = Course::findOrFail($id);
        $data['cats'] = Cat::select('id', 'name')->get();
        $data['trainers'] = Trainer::select('id', 'name')->get();
        return view('dashboard.courses.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:60',
            'price' => 'required|integer',
            'short_desc' => 'required|string|max:191',
            'desc' => 'required|string',
            'cat_id' => 'required|exists:cats,id',
            'trainer_id' => 'required|exists:trainers,id',
            'img' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);

        $imgOldName = Course::findOrFail($request->id)->img;

        if ($request->hasFile('img')) {
            Storage::disk('uploads')->delete('courses/' . $imgOldName);
            $imgNewName = $data['img']->hashName();
            Image::make($data['img'])->resize(570, 591)->save(public_path('uploads/courses/' . $imgNewName));
            $data['img'] = $imgNewName;
        } else {
            $data['img'] = $imgOldName;
        }


        Course::findOrFail($request->id)->update($data);
        return redirect(route('admin.courses'));
    }

    public function destroy($id)
    {
        $img = Course::findOrFail($id)->img;
        Storage::disk('uploads')->delete('courses/' . $img);
        Course::findOrFail($id)->delete();
        return redirect(route('admin.courses'));
    }
}
