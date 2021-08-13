@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="cart">
                <div class="card-header">Thêm truyện </div>
                    <div class="car-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{route('store.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Tên truyện</label>
                              <input type="text" class="form-control" value="{{old('sto_name')}}" name="c_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục truyện</label>
                                <select class="form-control" name="sto_category_id">
                                    @foreach ($category as $cate )
                                        <option value="{{$cate->id}}">{{$cate->c_name}}</option>
                                    @endforeach
                                </select>


                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"></label>
                                <input type="text" class="form-control" style="height: 250px;width:200px">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh </label>
                                <input type="file" class="form-control" value="{{old('sto_avatar')}}" name="c_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung truyện</label>
                                <textarea name="sto_content" id="" rows="5" style="resize: none" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
