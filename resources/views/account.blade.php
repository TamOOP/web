<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="_token" content="{{ csrf_token() }}"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/account.css')}}">
    <link rel="stylesheet" href="{{asset('css/module/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/module/footer.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    
    
</head>

<body style="background:#f5f5f5">
  @include('module.header')
  <main>
    <div class="container-fluid mt-4 " align="center">
        <div class="row">
            <div class="tab col-lg-3">
                <div class="dropdown">
                    <div class="account">
                        <span class="material-symbols-outlined" style="color: #2673dd">
                            person
                        </span>
                        <p class="ml-1">Tài khoản của tôi</p>
                    </div>
                    <div class="account-drop">
                        <p class="mt-1 ml-1 choice">Hồ sơ</p>
                        <p class="mt-1 ml-1 choice">Địa chỉ</p>
                        <p class="mt-1 ml-1 choice">Đổi mật khẩu</p>
                    </div>
                </div>
                <div class="account mt-3">
                    <span class="material-symbols-outlined" style="color: #2673dd">
                        receipt
                    </span>
                    <p class="ml-1">Đơn mua</p>
                </div>
            </div>
            <div class="container col-lg-9 shadow rounded"  id='profile' style='display:none'>
                <p class="title">Hồ Sơ Của Tôi</p>
                <div class="content" align="left">
                    <form id="form_profile">
                        @csrf
                        <table>
                            <tr class='tr_input' id='tr_name'>
                                <td class="form-label">
                                    Tên
                                </td>
                                <td style="padding-left:15px">
                                    <input type="text" class="form-control " id="name" name="name" @required(true) value="{{$user->name}}">
                                </td>
                            </tr>
                            <tr>
                                <td class="form-label">
                                    Email
                                </td>
                                <td style="padding-left:15px">
                                    hoangminhtam1602@gmail.com
                                </td>
                            </tr>
                            <tr class='tr_input' id='tr_phone'>
                                <td class="form-label">
                                    Số điện thoại
                                </td>
                                <td style="padding-left:15px">
                                    <input type="text" class="form-control " id="phone" name="phone" value="(+84) {{$user->phone}}" >
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"  align="center">
                                    <button id="btn_profile" class="button">Lưu</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="container col-lg-9 shadow rounded" style='display:block' id='address'>
                <button class="button" style="float: right;margin:0">
                    Thêm địa chỉ mới
                </button>
                <p class="title">Địa Chỉ Của Tôi</p>
                @if ($user->address == 0)
                    <div class="content" align="center" style="padding: 80px 0">
                        <span class="material-symbols-outlined" style="font-size: 60px;color:rgb(189, 189, 189)">
                            location_on
                        </span>
                        <p style="font-size: 18px;color:rgb(125, 125, 125)">Bạn chưa có địa chỉ</p>
                    </div>   
                @endif
                <div class="content" align="left">
                    
                    <form action="">
                        <table>
                            {{-- <tr>
                                <td class="form-label">
                                    Tên
                                </td>
                                <td style="padding-left:15px">
                                    <input type="text" class="form-control" id="name" @required(true)>
                                </td>
                            </tr>
                            <tr>
                                <td class="form-label">
                                    Email
                                </td>
                                <td style="padding-left:15px">
                                    hoangminhtam1602@gmail.com
                                </td>
                            </tr>
                            <tr>
                                <td class="form-label">
                                    Số điện thoại
                                </td>
                                <td style="padding-left:15px">
                                    0999999999
                                    <a href="">Thay đổi</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"  align="center">
                                    <button type="submit" class="button">Lưu</button>
                                </td>
                            </tr> --}}
                        </table>
                    </form>
                </div>
            </div>
            <div class="container col-lg-9 shadow rounded" style='display:none' id='password'>
                <p class="title">Đổi Mật Khẩu</p>
                <div class="content" align="left">
                    <form id="form_password">
                        @csrf
                        <table>
                            <tr id="tr_pass" class="tr_input">
                                <td class="form-label">
                                    Mật Khẩu Hiện Tại
                                </td>
                                <td style="padding-left:15px;width:365px">
                                    <input type="password" name='old_pass' class="form-control" @required(true) style="max-width:350px">
                                </td>
                            </tr>
                            <tr class="tr_input" id='tr_newpass'>
                                <td class="form-label">
                                    Mật Khẩu Mới
                                </td>
                                <td style="padding-left:15px;width:365px">
                                    <input type="password" name="new_pass" class="form-control" @required(true) style="max-width:350px">
                                </td>
                            </tr>
                            <tr id="tr_confirm" class="tr_input">
                                <td class="form-label">
                                    Xác Nhận Mật Khẩu
                                </td>
                                <td style="padding-left:15px;width:365px">
                                    <input type="password" name="confirm_pass" class="form-control" @required(true) style="max-width:350px">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"  align="center">
                                    <button class="btn-disabled" id='btn_pass' disabled>Xác nhận</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class='success-screen'>
        <div class='success-overlay'>
        </div>
        <div class='success-box shadow'>
            <span class="material-symbols-outlined" style='color:rgb(8, 211, 8);font-size: 50px'>
                check_circle
            </span>
            <p style='font-size: 18px'>Cập nhật thành công</p>
        </div>
    </div>
  </main>
  @include('module.footer')
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

    <script src="{{asset('js/account.js')}}"></script>
</body>

</html>