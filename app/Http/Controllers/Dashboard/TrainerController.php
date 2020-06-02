<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Trainer;
use Image;

class TrainerController extends Controller
{
    public function index()
    {
        $data['trainers'] = Trainer::select('id', 'name', 'spec', 'phone', 'email', 'img')->orderBy('id', 'DESC')->get();

        return view('dashboard.trainers.index')->with($data);
    }

    public function create()
    {
        return view('dashboard.trainers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:60',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
            'spec' => 'required|string|max:40',
            'img' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $imgNewName = $data['img']->hashName();
        Image::make($data['img'])->resize(70, 70)->save(public_path('uploads/trainers/' . $imgNewName));
        $data['img'] = $imgNewName;
        Trainer::create($data);
        return redirect(route('admin.trainers'));
    }

    public function edit($id)
    {
        $data['trainer'] = Trainer::findOrFail($id);
        return view('dashboard.trainers.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:60',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
            'spec' => 'required|string|max:40',
            'img' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);

        $imgOldName = Trainer::findOrFail($request->id)->img;

        if ($request->hasFile('img')) {
            Storage::disk('uploads')->delete('trainers/' . $imgOldName);
            $imgNewName = $data['img']->hashName();
            Image::make($data['img'])->resize(70, 70)->save(public_path('uploads/trainers/' . $imgNewName));
            $data['img'] = $imgNewName;
        } else {
            $data['img'] = $imgOldName;
        }


        Trainer::findOrFail($request->id)->update($data);
        return redirect(route('admin.trainers'));
    }

    public function destroy($id)
    {
        $img = Trainer::findOrFail($id)->img;
        Storage::disk('uploads')->delete('trainers/' . $img);
        Trainer::findOrFail($id)->delete();
        return redirect(route('admin.trainers'));
    }
}
