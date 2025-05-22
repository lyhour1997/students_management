<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EnrollmentController extends Controller
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
        $data['enrolls'] = DB::table('enrollment')
            ->where('status', '=', 1)    
            ->get();
        return view('enrollments.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('enrollments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
         $data = array(
            'enroll'   => $r->enroll,
            'student' => $r->student,
            'join_date'=> $r->join_date,
            'fee' => $r->fee,
        );

        $insert = DB::table('enrollment')->insert($data);

        if($insert){
            return redirect()->route('enrolls.create')
                ->with('success','Data has been saved successful!');
        }else{
            return redirect()->route('enrolls.create')
                ->with('error','Failed to save data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('enrollment')->find($id);

        return view('enrollments.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit['edit'] = DB::table('enrollment')->find($id);

        return view('enrollments.edit', $edit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $data = array(
            'enroll'   => $r->enroll,
            'student'  => $r->student,
            'join_date'=> $r->join_date,
            'fee'      => $r->fee,
        );

        $update = DB::table('enrollment')
                ->where('id',$id)
                ->update($data);
        if($update){
            return redirect()->route('enrolls.edit', $id)
                ->with('success', 'Data has been updated !');
        }else{
            return redirect()->route('enrolls.edit',$id)
                ->with('error', 'Failed to update data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $del = DB::table('enrollment')
            ->where('id', $id)
            ->update(['status'=>0]);

        if($del){
            return redirect()->route('enrolls.index',)
                ->with('success', 'Data has been removed !');
        }
    }
}
