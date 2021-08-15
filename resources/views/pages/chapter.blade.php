@extends('layout')
@section('content')
<section class="content-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Truyen</a></li>
          <li class="breadcrumb-item">Ten truyen</li>
          <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
           <h4>{{$chapter->story->sto_name}}</h4>
           <p>Chuong hien tai: {{$chapter->chap_title}}</p>
           <div class="col-md-5">
              <div class="form-group">
                 <label for="">Chon chuong</label>
                 <select name="" id="">
                    <option value="0">chuong 1</option>
                    <option value="1">chuong 2</option>
                 </select>
              </div>
           </div>
           <div class="noidungchuong">
              {!!$chapter->chap_content!!}
           </div>
           {{--
           <div class="form-group">
              <label for="">Chon chuong</label>
              <select name="" id="">
                 <option value="0">chuong 1</option>
                 <option value="1">chuong 2</option>
              </select>
           </div>
           --}}
        </div>
     </div>
@endsection

