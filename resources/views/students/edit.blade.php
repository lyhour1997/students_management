@extends('layouts.master')
@section('content')
    <h1 class="my-3">Edit Form</h1>
    <hr class="py-2">
    
    @component('components.message')
        
    @endcomponent

    <form action="{{route('student.update', $eId->id)}}" method="POST">

        @csrf
        {{-- for updating data --}}
        @method('PATCH')  

        <div class="row">
            <div class="col-sm-9">
                <div class="form-group row my-3">
                    <label for="name" class="col-sm-3 fs-5">Name</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="name" value="{{$eId->name}}"
                             class="form-control border-secondary">
                    </div>
                </div>

                <div class="form-group row my-3">
                    <label for="gender" class="col-sm-3 fs-5">Gender</label>
                    <div class="col-sm-7 ">
                        {{-- === use with string and == use with integer --}}
                        <select name="gender" class="form-control border-secondary">
                            <option value="Female" {{$eId->gender === 'Female' ? 'selected' : ''}}>Female</option>
                            <option value="Male" {{$eId->gender === 'Male'   ? 'selected' : ''}}>Male</option>
                        </select>

                    </div>
                </div>

                <div class="form-group row my-3">
                    <label for="address" class="col-sm-3 fs-5">Address</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="address" value="{{$eId->address}}"
                            class="form-control border-secondary">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="mobile" class="col-sm-3 fs-5">Mobile</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="mobile" value="{{$eId->mobile}}"
                            class="form-control border-secondary">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="active" class="col-sm-3 fs-5">Active</label>
                    <div class="col-sm-7 ">
                        {{-- === use with string and == use with integer --}}
                        <select name="active" class="form-control border-secondary">
                            <option value="1" {{$eId->active == '1' ? 'selected' : ''}}>1</option>
                            <option value="2" {{$eId->active == '2' ? 'selected' : ''}}>2</option>
                        </select>

                        
                    </div>
                </div>

                <div class="form-group row my-2">
                    <label for="" class="col-sm-3"></label>
                    <div class="col-sm-7 text-end ">
                        <a href="{{route('student.index')}}" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-right-left"></i>  Back 
                        </a>
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fa-solid fa-download"></i> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </form>

@endsection