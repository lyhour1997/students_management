@extends('layouts.master')

@section('content')
    <h2 class="py-3">Courses Application</h2>
    <hr class="py-2">

{{-- search and create --}}
    <div class="d-flex justify-content-between align-content-center py-2">
        <a href="{{route('courses.create')}}" class="btn btn-success fw-bold ">
            <i class="fas fa-plus"></i> Create
        </a>

        <form action="" class="pt-1">
            <input type="text" name="" class="py-sm-1" placeholder=" Seacher ...">
            <button type="submit" class="px-2 py-1">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    @component('components.message') @endcomponent

{{-- table  --}}
    <table class="table table-bordered border-gray-800 my-3">
        <thead>
            <tr>
                <th class="fs-5">#</th>
                <th class="fs-5">Name</th>
                <th class="fs-5">Syllabus</th>
                <th class="fs-5">Duration</th>
                {{-- <th class="fs-5">Status</th> --}}
                <th class="fs-5">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->name}}</td>
                    <td>{{$c->syllabus}}</td>
                    <td>{{$c->duration}}</td>
                    {{-- <td>{{$c->status}}</td> --}}
                    <td>
                        <a href="{{route('courses.show', $c->id)}}" class="btn btn-sm px-2 btn-primary">
                            <i class="fas fa-eye"></i> 
                        </a>
                        <a href="{{route('courses.edit', $c->id)}}" class="btn btn-sm px-2 btn-success">
                            <i class="fas fa-edit"></i> 
                        </a>
                        <a href="{{route('courses.delete', $c->id)}}" 
                            onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm px-2">
                            <i class="fas fa-trash-alt"></i> 
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    

@endsection