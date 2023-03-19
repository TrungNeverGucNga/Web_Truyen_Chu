@extends('../layout')
<!-- @section('slide')
    @include('pages.slide')
@endsection -->
@section('content')
<br></br>
<nav aria-label="breadcrumb" style="background-color: #F0FFFF;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$truyen->tentruyen}}</li>
  </ol>
</nav>
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-3">
            <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" alt="" style="heigh:300px ; width:250px"> </img>
            </div>
            <div class="col-md-9">
                <style>
                    .infotruyen{
                        list-style:none;
                    }
                </style>
                
                <ul class="infotruyen">
                    
                    <li>Tên truyện: {{$truyen->tentruyen}}</li>
                    <li>Tác giả: {{$truyen->tacgia}}</li>
                    <li>Danh mục truyện : 
                        @foreach($truyen->thuocnhieudanhmuctruyen as $thuocdanh)
                        <a href="{{url('danh-muc/'.$thuocdanh->slug_danhmuc)}}"><span class="badge bg-dark" >
                            {{$thuocdanh->tendanhmuc}}
                        </span>
                        </a>
                        @endforeach
                    </li>
                    <li>Thể loại truyện : 
                        @foreach($truyen->thuocnhieutheloaitruyen as $thuocloai)
                        <a href="{{url('the-loai/'.$thuocloai->slug_theloai)}}">
                        <span class="badge bg-info" >
                            {{$thuocloai->tentheloai}}
                        </span></a>
                        @endforeach
                    </li>

                    <li>Số chương: @php
                    echo $count = count($chapter);
                @endphp</li>
                    <li>Lượt xem: 5000</li>
                    <input type="hidden" value="{{$truyen->tentruyen}}" class="wishlist_title">
                    <input type="hidden" value="{{\URL::current()}}" class="wishlist_url">
                    <input type="hidden" value="{{$truyen->id}}" class="wishlist_id">
                    @if($chapter_dau)
                    <li><a href="{{url('xem-chapter/'.$chapter_dau->slug_chapter)}}" class="btn btn-primary">Đọc chương 1</a></li>
                    
                    <li><a href="{{url('xem-chapter/'.$chapter_moinhat->slug_chapter)}}" class="btn btn-primary mt-2">Đọc chương mới nhất</a></li>
                    @else
                    <li><button type="button" class="btn btn-secondary" disabled>Đọc chương 1</button></li>
                    @endif
                    <li><a  class="btn btn-danger mt-2 btn-thich_truyen">Thích truyện <i class="fa-solid fa-heart"></i></a></li>
                </ul>

            </div>
        </div>
        <hr>
        <div class="col-md-12">
            <p>
            {{$truyen->tomtat}}
            </p>
        </div>
        <hr>
        <h4>Mục lục</h4>
        <div>
        <ul class="mucluctruyen">
                    @php 
                    $mucluc = count($chapter);
                    @endphp
                    @if($mucluc>0)
            @foreach($chapter as $key =>$chap)
                    <br>
                    <li><a href="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</a></li>
            @endforeach
            @else
                    <li>Đang cập nhật...</li>
            @endif
                </ul>
                <div class="fb-comments" data-href="{{\URL::current()}}" data-width="100%" data-numposts="5"></div>
            </div>
        <hr>
        <h4>Sách cùng danh mục</h4>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
        @foreach($cungdanhmuc as $key =>$value)
                    <div class="col ">
                        <div class="card shadow-sm ">
                            
                            <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" alt="" > </img>

                            <div class="card-body">
                                <h5>{{$value->tentruyen}}</h5>
                            <p class="card-text">{{$value->tomtat}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Xem ngay</button>
                                <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 50000</a>
                                </div>
                                
                            </div>
                            </div>
                            
                        </div>
                    </div>
        @endforeach
        </div>
    </div>
    <div href="`+url+`" class="col-md-3">
        <h3>Truyện yêu thích</h3>
        <div id="yeuthich"></div>
    </div>
</div>
@endsection