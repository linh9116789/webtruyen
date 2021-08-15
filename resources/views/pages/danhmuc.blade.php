@extends('layout')
{{-- @section('slide')
    @include('pages.slide')
@endsection --}}
@section('content')
<!--start Item mới-->
<div class="album py-5 bg-light">
    <h3>Truyện mới nhất</h3>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
        @foreach ($story as $sto)
        <div class="col"style="margin-top:20px">
            <div class="card shadow-sm">
                <div class="bd-placeholder-img card-img-top" >
                    <a href="{{url('xem-truyen/'.$sto->sto_slug)}}">
                        <img src="{{asset(pare_url_file($sto->sto_avatar))}}" alt="" width="100%" >
                    </a>
                </div>
            <div class="card-body">
                <p class="card-text">{{$sto->sto_name}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span><i class="fa fa-star"> 0/10</i></span>
                </div>
            </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
</div>
<!--end start item mới -->
@endsection
