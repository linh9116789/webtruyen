@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="cart">
                <div class="cart-header">Liệt kê Thể loại</div>
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
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Active</th>
                                </tr>
                                <?php $i = 0; ?>
                                @if($danhmucs)
                                    @foreach($danhmucs as $danhmuc)
                                        <tr>
                                            <td>{{ $i++}}</td>
                                            <td>{{$danhmuc->d_name}}</td>

                                            <td>
                                                @if($danhmuc->d_status == 1)
                                                    <a href="" class="btn btn-info ">Show</a>
                                                @else
                                                    <a href="" class="btn btn-default ">Hide</a>
                                                @endif
                                            </td>
                                            <td>{{$danhmuc->created_at}} </td>
                                            <td>{{$danhmuc->updated_at}} </td>
                                            <td>
                                                <a href="{{route('danhmuc.edit',$danhmuc->id)}}" class="btn btn-success"><i class="fa fa-pencil"></i> Edit</a>
                                                <form action="{{route('danhmuc.destroy',$danhmuc->id)}}" method="POST">
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
