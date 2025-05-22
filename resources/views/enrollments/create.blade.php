@extends('layouts.master')
@section('content')
    <h2 class="py-3">Enrollment Form</h2>
    <hr class="pb-3">

{{-- check conditon --}}
    @component('components.message') 
    @endcomponent

    <form action="{{route('enrolls.store')}}" method="POST">

        @csrf

        <div class="row">
            <div class="col-sm-9">
                <div class="form-group row my-3">
                    <label for="enroll" class="col-sm-3 fs-5">Enrollment No</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="enroll" class="form-control border-secondary">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="student" class="col-sm-3 fs-5">Students</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="student" class="form-control border-secondary">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="join_date" class="col-sm-3 fs-5">Join_date</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="join_date" class="form-control border-secondary">
                    </div>
                </div>

                  <div class="form-group row my-3">
                    <label for="fee" class="col-sm-3 fs-5">Fee</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="fee" class="form-control border-secondary">
                    </div>
                </div>

                <div class="form-group row my-2">
                    <label for="" class="col-sm-3"></label>
                    <div class="col-sm-7 text-end ">
                        <a href="{{route('enrolls.index')}}" class=" fw-bold btn btn-sm py-2 btn-primary">
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