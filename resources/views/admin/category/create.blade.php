@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="cart">
                <div class="card-header">Thêm sản phẩm </div>
                    <div class="car-body">
                        @if (session('status'))
                            <div class="alert alert-susscess" role="alert">
                                {{session('status')}}
                            </div>
                        @endif
                        <form action="{{route('category.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Thêm danh mục</label>
                              <input type="text" class="form-control" name="c_name">
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
