@extends('layouts.master')
@section('content')
    <h1 class=" py-3">Edit Form</h1>
    <hr class=" py-3">

    {{-- check conditon --}}
    @component('components.message') 
    @endcomponent

    <form action="{{route('teachers.update', $edit->id)}}" method="POST">

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
                    <label for="gender" class="col-sm-3 fs-5">Gender</label>
                    <div class="col-sm-7 ">
                        <select name="gender" class="form-control border-secondary">
                            <option value="Female"{{$edit->gender =='Female' ? 'selected' : ''}}>Female</option>
                            <option value="Male"  {{$edit->gender ==='Male' ? 'selected' : ''}} >Male</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="address" class="col-sm-3 fs-5">Address</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="address" value="{{$edit->address}}"
                            class="form-control border-secondary">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="mobile" class="col-sm-3 fs-5">Mobile</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="mobile" value="{{$edit->mobile}}"
                            class="form-control border-secondary">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="status" class="col-sm-3 fs-5">Active</label>
                    <div class="col-sm-7 ">
                        <select name="status" class="form-control border-secondary">
                            <option value="1" {{$edit->status == '1' ? 'selected' : ''}}>1</option>
                            <option value="2" {{$edit->status == '2' ? 'selected' : ''}}>2</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row my-2">
                    <label for="" class="col-sm-3"></label>
                    <div class="col-sm-7 text-end ">
                        <a href="{{route('teachers.index')}}" class=" fw-bold btn btn-sm py-2 btn-primary">
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