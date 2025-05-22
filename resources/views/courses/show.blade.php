@extends('layouts.master')
@section('content')

    <h3 class="py-3">Detailed information</h3>
    <hr>

    <div class="card col-5 my-3">
        <h3 class="text-center py-2">Courses</h3>
        <h5 class="py-2 px-3" > Name   : {{$data->name}}</h5>
        <h5 class="py-2 px-3" > Gender : {{$data->syllabus}}</h5>
        <h5 class="py-2 px-3" > Address: {{$data->duration}} </h5>
        
    </div>

    <a href="{{route('courses.index')}}" class="btn btn-primary btn-sm px-3">Back</a>

@endsection