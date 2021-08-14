@extends('layout')

@section('content')
<section class="content-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Truyen</a></li>
          <li class="breadcrumb-item active">Ten truyen</li>
          {{-- <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-9">
            <div class="col-md-3">
                <img src="{{asset('images/img.jpg')}}" alt="">
            </div>
            <div class="col-md-9">
                <ul>
                    <li>Tac gia:ozakawa</li>
                    <li>Danh gia : 8/10 <i class="fa fa-star"></i></li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            Truyen hot
        </div>
    </div>


@endsection

