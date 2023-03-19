<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web đọc truyện chữ</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>
<body >
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{url('/')}}" style="font-size:24px">TruyenChu3TN.com</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:18px">
                            Danh mục truyện
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-size:18px">
                            @foreach($danhmuc as $key => $danh)
                            <li><a class="dropdown-item" href="{{url('danh-muc/'.$danh->slug_danhmuc)}}">{{$danh->tendanhmuc}}</a></li>
                            @endforeach
                        </ul>
                        <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:18px">
                            Thể loại
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-size:18px">
                        @foreach($theloai as $key => $loai)
                            <li><a class="dropdown-item" href="{{url('the-loai/'.$loai->slug_theloai)}}">{{$loai->tentheloai}}</a></li>
                            @endforeach
                        </ul>
                    </ul>
                    <form class="d-flex" action="{{url('tim-kiem')}}"  method="GET" >    
                        <input class="form-control me-2" type="search" name="tukhoa" placeholder="Tìm kiếm..." aria-label="Search" style="font-size:18px">
                        <button class="btn btn-success" type="submit" style="font-size:18px">Tìm</button>
                    </form>
                    </div>
                </div>
                </nav>
    <div class="container" >
        <!---Menu---->
                
                <!---Slide---->
                @yield('slide')
                <!---Slide---->
                @yield('content')
            <hr>
            <footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Lên đầu trang</a>
    </p>
    <p class="mb-1">TruyenChu3TN.com là nền tảng mở trực tuyến, miễn phí đọc truyện chữ được convert hoặc dịch kỹ lưỡng,</p>
    <p>do các converter và dịch giả đóng góp, rất nhiều truyện hay và nổi bật được cập nhật nhanh nhất với đủ các thể loại truyện</p>
</div>

</footer>
</div>
  </div>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    
    <script>
        $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    // nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
    </script>
    <script type="text/javascript">
        $('.select-chapter').on('change',function(){
            var url = $(this).val();
            if(url){
                window.location = url;
            }
            return false;
        });
        current_chapter();
        function current_chapter(){
            var url = window.location.href;
            $('.select-chapter').find('option[value="'+url+'"]').attr("selected",true);
        }
    </script>
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0&appId=1038294726873808&autoLogAppEvents=1" nonce="e5jZTgNa"></script>
<script>
    show_wishlist();
        function show_wishlist(){
            if(localStorage.getItem('wishlist_truyen')!=null){
                var data = JSON.parse(localStorage.getItem('wishlist_truyen'));

                data.reverse();

                for(i=0;i<data.length;i++){
                    var title = data[i].title;
                    var img = data[i].img;
                    var id = data[i].id;
                    var url = data[i].url;
                    $('#yeuthich').append(`
            <div class="row mt-2">
                <div class="col-md-5"><img class="img img-responsive" width="100%" class="card-img-top"
                src="`+img+`" alt="`+title+`"></div>
            <div class="col-md-7 sidebar">
                <a href"`+url+`">
                <p style="color: #666">`+title+`<\p>
                <\a>
                <\div>
                <\div>
        `)
                }
            }
        }
    $('.btn-thich_truyen').click(function(){
    $('.fa-solid.fa-heart').css('color','#fac');
    const id= $('.wishlist_id').val();
    const title= $('.wishlist_title').val();
    const img= $('.card-img-top').attr('src');
    const url= $('.wishlist_url').val();
    
    const item ={
        'id':id,
        'title':title,
        'img':img,
        'url':url
    }

    if(localStorage.getItem('wishlist_truyen')==null){
        localStorage.setItem('wishlist_truyen','[]');
    }
    var old_data = JSON.parse(localStorage.getItem('wishlist_truyen'));
    var matches = $.grep(old_data, function(obj){
        return obj.id == id;
    })

    if(matches.length){
        alert('Truyện đã có trong danh sách yêu thích.')
    }else{
        if(old_data.length<=5){
            old_data.push(item);
        }
        else{
            alert('Đã đạt giới hạn lưu truyện yêu thích.');
        }
        localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));
        alert('Đã lưu vào danh sách yêu thích');
        $('#yeuthich').append(`
            <div class="row mt-2">
                <div class="col-md-5"><img class="img img-responsive" width="100%" class="card-img-top"
                src="`+img+`" alt="`+title+`"></div>
            <div class="col-md-7 sidebar">
                <a href="`+url+`">
                <p style="color: #666">`+title+`<\p>
                <\a>
                <\div>
                <\div>
        `)
    }
    
    localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));

})
</script>

</body>
</html>