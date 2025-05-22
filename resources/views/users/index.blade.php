@extends('layouts.master')
@section('content')
    <h2 class="py-3">Users Application</h1>
    <hr class="py-2">

    {{-- condition --}}
    @component('components.message') 
    @endcomponent

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

{{-- tbale --}}
    <table class="table table-bordered mt-2">
        <thead>
            <tr>
                <th class="fs-5">#</th>
                <th class="fs-5">Name</th>
                <th class="fs-5">UserName</th>
                <th class="fs-5">Email</th>
                <th class="fs-5 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $stu)
                <tr>
                    <td>{{$stu->id}}</td>
                    <td>{{$stu->name}}</td>
                    <td>{{$stu->username}}</td>
                    <td>{{$stu->email}}</td>
                    <td class="text-center">
                        
                        <a href="{{route('users.edit', $stu->id)}}" class="btn px-2 btn-sm btn-success">
                            <i class="fa-solid fa-user-pen"></i>
                        </a>
                        <a href="{{route('users.delete', $stu->id)}}" class="btn px-2 btn-sm btn-danger" 
                                onclick="return confirm('Are you sure?')">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection