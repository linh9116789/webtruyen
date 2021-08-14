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
                        <form action="{{route('chapter.update',$chapter->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề chapter</label>
                                <input type="text" class="form-control" value="{{$chapter->chap_title}}" name="chap_title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên truyện</label>
                                <select name="chap_story_id" id="" class="form-control">
                                    @foreach ($story as $sto )
                                        <option value="{{$sto->id}}"{{($chapter->chap_story_id ?? 0) == $sto->id ? "selected='selected'" : ""}}>{{$sto->sto_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung chapter</label>
                                <textarea name="chap_content" id="" rows="5" style="resize: none" class="form-control">{{$chapter->chap_content}}</textarea>
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
