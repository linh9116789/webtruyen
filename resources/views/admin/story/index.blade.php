@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="cart">
                <div class="cart-header">Liệt kê danh mục</div>
                    <div class="box-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="col-md-12">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Tên truyện</th>
                                    <th>Avatar</th>
                                    <th>Thể loại</th>
                                    <th>Tác giả</th>
                                    <th>Trạng thái</th>
                                    <th>Create_Time</th>
                                    <th>Active</th>
                                </tr>
                                <?php $i = 0; ?>
                                @if($storys)
                                    @foreach($storys as $story)
                                        <tr>
                                            <td>{{ $i++}}</td>
                                            <td>{{ $story->sto_name}}</td>

                                            <td><img src="{{pare_url_file($story->sto_avatar)}}" style="hight:100px;width:100px"></td>
                                            <td>{{$story->category->c_name}}</td>
                                            <td>{{$story->sto_author}}</td>
                                            <td>
                                                @if($story->sto_active == 0)
                                                    <a href="" class="btn btn-info ">Đang ra</a>
                                                @else
                                                    <a href="" class="btn btn-default ">Đã full</a>
                                                @endif
                                            </td>
                                            <td>{{$story->created_at}} </td>
                                            <td>
                                                <a href="{{route('story.edit',$story->id)}}" class="btn btn-success"><i class="fa fa-pencil"></i> Edit</a>
                                                <form action="{{route('story.destroy',$story->id)}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button onclick="return confirm('Bạn muốn xóa ?')" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
