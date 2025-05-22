@extends('layouts.master')
@section('content')
    <h2 class="py-3">Payment Application</h2> 
    <hr class="py-2">

{{-- search and create --}}
    <div class="d-flex justify-content-between align-content-center py-2">
        <a href="{{route('payments.create')}}" class="btn btn-success fw-bold ">
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
                <th class="fs-6">#</th>
                <th class="fs-6">Enroll_id</th>
                <th class="fs-6">Paid Date</th>
                <th class="fs-6">Amount</th>
                {{-- <th class="fs-6">Status</th> --}}
                <th class="fs-6">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $p)
                <tr>
                    <td>{{$p ->id}}</td>
                    <td>{{$p ->ename}}</td>
                    <td>{{$p ->paid_date}}</td>
                    <td>{{$p ->amount}}</td>
              
                    <td>
                        <a href="{{route('payments.show', $p->id)}}" class="btn btn-sm px-2 btn-primary">
                            <i class="fas fa-eye"></i> 
                        </a>
                        <a href="{{route('payments.edit', $p->id)}}" class="btn btn-sm px-2 btn-success">
                            <i class="fas fa-edit"></i> 
                        </a>
                        <a href="{{route('payments.delete', $p->id)}}" 
                            onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm px-2">
                            <i class="fas fa-trash-alt"></i> 
                        </a>
                        <a href="{{route('generate.pdf')}} class="btn btn-sm btn-success">
                            <i class="fa-solid fa-print"></i> Print
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
@endsection