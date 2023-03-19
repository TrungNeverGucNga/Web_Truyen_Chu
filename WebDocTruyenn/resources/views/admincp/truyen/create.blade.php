@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm truyện</div>
    
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
                    <form method='POST' action="{{route('truyen.store')}}" enctype='multipart/form-data'>
                        @csrf 
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên truyện</label>
                            <input type="text" class="form-control" name="tentruyen" value="{{old('tentruyen')}}" onkeyup="ChangeToSlug();" id="slug" aria-describedby="emailHelp" placeholder="Tên truyện...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tác giả</label>
                            <input type="text" class="form-control" name="tacgia" value="{{old('tác giả')}}"  aria-describedby="emailHelp" placeholder="Tác giả...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug Truyện</label>
                            <input type="text" class="form-control" name="slug_truyen" value="{{old('slug_truyen')}}" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug Truyện...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tóm tắt truyện</label>
                            <textarea class="form-control" name="tomtat" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Danh mục truyện: </label> <br>
                        @foreach($danhmuc as $key => $muc)
                        @if($muc->kichhoat == 0)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="danhmuc[]" id="danhmuc_{{$muc->id}}" value="{{$muc->id}}">
                            <label class="form-check-label" for="danhmuc_{{$muc->id}}">{{$muc->tendanhmuc}}</label>
                            </div>
                        
                        @endif
                        @endforeach
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Thể loại truyện: </label> <br>
                        @foreach($theloai as $key => $loai)
                        @if($loai->kichhoat == 0)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="theloai[]" id="theloai_{{$loai->id}}" value="{{$loai->id}}">
                            <label class="form-check-label" for="theloai_{{$loai->id}}">{{$loai->tentheloai}}</label>
                            </div>
                        @endif
                        @endforeach
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                            <input type="file" class="form-control-file" name="hinhanh">
                        </div>
                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
                        <select name="kichhoat" class="form-select" aria-label="Default select example">
                            
                            <option value="0">Kích hoạt</option>
                            <option value="1">Không kích hoạt</option>
                        </select>
                        </div>
                        <button type="submit" name="themtruyen" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
