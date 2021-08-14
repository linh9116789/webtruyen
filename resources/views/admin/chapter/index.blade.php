@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="cart">
                <div class="cart-header">Liệt kê chapter</div>
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
                                    <th>Tiêu đề chap</th>
                                    <th>Truyện</th>
                                    <th>Thời gian tạo</th>
                                    <th>Thời gian sửa</th>
                                    <th>Active</th>
                                </tr>
                                <?php $i = 0; ?>
                                @if($chapters)
                                    @foreach($chapters as $chapter)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$chapter->chap_title}}</td>
                                            <td>{{$chapter->story->sto_name}}</td>
                                            <td>{{$chapter->created_at}} </td>
                                            <td>{{$chapter->updated_at}} </td>
                                            <td>
                                                <a href="{{route('chapter.edit',$chapter->id)}}" class="btn btn-success"><i class="fa fa-pencil"></i> Edit</a>
                                                <form action="{{route('chapter.destroy',$chapter->id)}}" method="POST">
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
