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
</head>

<body style="background:#ebf0f6">
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
  <main align="center" style="margin-top: 30px;margin: 60px 35%;background: white;padding: 20px 30px;border-radius: 10px" class="shadow">
    <p style="font-size: 25px;font-weight: 800">ĐĂNG NHẬP</p>
    <form action="" >
        <div class="mb-3 mt-3" align="left">
          <label for="email" class="form-label" >Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Nhập Email" name="email" @required(true)>
        </div>
        <div class="mb-3" align="left">
          <label for="pwd" class="form-label">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="pswd" @required(true)>
        </div>
        <button type="submit" class="btn btn-dark" style="padding: 10px 20px;">Đăng nhập</button>
    </form>
    <div style="border-top: 1px solid black; margin-top: 20px">
        <button class="btn" style="padding: 10px 20px; background: #4CAF50; margin-top: 20px">
            <a href="#" style="color: white">Tạo tài khoản mới</a>
        </button>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

    <script src="{{asset('js/jquery.min.js')}}"></script>
</body>

</html>