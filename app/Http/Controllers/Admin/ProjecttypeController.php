<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreprojecttypeRequest;
use App\Http\Requests\UpdateprojecttypeRequest;
use App\Models\projecttype;

class ProjecttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //
         $projecttypes = projecttype::orderBy('id','desc')->paginate(5);
         return view('admin.projecttypes.index', compact('projecttypes'));
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
    public function store(StoreprojecttypeRequest $request)
    {
         //
         $request->validate([
            'type_name' => 'required',
        ]);
        $validated = $request->post();
        
        projecttype::create($validated);

        return redirect()->route('projecttypes.index')->with('success','projecttype has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(projecttype $projecttype)
    {
           //
           return view('admin.projecttypes.show',compact('projecttype'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(projecttype $projecttype)
    {
         //
         return view('admin.projecttypes.edit',compact('projecttype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateprojecttypeRequest $request, projecttype $projecttype)
    {
       //
       $request->validate([
            'type_name' => 'required',
        ]);
        $validated = $request->post();

        $projecttype->fill($request->post())->save();

        

        return redirect()->route('projecttypes.index')->with('success','projecttypes Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(projecttype $projecttype)
    {
        //
        $projecttype->delete();
        return redirect()->route('projecttypes.index')->with('success','projecttypes has been deleted successfully');
    }
}
