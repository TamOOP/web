<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="_token" content="{{ csrf_token() }}"/>

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{asset('css/module/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/module/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/cart.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/user/cart.js')}}"></script>
</head>

<body style='background: #f5f5f5'>
  @include('module.header')
  <main>
    <div class='container-box'>
      <div class="space"></div>
      <div class='content-box'>
        <div class='item-box'>
          <div class="div_check">
            <input type="checkbox" class="checkbox check-all">
          </div>
          <div class="div_product">Sản phẩm</div>
          <div class="div_price_each gray">Đơn giá</div>
          <div class="div_amount gray">Số lượng</div>
          <div class="div_price_all gray">Số tiền</div>
          <div class="div_action gray">Thao tác</div>
        </div>
        <div style='background:white'>
          @for ($i = 0; $i < count($products); $i++)
            <div class="item-box product">
              <div class="div_check">
                @if (isset($pid))
                  @if ($products[$i]->product_id == $pid)
                    <input type="checkbox" name="" id="{{$products[$i]->product_id}}" class="checkbox check-one" checked>
                  @else
                    <input type="checkbox" name="" id="{{$products[$i]->product_id}}" class="checkbox check-one">
                  @endif
                @else
                  <input type="checkbox" name="" id="{{$products[$i]->product_id}}" class="checkbox check-one">
                @endif
              </div>
              <div class="div_product">
                <div class="div_product-info">
                  <img src="/img/{{$products[$i]->product_id}}/{{$products[$i]->product_image}}" class='product-img'>
                  <a style="width: calc(100%-100px)" href='/products/{{$products[$i]->product_id}}' class="prod-link">
                    <p class="txt_product ml">{{$products[$i]->product_name}}</p>
                  </a>
                </div>
              </div>
              <div class="div_price_each">{{number_format($products[$i]->product_price)}}₫</div>
              <div class="div_amount">
                <div class='quantity-change' >
                  <button class="btn-change" id='btn_dec'>
                    <span class="material-symbols-outlined">
                      remove
                    </span>
                  </button>
                  <div style="width: 100%;">
                    <input type="number" name="quantity" class="quantity" min="1" value='{{$products[$i]->amount}}'
                      onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                  </div>
                  <button class="btn-change" id='btn_inc'>
                    <span class="material-symbols-outlined">
                      add
                    </span>
                  </button>
                </div>
              </div>
              <div class="div_price_all">{{number_format($products[$i]->product_price * $products[$i]->amount)}}₫</div>
              <div class="div_action">
                <a class="p_remove">Xóa</a>
              </div>
            </div>
          @endfor
        </div>
        <div class='item-box payment'>
          <div class="flex">
            <input type="checkbox" class='checkbox check-all'>
            <p class="ml" style="font-size: 17px">Chọn tất cả</p>
          </div>
          <div class="flex">
            <p style="font-size: 18px">Tổng thanh toán (0 Sản phẩm):</p>
            <p class="price">1,000,000₫</p>
            <form action="">
              <input type="hidden" id="choice" name='choice'>
              <button id='btn_payment'>Mua hàng</button>
            </form>
          </div>
        </div>
      </div>
      <div class="space"></div>
    </div>
    <div class='alert-screen'>
      <div class='alert-overlay'>
      </div>
      <div class='alert-box shadow'>
          <p style='font-size: 18px'>Bạn chưa chọn sản phẩm để mua</p>
          <button id="btn_confirm"> OK</button>
      </div>
  </div>
  </main>
  @include('module.footer')
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>