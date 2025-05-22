<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class PaymentController extends Controller
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
        $data['payments'] = DB::table('payments')
            ->where('payments.status', 1)
            ->join('enrollment', 'payments.enrollment_id', 'enrollment.id')
            ->select('payments.*', 'enrollment.enroll as ename')
            ->get();
        
        return view('payments.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if we join table, we can select different tables using. 
        $data['enrolls'] = DB::table('enrollment')->get();

        return view('payments.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
         $data = array(
            'enrollment_id' => $r->enrollment_id,
            'paid_date'     => $r->paid_date,
            'amount'        => $r->amount,
            // 'status'        => $r->status,
        );

        $insert = DB::table('payments')->insert($data);

        if($insert){
            return redirect()->route('payments.create')
                ->with('success','Data has been saved successful!');
        }else{
            return redirect()->route('payments.create')
                ->with('error','Failed to save data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['payments'] = DB::table('payments')
            ->where('payments.id', $id)
            ->join('enrollment', 'payments.enrollment_id', 'enrollment.id')
            ->select('payments.*', 'enrollment.enroll as ename')
            ->first();

        return view('payments.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit['edit'] = DB::table('payments')->find($id);
        $data  = DB::table('enrollment')->get();
        
        return view('payments.edit', $edit, compact('data') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $data = array(
            'enrollment_id' => $r->enrollment_id,
            'paid_date'     => $r->paid_date,
            'amount'        => $r->amount,
            // 'status'        => $r->status,
        );

        $update = DB::table('payments')
            ->where('id', $id)
            ->update($data);

        if($update){
            return redirect()->route('payments.index',$id)
                ->with('success','Data has been saved successful!');
        }else{
            return redirect()->route('payments.index',$id)
                ->with('error','Failed to save data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $del = DB::table('payments')
            ->where('id', $id)
            ->update(['status'=>0]);

        if($del){
            return redirect('payments.index',$id)
                ->with('success', "Data has been removed!");
        }
    }
}
