<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cat;

class CatController extends Controller
{
    public function index()
    {
        $data['cats'] = Cat::select('id', 'name')->orderBy('id', 'DESC')->get();

        return view('dashboard.cats.index')->with($data);
    }

    public function create()
    {
        return view('dashboard.cats.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:40']);
        Cat::create($data);
        return redirect(route('admin.cats'));
    }

    public function edit($id)
    {
        $data['cat'] = Cat::findOrFail($id);
        return view('dashboard.cats.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:40']);
        Cat::findOrFail($request->id)->update($data);
        return redirect(route('admin.cats'));
    }

    public function destroy($id)
    {
        Cat::findOrFail($id)->delete();
        return redirect(route('admin.cats'));
    }
}
