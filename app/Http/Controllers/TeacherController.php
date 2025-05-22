<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TeacherController extends Controller
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
        $data['teachers'] = DB::table('teachers')
            ->where('status', 1)
            ->get(); 
        return view('teachers.index',$data);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $data = array(
            'name'   => $r->name,
            'gender' => $r->gender,
            'address'=> $r->address,
            'mobile' => $r->mobile,
            'status' => $r->status,
        );

        $insert = DB::table('teachers')->insert($data);

        if($insert){
            return redirect()->route('teachers.create')
                ->with('success','Data has been saved successful!');
        }else{
            return redirect()->route('teachers.create')
                ->with('error','Failed to save data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $show = DB::table('teachers')->find($id);
        return view('teachers.show', compact('show'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit['edit'] = DB::table('teachers')->find($id);

        return view('teachers.edit', $edit);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $data = array(
            'name' => $r->name,
            'gender' => $r->gender,
            'address'=> $r->address,
            'mobile' => $r->mobile,
            'status' => $r->status,
        );

        $update = DB::table('teachers')
                ->where('id',$id)
                ->update($data);
        if($update){
            return redirect()->route('teachers.edit', $id)
                ->with('success', 'Data has been updated !');
        }else{
            return redirect()->route('teachers.edit',$id)
                ->with('error', 'Failed to update data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $del = DB::table('teachers')
            ->where('id', $id)
            ->update(['status'=>2]);

        if($del){
            return redirect()->route('teachers.index',)
                ->with('success', 'Data has been removed !');
        }
    }
}
