@extends('layouts.master')
@section('content')
    <h2 class="py-3">Courses Form</h2>
    <hr class="pb-3">

{{-- check conditon --}}
    @component('components.message') 
    @endcomponent

    <form action="{{route('courses.store')}}" method="POST">

        @csrf

        <div class="row">
            <div class="col-sm-9">
                <div class="form-group row my-3">
                    <label for="name" class="col-sm-3 fs-5">Name</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="name" class="form-control border-secondary">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="syllabus" class="col-sm-3 fs-5">Syllabus</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="syllabus" class="form-control border-secondary">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="duration" class="col-sm-3 fs-5">Duration</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="duration" class="form-control border-secondary">
                    </div>
                </div>

                <div class="form-group row my-2">
                    <label for="" class="col-sm-3"></label>
                    <div class="col-sm-7 text-end ">
                        <a href="{{route('courses.index')}}" class=" fw-bold btn btn-sm py-2 btn-primary">
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