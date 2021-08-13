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
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Active</th>
                                </tr>
                                <?php $i = 0; ?>
                                @if($categories)
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $i++}}</td>
                                            <td>{{$category->c_name}}</td>

                                            <td>
                                                @if($category->c_status == 1)
                                                    <a href="" class="btn btn-info ">Show</a>
                                                @else
                                                    <a href="" class="btn btn-default ">Hide</a>
                                                @endif
                                            </td>
                                            <td>{{$category->created_at}} </td>
                                            <td>{{$category->updated_at}} </td>
                                            <td>
                                                <a href="{{route('category.edit',$category->id)}}" class="btn btn-success"><i class="fa fa-pencil"></i> Edit</a>
                                                <form action="{{route('category.destroy',$category->id)}}" method="POST">
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
