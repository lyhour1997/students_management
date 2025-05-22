@extends('layouts.master')
@section('content')
    <h2 class="py-3">Teacher Application</h2>   
    <hr class="py-2 border-dark">

{{-- search and create --}}
    <div class="d-flex justify-content-between align-content-center py-2">
        <a href="{{route('teachers.create')}}" class="btn btn-success fw-bold ">
            <i class="fas fa-plus"></i> Create
        </a>

        <form action="" class="pt-1">
            <input type="text" name="" class="py-sm-1" placeholder=" Seacher ...">
            <button type="submit" class="px-2 py-1">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

{{-- table  --}}
    <table class="table table-bordered border-gray-800 my-3">
        <thead>
            <tr>
                <th class="fs-5">#</th>
                <th class="fs-5">Name</th>
                <th class="fs-5">Gender</th>
                <th class="fs-5">Address</th>
                <th class="fs-5">Mobile</th>
                <th class="fs-5">Status</th>
                <th class="fs-5">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $t)
                <tr>
                    <td>{{$t->id}}</td>
                    <td>{{$t->name}}</td>
                    <td>{{$t->gender}}</td>
                    <td>{{$t->address}}</td>
                    <td>{{$t->mobile}}</td>
                    <td>{{$t->status}}</td>
                    <td>
                        <a href="{{route('teachers.show', $t->id)}}" class="btn btn-sm px-2 btn-primary">
                            <i class="fas fa-eye"></i> 
                        </a>
                        <a href="{{route('teachers.edit', $t->id)}}" class="btn btn-sm px-2 btn-success">
                            <i class="fas fa-edit"></i> 
                        </a>
                        <a href="{{route('teachers.delete', $t->id)}}" 
                            onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm px-2">
                            <i class="fas fa-trash-alt"></i> 
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection