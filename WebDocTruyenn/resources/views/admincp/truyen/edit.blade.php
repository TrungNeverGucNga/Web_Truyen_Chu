@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật truyện</div>
    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="card-body">
                    @if (session('status'))
                        
                            
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method='POST' action="{{route('truyen.update',[$truyen->id])}}" enctype='multipart/form-data'>
                        @method('PUT')
                        @csrf 
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên truyện</label>
                            <input type="text" class="form-control" name="tentruyen" value="{{$truyen->tentruyen}}" onkeyup="ChangeToSlug();" aria-describedby="emailHelp" placeholder="Tên truyện...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tác giả</label>
                            <input type="text" class="form-control" name="tacgia" value="{{$truyen->tacgia}}" id="slug" aria-describedby="emailHelp" placeholder="Tác giả...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug truyện</label>
                            <input type="text" class="form-control" name="slug_truyen" value="{{$truyen->slug_truyen}}" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug chương...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tóm tắt truyện</label>
                            <textarea class="form-control" name="tomtat" id="" cols="30" rows="10">{{$truyen->tomtat}}</textarea>
                        </div>
                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Danh mục truyện</label>
                        <select name="danhmuc" class="form-select" aria-label="Default select example">
                            @foreach($danhmuc as $key => $muc)
                            <option {{$muc->id==$truyen->danhmuc_id ? 'selected' : ''}} value="{{$muc->id}}">{{$muc->tendanhmuc}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Thể loại truyện</label>
                        <select name="theloai" class="form-select" aria-label="Default select example">
                            @foreach($theloai as $key => $loai)
                            <option {{$loai->id==$truyen->theloai_id ? 'selected' : ''}} value="{{$loai->id}}">{{$loai->tentheloai}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                            <input type="file" class="form-control-file" name="hinhanh">
                            <img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" height="200" width="200" alt="">
                        </div>
                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
                        <select name="kichhoat" class="form-select" aria-label="Default select example">
                            @if($truyen->kichhoat==0)
                            <option selected value="0">Kích hoạt</option>
                            <option value="1">Không kích hoạt</option>
                            @else
                            <option value="0">Kích hoạt</option>
                            <option selected value="1">Không kích hoạt</option>
                            @endif
                        </select>
                        </div>
                        <button type="submit" name="themtruyen" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
