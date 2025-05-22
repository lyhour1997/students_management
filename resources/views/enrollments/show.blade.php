@extends('layouts.master')
@section('content')

    <h3 class="py-3">Detailed information</h3>
    <hr>

    <div class="card col-5 my-3">
        <h3 class="text-center py-2">Enrollments</h3>
        <h5 class="py-2 px-3" > Name      : {{$data->enroll}}</h5>
        <h5 class="py-2 px-3" > Student   : {{$data->student}}</h5>
        <h5 class="py-2 px-3" > Join_date : {{$data->join_date}} </h5>
        <h5 class="py-2 px-3" > Fee       : {{$data->fee}} </h5>
        
    </div>

    <a href="{{route('enrolls.index')}}" class="btn btn-primary btn-sm px-3">Back</a>

@endsection