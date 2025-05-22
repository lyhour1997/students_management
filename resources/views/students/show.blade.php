{{-- they use for calling any structure to use --}}
{{-- it means, we create a layout then just extends it use in any form--}}
@extends('layouts.master')  

{{-- use to create content in body --}}
@section('content')
    <h3 class="py-3">Detailed information</h3>
    <hr>

    <div class="card col-5 my-3">
        <h3 class="text-center py-2">Students</h3>
        <h5 class="py-2 px-3" > Name   : {{$show->name}}</h5>
        <h5 class="py-2 px-3" > Gender : {{$show->gender}}</h5>
        <h5 class="py-2 px-3" > Address: {{$show->address}} </h5>
        <h5 class="py-2 px-3" > Mobile : {{$show->mobile}} </h5>
    </div>

    <a href="{{route('student.index')}}" class="btn btn-primary btn-sm px-3">Back</a>

@endsection
