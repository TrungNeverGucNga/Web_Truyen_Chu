@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Liệt kê truyện</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên truyện</th>
                                <th scope="col">Tác giả</th>
                                <th scope="col">Slug truyện</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tóm tắt truyện</th>
                                <th scope="col">Danh mục truyện</th>
                                <th scope="col">Thể loại truyện</th>
                                <th scope="col">Kích hoạt</th>
                                <th scope="col">Quản lí</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list_truyen as $key => $truyen)
                                <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$truyen->tentruyen}}</td>
                                <td>{{$truyen->tacgia}}</td>
                                <td>{{$truyen->slug_truyen}}</td>
                                <td><img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" height="200" width="200" alt=""></td>
                                <td>{{$truyen->tomtat}}</td>
                                <td>{{$truyen->danhmuctruyen->tendanhmuc}}</td>
                                <td>{{$truyen->theloaitruyen->tentheloai}}</td>
                                <td>
                                    @if($truyen->kichhoat == 0)
                                            <span class='text text-success'>Kích hoạt</span>
                                        @else
                                            <span class='text text-danger'>Không kích hoạt</span>    
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('truyen.edit',['truyen'=>$truyen->id])}}" class="btn btn-primary">Sửa</a>
                                    <form action="{{route('truyen.destroy',['truyen'=>$truyen->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có chắc chắn muốn xóa ?');" class='btn btn-danger'>
                                            Xóa
                                        </button>
                                    </form>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection