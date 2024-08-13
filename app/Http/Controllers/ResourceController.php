<?php

namespace App\Http\Controllers;

use App\Models\Tank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Tank::all();
        return view('index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'shark_level' => 'required|numeric'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('tanks/create')
                ->withErrors($validator)
                ->withInput();
        }

        $tank = new Tank;
        $tank->name = $request->input('name');
        $tank->email = $request->input('email');
        $tank->shark_level = $request->input('shark_level');
        $tank->save();

        return redirect('tanks')->with('message', 'Tank created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tank = Tank::findOrFail($id);
        return view('show', compact('tank'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tank = Tank::findOrFail($id);
        return view('edit', compact('tank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'shark_level' => 'required|numeric'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('tanks.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        $tank = Tank::findOrFail($id);
        $tank->name = $request->input('name');
        $tank->email = $request->input('email');
        $tank->shark_level = $request->input('shark_level');
        $tank->save();

        return redirect('tanks')->with('message', 'Successfully updated tank!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tank = Tank::findOrFail($id);
        $tank->delete();

        return redirect('tanks')->with('message', 'Successfully deleted the tank!');
    }
}
