@extends('../layout')
@section('content')
    <br></br>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{url('the-loai/'.$truyen_breadcrumb->theloaitruyen->slug_theloai)}}">{{$truyen_breadcrumb->theloaitruyen->tentheloai}}</a></li>
    <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen_breadcrumb->danhmuctruyen->slug_danhmuc)}}">{{$truyen_breadcrumb->danhmuctruyen->tendanhmuc}}</a></li>
    
    <li class="breadcrumb-item active" aria-current="page">{{$truyen_breadcrumb->tentruyen}}</li>
  </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <h4>{{$chapter->truyen->tentruyen}}</h4>
            <p>Chương hiện tại : {{$chapter->tieude}}</p>
            <div class="col-md-5 ">
                <style>
                    .inline_chapter{
                        display: inline;
                    }
                </style>
                <style>
                    .isDisabled{
                        color: currentColor;
                        pointer-events: none;
                        opacity: 0.5;
                        text-decoration:none;
                    }
                </style>
            <label for="exampleInputEmail">Chọn chương: </label>
                <div class="form-group d-flex">
                <a class="btn btn-primary {{$chapter->id==$min_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$previous_chapter)}}">Trước</a>
                    <select name="select-chapter" class="form-select select-chapter" aria-label="Default select example">
                        @foreach($all_chapter as $key => $chap)
                        <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                        @endforeach
                    </select>
                    <a class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisabled' : ''}}" 
                    href="{{url('xem-chapter/'.$next_chapter)}}">Sau</a>
                </div>
            </div>
            
            <div class="noidungchuong">
            {!! $chapter->noidung !!}
            
                </div>
                    
            </div>
            
            <div class="col-md-5 ">
            <label for="exampleInputEmail">Chọn chương: </label>
                <div class="form-group d-flex">
                <a class="btn btn-primary {{$chapter->id==$min_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$previous_chapter)}}">Trước</a>
                    <select name="select-chapter" class="form-select select-chapter" aria-label="Default select example">
                        @foreach($all_chapter as $key => $chap)
                        <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                        @endforeach
                    </select>
                    <a class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisabled' : ''}}" 
                    href="{{url('xem-chapter/'.$next_chapter)}}">Sau</a>
                </div>
            </div>
                        <h5>Lưu và chia sẻ truyện : </h5>
                    <a href=""><i class="fa-brands fa-facebook" style="font-size:20px"></i></a>
                </div>
            <div>
            <div class="fb-comments" data-href="{{\URL::current()}}" data-width="100%" data-numposts="5"></div>
            </div>
                
        </div>
    </div>
    

@endsection