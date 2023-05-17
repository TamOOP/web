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
  
  <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>

  <link rel="stylesheet" href="{{asset('css/user/product.css')}}">
  <link rel="stylesheet" href="{{asset('css/module/header.css')}}">
  <link rel="stylesheet" href="{{asset('css/module/footer.css')}}">
  <script src="{{asset('js/user/product.js')}}"></script>
</head>
<body>
  @include('module.header')
  <main style="margin-top: 25px;padding-left: 10%">

    {{-- Image --}}
    <form id="image_upload" action="/updateImg/{{$product->product_id}}">
      @csrf
      <input type="file" name="img[]" class="input" id="img" @required(true)  accept="image/gif, image/jpeg, image/png" multiple>
      <label for="img">
        <div class="btn btn-primary">Choose Image</div>
      </label>
      <button class="btn btn-dark" type="submit">Submit</button>
    </form>
    <div id="preview" class="mt-3" style="background: #ccc; display:flex">
      {{-- <ul class="preview">
        <img src="{{asset('img/01/img-01.jpg')}}" class="img-fluid">
        <div class="delBtn">
          <span class="material-symbols-outlined">
            close
          </span>
        </div>
      </ul> --}}
    </div>
    
    <script>
      function deleteImg(e) { 
        var data = $(e).siblings('img').attr('src').split("temp/");
        
        // alert(data[1]);
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
        $.ajax({
          url: "/delTempImg",
          type: "get",
          data: {nameImg: data[1]},
          success: function (response) {
            // alert(response.path);
            $(e).parent().attr("class","deleted");
            $("ul").remove(".deleted");
          },
          error:function (response) {
            alert("error");
          }
        });
      }
    </script>


    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="#">{{ucwords(strtolower($product->Brand_name))}}</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="color: #d0021b !important">Giày Converse Chuck Taylor All Star Classic Hi Top</li>
      </ol>
    </nav>
   <div class="container-fluid mt-3" style="margin-top:40px !important; padding-left: 0px !important ">
    <div class="row">
      <div class="col-sm-8" style="background:white;">
        <div class="row">
          <div class="col-sm-6">
            <img src="/img/{{$product->product_id}}/{{explode(',',$product->product_image)[0]}}" class="large-img">
          </div>
          <div class="col-sm-6">
            <div class="owl-carousel owl-theme owl-loaded" style="width:90%; position: relative;">
              <div class="owl-stage-outer" style="height: 85px;" >
                {{-- <div class="owl-stage">
                  <div class="owl-item">
                    <div class="item">
                      <img src="{{asset('img/01/img-01.jpg')}}" class="small-img">
                    </div>
                  </div>
                  <div class="owl-item">
                    <div class="item">
                      <img src="{{asset('img/01/img-02.jpg')}}" class="small-img">
                    </div>
                  </div>
                  <div class="owl-item">
                    <div class="item">
                      <img src="{{asset('img/01/img-03.jpg')}}" class="small-img">
                    </div>
                  </div>
                  <div class="owl-item">
                    <div class="item">
                      <img src="{{asset('img/01/img-04.jpg')}}" class="small-img">
                    </div>
                  </div>
                  <div class="owl-item">
                    <div class="item">
                      <img src="{{asset('img/01/img-05.jpg')}}" class="small-img">
                    </div>
                  </div>
                </div> --}}
                <div class="owl-stage">
                  @foreach (explode(',',$product->product_image) as $image)
                    <div class="owl-item">
                      <div class="item">
                        <img src="/img/{{$product->product_id}}/{{$image}}" class="small-img">
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
              <div class="owl-nav">
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
            <div style="margin-top: 30px">
              <h4>
                {{ $product->product_name}}
              </h4>
              <div class="status-line">
                <span class="mgr-5"> Thương hiệu: </span>
                <span class="mgr-10" style="color: #d0021b">{{ucwords(strtolower($product->Brand_name))}}</span>
                <span class="mgr-10">|</span>
                <span class="mgr-5">Kho: </span>
                <span style="color: #d0021b" id="status"></span>
              </div>
              <div class="status-line">
                <span class="mgr-5">Barcode:</span>
                <span> {{ $product->product_id}} </span>
              </div>
              <h2 class="price">
                {{ $product->product_price}}₫
              </h2>
              <div>
                <span style="font-size: 18px">KHUYẾN MÃI</span>
                <div id="promotion">
                  <div class="promotion-item">
                    <div class="promotion-tag">
                      <span class="rectangle">
                        Ưu Đãi Thành Viên Mới Tại Website
                      </span>  
                    </div>
                    <div class="promotion-info shadow" >
                      Nhập mã: HIFRIEND giảm 100k cho đơn hàng 999k, Áp dụng sản phẩm không giảm giá ( sử dụng 1 lần/ 1 tài khoản )
                    </div>
                  </div>
                  <div class="promotion-item">
                    <div class="promotion-tag">
                      <span class="rectangle">
                        Ưu đãi thanh toán qua Ví VNPAY
                      </span>  
                    </div>
                    <div class="promotion-info shadow" >
                      Nhập mã: VNPAYGIFT5 - Giảm đến 50K cho đơn từ 1.500K - Thời gian từ 07/03 đến 31/05/2023 - Khách hàng được áp dụng 01 tháng/01 lần
                    </div>
                  </div>
                  <div class="promotion-item">
                    <div class="promotion-tag">
                      <span class="rectangle">
                        VUI LỄ LỚN, HOÀN TIỀN TO
                      </span>  
                    </div>
                    <div class="promotion-info shadow" >
                      Code [HOLIDAY200] Giảm 200K Cho Đơn từ 1.000K - Code [HOLIDAY400] Giảm 400K Cho Đơn từ 1.600K - Code [HOLIDAY600] Giảm 600K Cho Đơn từ 2.300K - Code [HOLIDAY800] Giảm 800K Cho Đơn từ 3.000K
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" style="margin-top:20px">
              <h6 class="col-sm-2" style="margin-top: 8px">Size:</h6>
              <div class="col-sm-1 size-box size-active">
                <p>{{$sizes[0]->size_id}}</p>
                <p style="display: none" class="amount">{{$sizes[0]->quantity}}</p>
              </div>
              @for ($i = 1; $i < count($sizes); $i++)
                <div class="size-box col-sm-1" >
                  <p>{{$sizes[$i]->size_id}}</p>
                  <p style="display: none" class="amount">{{$sizes[$i]->quantity}}</p>
                </div>
              @endfor
            </div>
            <div class="material">
              <h6 style="margin-top: 8px">Chất liệu:</h6>
              <div class="chat-lieu col-sm-">{{ $product->product_material}}</div>
            </div>
            <form action="/cart/{{$product->product_id}}" method="get">
              <div class="material" id="setAmount">
                <h6 style="margin-top: 8px">Số lượng:</h6>
                <div class="btn-group">
                  <div class="button">
                    <span class="material-symbols-outlined" style="font-size: 20px">
                      remove
                    </span>
                  </div>
                  <input type="number" id="buy-amount" value="1" min="1" required>
                  <div class="button">
                    <span class="material-symbols-outlined" style="font-size: 20px">
                      add
                    </span>
                  </div>
                </div>
              </div>
              <div class="material" style="justify-content: center">
                  <button type ='submit' class="buy-btn"></button>
              </div>
            </form>
          </div>
        </div>
        <div>
          <div class="tab row">
            <button class="tablinks col-sm-3 rounded-top active" onclick="openTab(event, 'description')">Mô tả sản phẩm</button>
            <button class="tablinks col-sm-3 rounded-top" onclick="openTab(event, 'size-table')">Bảng Size</button>
            <button class="tablinks col-sm-3 rounded-top" onclick="openTab(event, 'policy')">Chính sách bán hàng</button>
            <button class="tablinks col-sm-3 rounded-top" onclick="openTab(event, 'preserve')">Thông tin bảo quản</button>
          </div>
          <div id="description" class="tabcontent" style="display: block">
            <p>
              {{ $product->product_des}}
            </p>
            </div>
          
          <div id="size-table" class="tabcontent">
            <img src="{{asset('img/size.jpg')}}" alt="" class="img-fluid">
          </div>
          
          <div id="policy" class="tabcontent">
            <h5>Hàng đã mua không đổi trả</h5>
          </div>
  
          <div id="preserve" class="tabcontent">
            <p>Đối Với Giày Vải bạt (canvas):</p>
            <p>1.Sản phẩm chỉ nên giặt bằng tay và tránh việc chà sát mạnh trên bề mặt vải.</p>
            <p>
              2.Đối với hóa chất tẩy rửa hoặc xà phòng có tính kiềm cao đều dễ gây nên tình trạng bung keo, biến dạng hoặc loang màu. 
              Do đó chỉ nên dùng dầu gội, sữa tắm hoặc dung dịch chuyên dụng dành cho sản phẩm.
            </p>
            <p>3.Khuyến cáo không phơi sản phẩm dưới ánh nắng trực tiếp hoặc sấy khô bằng nhiệt độ cao.</p>
            <p>4.Đối với giày trắng, giặt xong sẽ quấn nhiều lớp giấy ăn xung quanh để thấm hút nước và nhân lúc giày còn ẩm 
              rắc bột phấn rôm lên trực tiếp bề mặt vải, sau đó để giày khô tự nhiên.
            </p>
            <p>5.Đối với khách hàng thường xuyên vận động hoặc ra nhiều mồ hôi, nên phun một lớp giấm ăn lên giày trước khi sử dụng.</p>
            <p style="margin-top: 10px">Đối Với Giày Da (leather):</p>
            <p>1.Sản phẩm bằng da, giả da hoặc da lộn khi bị bám bụi bẩn chỉ nên sử dụng khăn lông ẩm để vệ sinh và làm sạch.</p>
            <p>2.Trong quá trình sử dụng, nên hạn chế va chạm vật sắt/ nhọn lên trên bề mặt da; tránh đi dưới 
              trời mưa hoặc khi dính vết trà, cà phê thì phải xử lý ngay để không lưu lại vết ố.</p>
            <p>3.Không tự ý bôi hoặc phun các chất tẩy rửa lên bề mặt da, trừ những dung dịch chuyên dụng dành cho sản phẩm.</p>
            <p>4.Khuyến cáo không phơi sản phẩm dưới ánh nắng trực tiếp hoặc sấy khô bằng nhiệt độ cao.</p>
            <p style="margin-top: 10px"> Lưu ý chung : Đối với sản phẩm không sử dụng thường xuyên thì nên nhét 
              giấy bên trong để giữ được form dáng như ban đầu.
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <table class="table table-bordered proc-table">
          <thead>
            <tr>
              <th colspan="2">THÔNG TIN SẢN PHẨM</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Barcode</td>
              <td>{{ $product->product_id}}</td>
            </tr>
            <tr>
              <td>Dòng sản phẩm</td>
              <td>Chuck Taylor All Star Classic</td>
            </tr>
            <tr>
              <td>Giới tính</td>
              <td>Unisex</td>
            </tr>
            <tr>
              <td>Màu sắc</td>
              <td>{{ $product->product_color}}</td>
            </tr>
            <tr>
              <td>Chế độ bảo hành</td>
              <td>1 Tháng
                <p>(Không áp dụng sản phẩm giảm giá)</p>
              </td>
            </tr>
            <tr>
              <td>Phụ kiện kèm theo</td>
              <td>Shopping Bag + HĐ Mua Hàng +
                Vớ Tặng (Áp dụng 1 số sản phẩm)</td>
            </tr>
          </tbody>
        </table>
        <div style="margin-top: 80px">
          <p style="font-size: 22px">SẢN PHẨM HOT</p>
          <div class="container-fluid mt-3">
            <div class="row box-product">
              <div class="col-sm-4" style="padding:0">
                <img src="{{asset('img/01/img-01.jpg')}}" class="img-fluid" style="height: 100%">
              </div>
              <div class="col-sm-8" >
                <p>Giày Converse Chuck Taylor All Star Classic Hi Top</p>
                <p style="font-weight: bolder;color: red">1,550,000₫</p>
              </div>
            </div>
            <div class="row box-product">
              <div class="col-sm-4" style="padding:0">
                <img src="{{asset('img/01/img-01.jpg')}}" class="img-fluid" style="height: 100%">
              </div>
              <div class="col-sm-8" >
                <p>Giày Converse Chuck Taylor All Star Classic Hi Top</p>
                <p style="font-weight: bolder;color: red">1,550,000₫</p>
              </div>
            </div>
            <div class="row box-product">
              <div class="col-sm-4" style="padding:0">
                <img src="{{asset('img/01/img-01.jpg')}}" class="img-fluid" style="height: 100%">
              </div>
              <div class="col-sm-8" >
                <p>Giày Converse Chuck Taylor All Star Classic Hi Top</p>
                <p style="font-weight: bolder;color: red">1,550,000₫</p>
              </div>
            </div>
            <div class="row box-product">
              <div class="col-sm-4" style="padding:0">
                <img src="{{asset('img/01/img-01.jpg')}}" class="img-fluid" style="height: 100%">
              </div>
              <div class="col-sm-8" >
                <p>Giày Converse Chuck Taylor All Star Classic Hi Top</p>
                <p style="font-weight: bolder;color: red">1,550,000₫</p>
              </div>
            </div>
            <div class="row box-product">
              <div class="col-sm-4" style="padding:0">
                <img src="{{asset('img/01/img-01.jpg')}}" class="img-fluid" style="height: 100%">
              </div>
              <div class="col-sm-8" >
                <p>Giày Converse Chuck Taylor All Star Classic Hi Top</p>
                <p style="font-weight: bolder;color: red">1,550,000₫</p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
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