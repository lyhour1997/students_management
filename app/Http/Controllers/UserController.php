<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;

class UserController extends Controller
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
        $data['users'] = DB::table('users')
            ->orderBy('id', 'desc')
            ->get();

        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
                
                'username'  => 'required|max:50',
                'email'     => 'required|min:2|max:50',
                'password'  => 'required|min:3|max:50',
            ]
        );

         // catch each values from input 
        $data = array(
            'name'     => $r->name,
            'username' => $r->username,
            'email'    => $r->email,
            'password' => bcrypt($r->password),
           
        );
        
        // insert data to db
        $save = DB::table('users')->insert($data);

        // check condition
        if($save){
            return redirect()->route('users.create')
                ->with('success', 'Data has been saved successfully!');
        }else{
            return redirect()->route('users.create')
                ->with('error', 'Data has saved unsuccessful! ');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['edit'] = DB::table('users')->find($id);
        
        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
           // catch each values from input 
        $data = array(
            'name'     => $r->name,
            'username' => $r->username,
            'email'    => $r->email,
            'password' => bcrypt($r->password),
           
        );
        
        // insert data to db
        $save = DB::table('users')
            ->where('id', $id)
            ->update($data);

        // check condition
        if($save){
            return redirect()->route('users.index')
                ->with('success', 'Data has been saved successfully!');
        }else{
            return redirect()->route('users.index')
                ->with('error', 'Data has saved unsuccessful! ');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $del = DB::table('users')
            ->where('id', $id)
            ->update(['active'=>0]);
        
        if($del){
            return redirect()->route('users.index',$id)
                ->with('success','Data has been removed!');
        }
    }

}
