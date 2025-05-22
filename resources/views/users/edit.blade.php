@extends('layouts.master')
@section('content')
    <h2 class="py-3">Edit Form</h2>
    <hr class="pb-3">

{{-- check conditon --}}
    @component('components.message') 
    @endcomponent

    <form action="{{route('users.update', $edit->id)}}" method="POST">

        @csrf

        @method('PATCH')

        <div class="row">
            <div class="col-sm-9">
                <div class="form-group row my-3">
                    <label for="name" class="col-sm-3 fs-5">Name</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="name" value="{{$edit->name}}"
                            class="form-control border-secondary">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="username" class="col-sm-3 fs-5">UserName</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="username"  value="{{$edit->username}}"
                             class="form-control border-secondary">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="email" class="col-sm-3 fs-5">Email</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="email"  value="{{$edit->email}}"
                            class="form-control border-secondary">
                    </div>
                </div>

                <div class="form-group row my-3">
                    <label for="password" class="col-sm-3 fs-5">Password</label>
                    <div class="col-sm-7 ">
                        <input type="password"  name="password" 
                            class="form-control border-secondary">
                        <p class="btn-sm text-success py-3">
                            Keep blank to use the old password!
                        </p>
                    </div>
                </div>

                <div class="form-group row my-2">
                    <label for="" class="col-sm-3"></label>
                    <div class="col-sm-7 text-end ">
                        <a href="{{route('users.index')}}" class=" fw-bold btn btn-sm py-2 btn-primary">
                            <i class="fa-solid fa-right-left"></i>  Back 
                        </a>
                        <button type="submit" class="btn btn-sm py-2 btn-success fw-bold">
                            <i class="fa-solid fa-download"></i> Save
                        </button>
                    </div>
                </div>
            </div>
            
        </div>

    </form>
    
@endsection