@extends('layout')
@section('slide')
    @include('pages.slide');
@endsection
@section('content')
<!--start Item mới-->
<div class="album py-5 bg-light">
    <h3>Truyện mới nhất</h3>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
        <div class="col">
            <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="279px" xmlns="http://www.w3.org/2000/svg" role="img" </svg>
            <div class="card-body">
                <p class="card-text">truyen cuc hay</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span><i class="fa fa-star"> 0/10</i></span>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!--end start item mới -->
<!--start item đã hoàn thành -->
<div class="album py-5 bg-light">
    <h3>Truyện đã hoàn thành</h3>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
          <div class="col">
            <div class="card shadow-sm">
              <div class="bd-placeholder-img card-img-top" >
                  <img src="" alt="" width="100%" height="279px">
              </div>
              <div class="card-body">
                <p class="card-text">truyen cuc hay</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span><i class="fa fa-star"> 0/10</i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<!--end item đã hoàn thàmh -->
@endsection
