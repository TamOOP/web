<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{asset('css/user/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/homepage.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    
</head>

<body style="background: #efefef">
  
  <header style="background:white">
    <div class="text-center">
        <img src="https://theme.hstatic.net/200000265619/1000946504/14/banner.jpg?v=372" class="img-fluid"
          height="60">
    </div>
      <div class="container">
        <div class="row justify-content-center align-items-center g-2">
          <div class="col">
            <a href="/" class="logo">
              <img src="https://theme.hstatic.net/200000265619/1000946504/14/logo.png?v=372" alt="" class=".img-fluid"
                 height="65">
            </a>
          </div>
          <div class="col">
            <form action="" class="input-search">
              <input type="text" class="search-bar" placeholder="Tìm kiếm...">
              <span class="material-symbols-outlined search-icon" >
                search
              </span>
            </form>
          </div>
          <div class="col">
              <div id="hotline">
                <div class="hotline-bar text-center">
                  <p>Tư vấn bán hàng</p>
                  <strong>Gọi ngay 19001093</strong>
                  <div class="inline-block icon-hotline" id="icon-hotline">
                    <span class="material-symbols-outlined" style="color:white;cursor: pointer">
                      phone
                    </span>
                  </div>
                </div>
              </div>
              <div id="account">
                <div class="inline-block icon-hotline" >
                  <span class="material-symbols-outlined" style="color:white;cursor: pointer;">
                    person
                  </span>
                </div>
                <div class="account-dropdown shadow p-3 mb-5 bg-body-tertiary rounded">
                  <a href="#" class="btn btn-dark btn-account" >
                    <span>Đăng nhập</span>
                  </a>
                  <a href="#" class="btn btn-dark btn-account">
                    <span>Đăng ký</span>
                  </a>
                </div>
              </div>
              <div id="shopping-cart">
                <a href="#a" >
                  <div class="inline-block icon-hotline" >
                    <span class="material-symbols-outlined" style="color:white;">
                      shopping_cart_checkout
                    </span>
                  </div>
                </a>
                <div class="shopping-dropdown shadow p-3 mb-5 bg-body-tertiary rounded">
                  <h6>Tổng tiền thanh toán:</h6>
                  <a href="#" class="btn btn-dark" >
                    <span>Giỏ hàng</span>
                  </a>
                  <a href="#" class="btn btn-secondary" >
                    <span>Thanh toán</span>
                  </a>
                </div>
              </div>
            </div>
        </div>    
      </div>
      <div class="nav-bar">
        <ul class="nav justify-content-center ">
            <li class="nav-item">
              <a class="nav-link" href="#" style="background: #d0021b">
                <strong>HOME PAGE</strong>
              </a>
            </li>
            <li class="nav-item" style="position: relative">
              <div class="link-brand">
                <a class="nav-link" href="#" style="background: #d0021b;">
                  <strong>BRAND</strong>
                  <span class="material-symbols-outlined brand-expand" >
                    expand_more
                  </span>
                </a>
              </div>
              <ul class="brand-dropdown shadow">
                <li class="brand-type ">
                  <a href="#b">
                    CONVERSE
                    <span class="material-symbols-outlined expand-left" >
                      chevron_right
                     </span>
                  </a>
                  <ul class="type-dropend shadow">
                    <li class="brand-type ">
                      <a href="#">
                        CONVERSE
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="brand-type ">
                  <a href="#">
                    CONVERSE
                    <span class="material-symbols-outlined expand-left" >
                      chevron_right
                     </span>
                  </a>
                  <ul class="type-dropend shadow">
                    <li class="brand-type ">
                      <a href="#">
                        CONVERSE
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <strong>SPECIAL PRICE</strong>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <strong>ORDER</strong>
              </a>
            </li>
        </ul>
      </div>
  </header>
  <main>
    <div id="slide" class="carousel slide" data-bs-ride="carousel">
      <!-- Indicators/dots -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#slide" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#slide" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#slide" data-bs-slide-to="2"></button>
      </div>
    
      <!-- The slideshow/carousel -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{asset('img/home/gallery01.jpg')}}" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="{{asset('img/home/gallery02.jpg')}}" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="{{asset('img/home/gallery03.jpg')}}" class="d-block w-100">
        </div>
      </div>
    
      <!-- Left and right controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#slide" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#slide" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
    <div class="container-fluid " align="center" style="padding: 15px 10%;background: white">
      <div class="owl-carousel owl-theme owl-loaded" id="logo" >
        <div class="owl-stage-outer">
          <div class="owl-stage">
            <div class="owl-item">
              <div class="item">
                <img src="{{asset('img/logo/converse.jpg')}}" class="logo">
              </div>
            </div>
            <div class="owl-item">
              <div class="item">
                <img src="{{asset('img/logo/k-swiss.jpg')}}" class="logo">
              </div>
            </div>
            <div class="owl-item">
              <div class="item">
                <img src="{{asset('img/logo/kangol.jpg')}}" class="logo">
              </div>
            </div>
            <div class="owl-item">
              <div class="item">
                <img src="{{asset('img/logo/nike.jpg')}}" class="logo">
              </div>
            </div>
            <div class="owl-item">
              <div class="item">
                <img src="{{asset('img/logo/palladium.jpg')}}" class="logo">
              </div>
            </div>
            <div class="owl-item">
              <div class="item">
                <img src="{{asset('img/logo/supra.jpg')}}" class="logo">
              </div>
            </div>
            <div class="owl-item">
              <div class="item">
                <img src="{{asset('img/logo/vans.jpg')}}" class="logo">
              </div>
            </div>
            <div class="owl-item">
              <div class="item">
                <img src="{{asset('img/logo/balenciaga.jpg')}}" class="logo">
              </div>
            </div>
            <div class="owl-item">
              <div class="item">
                <img src="{{asset('img/logo/adidas.jpg')}}" class="logo">
              </div>
            </div>
          </div>
        </div>
        <div class="owl-nav" id="category" style="margin:0">
          <button type="button" class="btn btn-link owl-prev">
            <span class="material-symbols-outlined" style="font-size: 40px">
              chevron_left
            </span>
          </button>
          
          <button type="button" class="btn btn-link owl-next">
            <span class="material-symbols-outlined " style="font-size: 40px">
              chevron_right
            </span>
          </button>
        </div>
      </div>
    </div>
    <div class="container-fluid " align="center" style="padding-left:0;">
      <div class="row ">
        <div class="col-sm-6" style="padding-right:0">
          <div class="category">
            <img src="https://theme.hstatic.net/200000265619/1000946504/14/banner_project_1.jpg?v=417" class="img-fluid">
            <div class="caption" align="center">
              <h2 style="font-weight: bold">CONVERSE</h2>
              <p class="total-amount">312 Sản Phẩm</p>
            </div>
          </div>
          
        </div>
        <div class="col-sm-6" style="padding-right:0">
          <div class="category">
            <img src="https://theme.hstatic.net/200000265619/1000946504/14/banner_project_2.jpg?v=417" class="img-fluid">
            <div class="caption" align="center">
              <h2 style="font-weight: bold">VANS</h2>
              <p class="total-amount">312 sản phẩm</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-sm-4" style="padding-right:0;">
          <div class="category">
            <img src="https://cdn3.dhht.vn/wp-content/uploads/2021/10/3-15-cac-hang-giay-noi-tieng-ban-chay-nhat-tren-the-gioi.jpg"
            class="img-fluid" style="height: 100%;" >
            <div class="caption" align="center">
              <h2 style="font-weight: bold">ADIDAS</h2>
              <p class="total-amount">312 sản phẩm</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4" style="padding-right:0">
          <div class="category">
            <img src="https://fastsole.co.uk/wp-content/uploads/2021/05/Nike-Air-Max-Pre-Day-Summit-White-DA4263-100-on-foot-01.jpg" 
            class="img-fluid" style="height: 100%">
            <div class="caption" align="center">
              <h2 style="font-weight: bold">NIKE</h2>
              <p class="total-amount">312 sản phẩm</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4" style="padding-right:0">
          <div class="category">
            <img src="https://cdn3.dhht.vn/wp-content/uploads/2021/10/5-15-cac-hang-giay-noi-tieng-ban-chay-nhat-tren-the-gioi.jpg" 
            class="img-fluid" style="height: 100%">
            <div class="caption" align="center">
              <h2 style="font-weight: bold">BALENCIAGA</h2>
              <p class="total-amount">312 sản phẩm</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="product-list shadow" align="center" >
      <p class="title">SẢN PHẨM HOT</p>
      <div class="container-fluid mt-3" align="center" style="position: relative">
        <div class="owl-carousel owl-theme owl-loaded" id="hot-sale">
          <div class="owl-stage-outer">
            <div class="owl-stage">
              <div class="owl-item">
                <div class="item">
                  <div class="card">
                    <div class="card-header">
                      <img src="img/01/img-01.jpg" class="img-fluid prod-img">
                      <div class="slide-img container-fluid">
                        <img src="img/01/img-01.jpg" class="small-img img-fluid rounded">
                        <img src="img/01/img-03.jpg" class="small-img img-fluid rounded">
                        <img src="img/01/img-02.jpg" class="small-img img-fluid rounded">
                        <img src="img/01/img-04.jpg" class="small-img img-fluid rounded">
                        <img src="img/01/img-05.jpg" class="small-img img-fluid rounded">
                      </div>
                    </div>
                    <div class="card-body">
                      <p class="prod-name">
                        Giày Converse Chuck Taylor All Star Classic Hi Top
                      </p>
                      <p class="mb-3">Barcode: M3310V-3</p>
                    </div>
                    <div class="card-footer" style="padding: 8px 10px">
                      <div class="row">
                        <div class="col-sm-6">
                          <h5 class="prod-price">1,550,000₫</h5>
                        </div>
                        <div class="col-sm-6">
                          <button class="btn btn-dark" style="padding: 8px 15px">
                            Chi tiết
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="product-list shadow" style="padding-top:0">
      <div class="row">
        <div class="col-sm-5">
          <img src="https://genk.mediacdn.vn/2019/7/20/sneak1-1563614762059880132043.jpg" class="img-fluid" style="height: auto;margin-bottom: 20px">
        </div>
        <div class="col-sm-7" style="padding: 40px 70px 50px 50px">
          <div class='title' style="padding-bottom: 25px">CONVERSE</div>
          <p>Tất cả các sản phẩm giày của Converse đều mang đậm hơi hướng cổ điển với kiểu dáng cột dây basic cổ cao hoặc cổ thấp. 
            Chất liệu đa phần đều là những đôi giày vải với logo hình ngôi sao đặc trưng được in lên thân giày thể hiện sự năng động,
            trẻ trung, phù hợp với mọi trang phục.Đặc biệt Converse được coi là thương hiệu giày nổi tiếng bởi phân khúc đa dạng rất 
            được lòng nhiều lứa tuổi khác nhau. Một số sản phẩm phổ biến có thể nhắc đến như: All Star, Classic, Converse 1970s…
          </p>
        </div>
      </div>
      <div class="container-fluid mt-3" align="center" style="position: relative">
        <div class='title view-all' style="right: 45px;">
          XEM TẤT CẢ
          <span class="material-symbols-outlined ico-view" >
            chevron_right
          </span>
        </div>
        <div class="owl-carousel owl-theme owl-loaded product">
          <div class="owl-stage-outer">
            <div class="owl-stage">
              <div class="owl-item">
                <div class="item">
                  <div class="card">
                    <div class="card-header">
                      <img src="img/01/img-01.jpg" class="img-fluid prod-img">
                      <div class="slide-img container-fluid">
                        <img src="img/01/img-01.jpg" class="small-img img-fluid rounded">
                        <img src="img/01/img-03.jpg" class="small-img img-fluid rounded">
                        <img src="img/01/img-02.jpg" class="small-img img-fluid rounded">
                        <img src="img/01/img-04.jpg" class="small-img img-fluid rounded">
                        <img src="img/01/img-05.jpg" class="small-img img-fluid rounded">
                      </div>
                    </div>
                    <div class="card-body">
                      <p class="prod-name">
                        Giày Converse Chuck Taylor All Star Classic Hi Top
                      </p>
                      <p class="mb-3">Barcode: M3310V-3</p>
                    </div>
                    <div class="card-footer" style="padding: 8px 10px">
                      <div class="row">
                        <div class="col-sm-6">
                          <h5 class="prod-price">1,550,000₫</h5>
                        </div>
                        <div class="col-sm-6">
                          <button class="btn btn-dark" style="padding: 8px 15px">
                            Chi tiết
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="product-list shadow" style="padding-top:0">
      <div class="row">
        <div class="col-sm-7" style="padding: 40px 70px 50px 50px">
          <div class='title' style="padding-bottom: 25px">ADIDAS</div>
          <p>Adidas là một trong những thương hiệu phân phối giày thể thao và các phụ kiện thể thao lớn nhất trên thế giới. 
            Kiểu dáng thiết kế của giày thể thao Adidas luôn đem lại cảm giác trẻ trung và được hầu hết các bạn trẻ chọn là dòng 
            giày đi chơi, tập thể thao. Hơn thế nữa so về giá thì Adidas có nhiều phân khúc khác nhau mà vẫn yêu cầu khắt khe về 
            thẩm mỹ cũng như hỗ trợ bàn chân tốt nhất.
          </p>
          <h6 style="margin-top:8px">Giày Adidas Originals</h6>
          <p>
            Bao gồm các mẫu giày Adidas, được các Sneakerhead ưa chuộng bao gồm những cái tên quen thuộc: NMD, EQT, Stan Smith, Super 
            Star. Gắn liền với nét cổ điển 3 sọc huyền thoại bên thân, chất liệu da bền bỉ, cùng sự tối giản trong thiết kế, chỉ như 
            vậy thôi cũng đã đủ đem lại sức hút tuyệt vời.
          </p>
          <h6 style="margin-top:8px">Giày Adidas Performance</h6>
          <p>
            Là dòng giày hỗ trợ cho người chuyên tập thể thao, vận động viên chuyên nghiệp, vì vậy thiết kế của Giày Adidas Performance
             được áp dụng nhiều công nghệ tối ưu và tiên tiến. Với hai công nghệ Pure Boost và Ultra Boost được Adidas giới thiệu 
             chính thức từ năm 2013 đã đánh dấu bước ngoặt công nghệ trong chất liệu đế giày thể thao (midsole) của Adidas, so với chất
              liệu truyền thống quen thuộc là EVA và TPU. Ngoài công nghệ Boost, Bounce thì Adidas còn liên tục cải tiến các mẫu giày 
              dựa theo công nghệ miCoach, công nghệ theo dõi và đánh giá quá trình luyện tập của vận động viên trong từng trường hợp.
          </p>
        </div>
        <div class="col-sm-5">
          <img src="https://bizweb.dktcdn.net/100/413/756/files/giay-adidas-nu-trang-11.jpg?v=1614313800746" class="img-fluid" style="height: auto;margin-bottom: 20px">
        </div>
      </div>
      <div class="container-fluid mt-3" align="center" style="position: relative">
        <div class='title view-all' style="right: 45px;">
          XEM TẤT CẢ
          <span class="material-symbols-outlined ico-view" >
            chevron_right
          </span>
        </div>
        <div class="owl-carousel owl-theme owl-loaded product">
          <div class="owl-stage-outer">
            <div class="owl-stage">
              <div class="owl-item">
                <div class="item">
                  <div class="card">
                    <div class="card-header">
                      <img src="img/01/img-01.jpg" class="img-fluid prod-img">
                      <div class="slide-img container-fluid">
                        <img src="img/01/img-01.jpg" class="small-img img-fluid rounded">
                        <img src="img/01/img-03.jpg" class="small-img img-fluid rounded">
                        <img src="img/01/img-02.jpg" class="small-img img-fluid rounded">
                        <img src="img/01/img-04.jpg" class="small-img img-fluid rounded">
                        <img src="img/01/img-05.jpg" class="small-img img-fluid rounded">
                      </div>
                    </div>
                    <div class="card-body">
                      <p class="prod-name">
                        Giày Converse Chuck Taylor All Star Classic Hi Top
                      </p>
                      <p class="mb-3">Barcode: M3310V-3</p>
                    </div>
                    <div class="card-footer" style="padding: 8px 10px">
                      <div class="row">
                        <div class="col-sm-6">
                          <h5 class="prod-price">1,550,000₫</h5>
                        </div>
                        <div class="col-sm-6">
                          <button class="btn btn-dark" style="padding: 8px 15px">
                            Chi tiết
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="product-list shadow" style="padding-top:0">
      <div class="row">
        <div class="col-sm-5">
          <img src="https://topbrands.vn/wp-content/uploads/2021/01/Shop-giay-nike-chinh-hang-tphcm.jpg" class="img-fluid" style="height: auto;margin-bottom: 20px">
        </div>
        <div class="col-sm-7" style="padding: 40px 70px 50px 50px">
          <div class='title' style="padding-bottom: 25px">NIKE</div>
          <p>Thương hiệu của Nike là dấu Swoosh được thiết kế bởi Carolyn Davidson cùng với câu slogan kinh điển “Just Do It” hãy 
            làm điều bạn muốn đã trở thành thương hiệu giày dễ nhận biết nhất mọi thời đại.Nike Luôn luôn áp dụng công nghệ mới tiên 
            tiến lên sản phẩm đem đến sự trải nghiệm tuyệt vời cho người dùng. Một số sản phẩm được ưa chuộng như: Nike Air Force 1, 
            Nike Air Jordan, Air Max … Nike sở hữu hệ thống cửa hàng rộng rãi ở mọi quốc gia, không chỉ ở thị trường Châu u. Nike dần
             chinh phục giới trẻ Châu Á đặc biệt là ở Việt Nam bằng sức hút “Just Do It” của mình
          </p>
        </div>
      </div>
      <div class="container-fluid mt-3" align="center" style="position: relative">
        <div class='title view-all' style="right: 45px;">
          XEM TẤT CẢ
          <span class="material-symbols-outlined ico-view" >
            chevron_right
          </span>
        </div>
        <div class="owl-carousel owl-theme owl-loaded product">
          <div class="owl-stage-outer">
            <div class="owl-stage">
              <div class="owl-item">
                <div class="item">
                  <div class="card">
                    <div class="card-header">
                      <img src="img/01/img-01.jpg" class="img-fluid prod-img">
                      <div class="slide-img container-fluid">
                        <img src="img/01/img-01.jpg" class="small-img img-fluid rounded">
                        <img src="img/01/img-03.jpg" class="small-img img-fluid rounded">
                        <img src="img/01/img-02.jpg" class="small-img img-fluid rounded">
                        <img src="img/01/img-04.jpg" class="small-img img-fluid rounded">
                        <img src="img/01/img-05.jpg" class="small-img img-fluid rounded">
                      </div>
                    </div>
                    <div class="card-body">
                      <p class="prod-name">
                        Giày Converse Chuck Taylor All Star Classic Hi Top
                      </p>
                      <p class="mb-3">Barcode: M3310V-3</p>
                    </div>
                    <div class="card-footer" style="padding: 8px 10px">
                      <div class="row">
                        <div class="col-sm-6">
                          <h5 class="prod-price">1,550,000₫</h5>
                        </div>
                        <div class="col-sm-6">
                          <button class="btn btn-dark" style="padding: 8px 15px">
                            Chi tiết
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>
  <footer>
    <div class="row">
      <div class="col-sm-4">
        <h6 style="font-weight: bolder">SNEAKER BUZZ</h6>
        <p>Địa chỉ: Đại học Xây Dựng Hà Nội</p>
        <p>Điện thoại: 0999999999</p>
        <p>Email: DHXD@email.com</p>
      </div>
      <div class="col-sm-4" >
        <h6 style="font-weight: bolder">DANH MỤC</h6>
        <p>HOME PAGE</p>
        <P>BRAND</P>
        <P>SPECIAL PRICE</P>
        <P>ORDER</P>
      </div>
      <DIV class="col-sm-4">
        <h6 style="font-weight: bolder">CHÍNH SÁCH</h6>
        <p>Điều khoản & điều kiện</p>
        <p>Chính sách bảo mật</p>
        <p>Chính sách giao hàng</p>
        <p>Chính sách bảo hành</p>
        <p>Phương thức thanh toán</p>
        <p>Hướng dẫn đặt hàng</p>
        <p>Liên hệ hợp tác</p>
      </DIV>
    </div>
  </footer>
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="{{asset('js/user/homepage.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script src="{{asset('js/user/homepage.js')}}"></script>


</body>

</html>