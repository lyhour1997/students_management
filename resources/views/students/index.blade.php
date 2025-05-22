@extends('layouts.master')
@section('content')
    <h2 class="py-3">Student Application</h1>
    <hr class="py-2">

    {{-- condition --}}
    @component('components.message') 
    @endcomponent

    <div class="pb-4">
        <a href="{{route('student.create')}}" class="btn btn-sm btn-primary py-2 px-3 fw-bold ">
            <i class="fa-solid fa-plus"></i> Add
        </a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="fs-5">#</th>
                <th class="fs-5">Name</th>
                <th class="fs-5">Gender</th>
                <th class="fs-5">Address</th>
                <th class="fs-5">Mobile</th>
                <th class="fs-5">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $stu)
                <tr>
                    <td>{{$stu->id}}</td>
                    <td>{{$stu->name}}</td>
                    <td>{{$stu->gender}}</td>
                    <td>{{$stu->address}}</td>
                    <td>{{$stu->mobile}}</td>
                    <td>
                        <a href="{{route('student.show', $stu->id)}}" class="btn px-2 btn-sm btn-primary text-light">
                            <i class="fa-solid fa-image"></i>                        </a>
                        <a href="{{route('student.edit', $stu->id)}}" class="btn px-2 btn-sm btn-success">
                            <i class="fa-solid fa-user-pen"></i>
                        </a>
                        <a href="{{route('student.delete', $stu->id)}}" class="btn px-2 btn-sm btn-danger" 
                                onclick="return confirm('Are you sure?')">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection