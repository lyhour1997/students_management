
@if( Session::has('success') )
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>
            {{session('success')}}
        </p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@elseif( Session::has('error') )
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p>
            {{session('error')}}
        </p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- check validate form --}}
@if( $errors->any() )
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <ul>
            @foreach ($errors->all() as $err)
                <li>
                    {{$err}}
                </li>
            @endforeach
        </ul>
  </div>
@endif