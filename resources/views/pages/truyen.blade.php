@extends('layout')
{{-- <style>
    .list-chap li{
        border-top: 1px solid #f0f0f0;
    border-bottom: 1px solid #f0f0f0;
    padding: 8px 0;
    }
</style> --}}
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
            <div class="row">
                <div class="col-md-5">
                    <img  src="{{asset(pare_url_file($story->sto_avatar))}}" width="100%" alt="">
                </div>
                <div class="col-md-7">
                    <ul style="list-style:none">
                        <li>Ten truyen:{{$story->sto_name}}</li>
                        <li>Tac gia:{{$story->sto_author}}</li>
                        <li>The loai:<a href="{{url('danh-muc/'.$story->category->c_slug)}}">{{$story->category->c_name}}</a></li>
                        <li>Danh muc:</li>
                        <li>Trang thai:@if($story->sto_active == 0)
                            <span class="badge badge-primary" style="font-size: 13px">Đang ra</span>
                        @else
                        <span class="badge badge-success">Đã full</span>
                        @endif
                        </li>
                        <li><a href="{{url('xem-chapter/'.$chapter_first->chap_slug)}}">Xem mục lục</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12" style="top:20px">
                <p>Tóm tắt truyện:</p>
                {!!$story->sto_content!!}
            </div>
            <hr/>
            <h4>Mục lục</h4>
            <ul class="list-chap">
                @foreach ($chapter as $chap )
                <li><a href="{{url('xem-chapter/'.$chap->chap_slug)}}">{{$chap->chap_title}}</a></li>
                @endforeach
            </ul>

            <h4>Sách cùng danh mục</h4>
            <div class="owl-carousel owl-theme">
                @foreach ($storyCate as $storyCa)
                <div class="item">
                    <a href="{{url('xem-truyen/'.$storyCa->sto_slug)}}">
                        <img src="{{asset(pare_url_file($storyCa->sto_avatar))}}" alt="">
                    </a>
                    <p>{{$storyCa->sto_name}}</p>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            Truyen hot
        </div>
    </div>
@endsection

