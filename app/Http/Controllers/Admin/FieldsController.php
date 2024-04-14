<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorefieldsRequest;
use App\Http\Requests\UpdatefieldsRequest;
use App\Models\fields;

class FieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fields = fields::orderBy('id','desc')->paginate(5);
        return view('admin.fields.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorefieldsRequest $request)
    {
        //
        $request->validate([
            'field_name' => 'required',
        ]);
        $validated = $request->post();
        
        fields::create($validated);

        return redirect()->route('fields.index')->with('success','Field has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(fields $field)
    {
         //
         return view('admin.fields.show',compact('field'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fields $field)
    {
        //
        return view('admin.fields.edit',compact('field'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatefieldsRequest $request, fields $field)
    {
        //
        $request->validate([
            'field_name' => 'required',
        ]);
        $validated = $request->post();

        $field->fill($request->post())->save();

        

        return redirect()->route('fields.index')->with('success','fields Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(fields $field)
    {
        //
        $field->delete();
        return redirect()->route('fields.index')->with('success','fields has been deleted successfully');
    }
}
