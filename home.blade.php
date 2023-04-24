<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <style>
      li{
        list-style-type: none;
      }
      p{
        margin: 0px;
      }
      a{
        text-decoration: none;
      }
      .logo{
        height: 80px;
      }
      .mid-header{
        padding: 20px 0px;
        height: 110px;
      }
      .inline-block{
        display: inline-block;
        padding: 0px 20px;
      }
      .search-bar{
        border-radius: 20px;
        border: 1px solid #e5e6ec; 
        outline: none;
        padding: 0px 70px 0px 20px;
        height: 45px;
        width: 100%;
      }
      .input-search{
        width: 350px;
        position: relative;
      }
      .search-icon{
        position: absolute;
        right: 20px;
        top: 10px;
      }
      .icon-hotline{
        background-color: black;
        border-radius: 50px;
        height: 45px;
        width: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .shopping-dropdown{
        position: absolute;
        background-color: white;
        display: none;
        z-index: 1000;
        cursor: default;
        min-width: 320px;
        text-align: center;
        right: 0px;
        padding: 10px;
        margin-top: 2px;
      }
      .account-dropdown{
        position: absolute;
        display: none;
        background-color: white;
        display: none;
        width: 180px;
        text-align: center;
        padding: 10px 0px;
        right: -70px;
        margin-top: 2px;
        z-index: 1000;
      }
      #shopping-cart, #account{
        position: relative;
      }
      #shopping-cart:hover .shopping-dropdown{
        display: block;
      }
      #account:hover .account-dropdown{
        display: block;
      }
      .btn-dark{
        font-size: 14px;
        border-radius: 20px;
        padding: 10px 30px;
      }
      .btn-dark:hover{
        background-color: white !important;
        border: 1px solid red !important;
        color: red !important;
      }
      .btn-secondary{
        border-radius: 0px;
        padding: 10px 30px;
        font-size: 14px;
      }
      .btn-secondary:hover{
        background-color: red !important;
      }
      .btn-account{
        width: 150px;
        margin: 0px 0px 5px 0px;
      }
      #shopping-cart, #account, #hotline{
        display: inline-block;
      }
      #account, #shopping-cart{
        padding-left: 20px;
      }
      .hotline-bar{
        border: 2px solid black;
        border-radius: 50px;
        line-height: 18px;
        height: 45px;
        padding: 0px 45px 0px 15px;
        position: relative;
      }
      .hotline-bar:hover{
        color: white;
        background: rgb(81, 81, 81);
        cursor: pointer;
      }
      #icon-hotline{
        position: absolute;
        right: -8px;
        top: -2px;
      }
      .nav-bar{
        background: black;
      }
      .nav-link{
        background: black;
        color: white;
        padding: 11px 40px;
        font-size: 15px;
        margin-right: 5px;
      }
      .nav-link:hover{
        color: white !important;
        background: #d0021b !important;
      }
      .link-brand{
        display: flex;
        justify-content: center;
        align-items: center;
        background:#d0021b;
        margin-right: 5px;
        position: relative;
      }
      .brand-expand{
        color: white;
         position: absolute;
         right: 15px;
      }
      .expand-left{
        color: black;
        position: absolute;
        top: 5px;
        right: -10px;
      }
      .nav-item:hover .brand-dropdown{
        display: block;
      }
      .brand-dropdown{
        display: none;
        color: black;
        background: white;
        width: 200px;
        padding: 6px 10px;
        position: absolute;
        z-index: 1000;
      }
      .brand-type{
        position: relative;
        border-bottom: solid 1px #e5e6ec;
        padding: 6px 0px;
        cursor: pointer;
      }
      .brand-type a:hover, .brand-type a:hover span{
        color: red !important;
      }
      ul li a{
        display: block;
      }
      .type-dropend{
        display: none;
        position: absolute;
        top: -6px;
        right: -210px;
        background: white;
        width: 200px;
        padding: 6px 10px;
        z-index: 1000;
      }
      .brand-type:hover .type-dropend{
        display: block;
      }
    </style>
      
    
</head>

<body>
  <header>
    <div class="text-center">
        <img src="https://theme.hstatic.net/200000265619/1000946504/14/banner.jpg?v=372" class="img-fluid"
          height="60">
    </div>
    <div class=" mid-header">
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
    </div>
    <div class="nav-bar">
      <ul class="nav justify-content-center  ">
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

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>