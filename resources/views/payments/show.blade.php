@extends('layouts.master')
@section('content')

    <h3 class="py-3">Detailed information</h3>
    <hr>

    <div class="card col-5 my-3">
        <h3 class="text-center py-2">Payments</h3>
        <h5 class="py-2 px-3" > Enrolls_Id  : {{$payments->ename}}</h5>
        <h5 class="py-2 px-3" > Paid Date   : {{$payments->paid_date}}</h5>
        <h5 class="py-2 px-3" > Amount      : {{$payments->amount}} </h5>
        
    </div>

    <a href="{{route('payments.index')}}" class="btn btn-primary btn-sm px-3">Back</a>

@endsection