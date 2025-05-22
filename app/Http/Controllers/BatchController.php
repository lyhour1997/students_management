<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $data['batches'] = DB::table('batches')
            ->select('batches.*', 'courses.name as cname')
            ->join('courses', 'batches.course_id', 'courses.id')
            ->get();

        return view('batches.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = DB::table('courses')->get();

        return view('batches.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
    
        $data = array(
            'name'     => $r->name,
            'course_id'=> $r->course_id,
            'start_date' => $r->start_date,
        );

        $insert = DB::table('batches')->insert($data);

        // check condition
        if($insert){
            return redirect()->route('batches.create')
                ->with('success', 'Data has been saved successfully!');
        }else{
            return redirect()->route('batches.create')
                ->with('error', 'Data has saved unsuccessful! ');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('batches')
            ->where('batches.id', $id)
            ->select('batches.*', 'courses.name as cname')
            ->join('courses', 'batches.course_id', 'courses.id')
            ->first();

        return view('batches.show', compact('data'));    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit['edit'] = DB::table('batches')->find($id);
        $data = DB::table('courses')->get();
        
        return view('batches.edit', $edit, compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {

        $data = array(
            'name'     => $r->name,
            'course_id'=> $r->course_id,
            'start_date' => $r->start_date,
        );

        $update = DB::table('batches')
            ->where('id', $id)
            ->update($data);
        
        if($update){
            return redirect()->route('batches.index', $id)
                ->with('success', 'Data has been updated!');
        }else{
            return redirect()->route('batches.edit', $id)
                ->with('error', 'Failed to update data!',);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $del = DB::table('batches')
            ->where('id', $id)
            ->update(['status'=>0]);

        if($del){
            return redirect()->route('batches.index')
                ->with('success', 'Data has been removed!');
        }else{
            return redirect()->route('batches.index')
                ->with('error', 'Failed to remove data!',);
        }
    }
}
