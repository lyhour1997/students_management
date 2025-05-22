<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display a listing of the resource.
    public function index()
    {
        $data['student'] = DB::table('students')
            ->where('active','=', 2)
            ->orderBy('id', 'DESC')
            ->paginate('4');
        return view('students.index', $data);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('students.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $r)
    {
        // check validate
        $r->validate(
            [
                'name' => [
                    'required',
                    'min:3',
                    'max:50',
                    'unique:students,name',
                    'not_regex:/^\s*$/', // Reject only spaces
                ],
                
                'gender'  => 'required|max:50',
                'address' => 'required|min:2|max:50',
                'mobile'  => 'required|min:3|max:50',
            ]
        );

        // catch each values from input 
        $data = array(
            'name'     => $r->name,
            'gender'   => $r->gender,
            'address'  => $r->address,
            'mobile'   => $r->mobile,
            'active'   => $r->active,
        );
        
        // insert data to db
        $save = DB::table('students')->insert($data);

        // check condition
        if($save){
            return redirect()->route('student.create')
                ->with('success', 'Data has been saved successfully!');
        }else{
            return redirect()->route('student.create')
                ->with('error', 'Data has saved unsuccessful! ');
        }

    }

    // Display the specified resource. the same edit
    public function show(string $id)
    {
        $show = DB::table('students')->find($id);

        return view('students.show', compact('show'));

    }

    // Show the form for editing the specified resource.
    public function edit(string $id)
    {
        // step 1
        $eId['eId'] = DB::table('students')->find($id);
        return view('students.edit', $eId);

        // return view('students.edit', compact('edit')); when we not throw message

    }

    // Update the specified resource in storage.
    public function update(Request $r, string $id)
    {

        $r->validate(
            [
                'name' => 'required|unique:students,name,' . $id . ',id',
            ]
        );

        // catch all values in form
        $data = array(
            'name'    => trim($r->name),
            'gender'  => $r->gender,
            'address' => $r->address,
            'mobile'  => $r->mobile,
            'active'  => $r->active,
        );

        // push data to db 
        $update = DB::table('students')
            ->where('id', $id)
            ->update($data);

        if($update){
            return redirect()->route('student.index',$id)
                ->with('success', 'Data has been updated successful!');
        }else{
            return redirect()->route('student.edit',$id)
                ->with('error', 'Failed to update data!');
        }
    }

    // Remove the specified resource from storage.
    public function delete(string $id)
    {
        $deleted = DB::table('students')
            ->where('id', $id)
            ->update(['active'=>1]);

        if ($deleted) {
            return redirect()->route('student.index')
                ->with('success', 'Data has been removed!');
        } else {
            return redirect()->route('student.index')
                ->with('error', 'Failed to delete data.');
        }

    }
}
