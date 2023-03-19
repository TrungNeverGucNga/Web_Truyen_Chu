@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm thể loại truyện</div>
    
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
                    <form method='POST' action="{{route('theloai.store')}}">
                        @csrf 
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên thể loại</label>
                            <input type="text" class="form-control" name="tentheloai" value="{{old('tentheloai')}}" onkeyup="ChangeToSlug();" id="slug" aria-describedby="emailHelp" placeholder="Tên thể loại...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug thể loại</label>
                            <input type="text" class="form-control" name="slug_theloai" value="{{old('slug_theloai')}}" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug thể loại...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mô tả thể loại</label>
                            <input type="text" class="form-control" name="mota" value="{{old('mota')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nội dung thể loại...">
                        </div>
                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
                        <select name="kichhoat" class="form-select" aria-label="Default select example">
                            
                            <option value="0">Kích hoạt</option>
                            <option value="1">Không kích hoạt</option>
                        </select>
                        </div>
                        <button type="submit" name="themtheloai" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
