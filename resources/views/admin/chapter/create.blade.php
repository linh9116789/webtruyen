@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="cart">
                <div class="card-header">Thêm Chapter</div>
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
                        <form action="{{route('chapter.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề chapter</label>
                                <input type="text" class="form-control" value="{{old('chap_title')}}" name="chap_title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên truyện</label>
                                <select name="chap_story_id" id="" class="form-control">
                                    @foreach ($story as $sto )
                                        <option value="{{$sto->id}}">{{$sto->sto_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung chapter</label>
                                <textarea name="chap_content" value="{{old('chap_content')}}" id="" rows="5" style="resize: none" class="form-control"></textarea>
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
