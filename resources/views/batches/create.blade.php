@extends('layouts.master')
@section('content')
    <h2 class="py-3">Batches Form</h2>
    <hr class="pb-3">

{{-- check conditon --}}
    @component('components.message') 
    @endcomponent

    <form action="{{route('batches.store')}}" method="POST">

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
                    <label for="course_id" class="col-sm-3 fs-5">Course</label>
                    <div class="col-sm-7 ">
                        <select required name="course_id" class="form-control border-secondary">
                            <option value="0"></option>
                            @foreach ($data as $d)
                                <option value="{{$d->id}}">{{$d->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="start_date" class="col-sm-3 fs-5">Start_date</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="start_date" class="form-control border-secondary">
                    </div>
                </div>

                <div class="form-group row my-2">
                    <label for="" class="col-sm-3"></label>
                    <div class="col-sm-7 text-end ">
                        <a href="{{route('batches.index')}}" class=" fw-bold btn btn-sm py-2 btn-primary">
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