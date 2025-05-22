@extends('layouts.master')
@section('content')
    <h2 class="py-3">Edit Payments</h2>
    <hr class="pb-3">

{{-- check conditon --}}
    @component('components.message') 
    @endcomponent

    <form action="{{route('payments.update', $edit->id)}}" method="POST">

        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-sm-9">
                <div class="form-group row my-3">
                    <label for="enrollment_id" class="col-sm-3 fs-5">Enrollment_id</label>
                    <div class="col-sm-7 ">
                        <select required name="enrollment_id" class="form-control border-secondary">
                            <option value="0"></option>
                            @foreach ($data as $d)
                                <option value="{{$d->id}}" {{$d->id == $edit->enrollment_id ? 'selected':''}} >
                                    {{$d->enroll}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="paid_date" class="col-sm-3 fs-5">Paid_date</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="paid_date" value="{{$edit->paid_date}}"
                            class="form-control border-secondary">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="amount" class="col-sm-3 fs-5">Amount</label>
                    <div class="col-sm-7 ">
                        <input type="text" required name="amount" value="{{$edit->amount}}"
                        class="form-control border-secondary">
                    </div>
                </div>

                <div class="form-group row my-2">
                    <label for="" class="col-sm-3"></label>
                    <div class="col-sm-7 text-end ">
                        <a href="{{route('payments.index')}}" class=" fw-bold btn btn-sm py-2 btn-primary">
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