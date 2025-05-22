<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //  Display a listing of the resource. 
    public function index()
    {
        $data['courses'] = DB::table('courses')
            ->where('status',1)
            ->get();
        return view('courses.index', $data);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('courses.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'syllabus' => $r->syllabus,
            'duration' => $r->duration,
        );

        $insert = DB::table('courses')->insert($data);

        // check condition
        if($insert){
            return redirect()->route('courses.create')
                ->with('success', 'Data has been saved successfully!');
        }else{
            return redirect()->route('courses.create')
                ->with('error', 'Data has saved unsuccessful! ');
        }
    }

    //  Display the specified resource.
    public function show(string $id)
    {
        $data = DB::table('courses')->find($id);

        return view('courses.show', compact('data'));
    }

    //   * Show the form for editing the specified resource.
    public function edit(string $id)
    {
        $edit['edit'] = DB::table('courses')->find($id);
        
        return view('courses.edit', $edit);
    }

    // * Update the specified resource in storage.
    public function update(Request $r, string $id)
    {
        $data = array(
            'name' => $r->name,
            'syllabus' => $r->syllabus,
            'duration' => $r->duration,
        );

        $update = DB::table('courses')
            ->where('id', $id)
            ->update($data);
        
        if($update){
            return redirect()->route('courses.index', $id)
                ->with('success', 'Data has been updated!');
        }else{
            return redirect()->route('courses.edit', $id)
                ->with('error', 'Failed to update data!',);
        }
    }

    // * Remove the specified resource from storage.
    public function delete(string $id)
    {
        $del = DB::table('courses')
            ->where('id', $id)
            ->update(['status'=>0]);

        if($del){
            return redirect()->route('courses.index')
                ->with('success', 'Data has been removed!');
        }else{
            return redirect()->route('courses.index')
                ->with('error', 'Failed to remove data!',);
        }
    }
}
