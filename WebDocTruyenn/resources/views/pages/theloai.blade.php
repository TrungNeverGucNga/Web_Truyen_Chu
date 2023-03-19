@extends('../layout')
@section('content')
<br>
<nav aria-label="breadcrumb" style="background-color: #F0FFFF;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$tentheloai}}</li>
  </ol>
</nav>
                <br>
                <h3>{{$tentheloai}}</h3>
                
    <div class="album py-5 bg-light">
            <div class="container">
                @php
                    echo $count = count($truyen);
                @endphp
                @if($count==0)
                    <p style="font-size:20px">Truyện đang cập nhật...</p>
                @else
                 <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3"> 
                    @foreach($truyen as $key =>$value)
                    <div class="col">
                        <div class="card shadow-sm">
                            
                            <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" alt="" > </img>

                            <div class="card-body">
                                <h5>{{$value->tentruyen}}</h5>
                            <p class="card-text">{{$value->tomtat}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-success">Xem ngay</button>
                                <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 50000</a>
                                </div>
                                <small class="text-muted">9 phút trước</small>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                    </div> 
                    @endif
            </div>
    </div>
@endsection