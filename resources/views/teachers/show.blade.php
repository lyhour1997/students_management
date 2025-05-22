@extends('layouts.master')
@section('content')
    <h1 class="py-3">Detail Information</h1>
    <hr class="py-3">

    <a class="btn btn-sm btn-primary mb-3" href="{{route('teachers.index')}}"> 
        <i class="fa-solid fa-right-left"></i> Back
    </a>

    <div class="card col-sm-4 p-3">
        <h2 class="text-center mb-4">Teacher</h2>
        <p class="pt-1"> <span class="fw-bold"> Name    </span> = {{$show->name}} </p>
        <p class="pt-1"> <span class="fw-bold"> Gender  </span> = {{$show->gender}} </p>
        <p class="pt-1"> <span class="fw-bold"> Address </span> = {{$show->address}} </p>
        <p class="pt-1"> <span class="fw-bold"> Mobile  </span> = {{$show->mobile}} </p>
    </div>
@endsection