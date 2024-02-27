@extends('front.layout.app')


@section('main_content')
<div class="slider slider-heading" style="background: url({{ asset('uploads/banner_home.jpg') }}) no-repeat top center; ">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item user-heading">
                    <div class="inner-title">
                        
                        <h3>
                            Cập Nhật Thông Tin Tài Khoản
                        </h3>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid published-recuitment-wrapper">
    <div class="container published-recuitment-content">
      <div class="row"> 
        @include('company.sidebar')
        <div class="col-md-9 col-sm-12 col-12 recuitment-inner">
          <div class="recuiter-info">
            
            <div class="clearfix list-rec">
              <h4>Đổi mật khẩu</h4>
            </div>
          </div>
          <div class=" accordion accordion-content" id="accordionExample" style="
          display: flex;
          justify-content: center;">
           
            <form action="{{ route('') }}" method="post" style="width:70%">   
                @csrf
                <div class="col-12">
                    <label for="oldPassword" class="form-label">Mật khẩu hiện tại</label>
                    <div class="input-group" id="show_hide_password">
                        <input type="password" name="oldPassword" class="form-control border-end-0" id="oldPassword"  placeholder="Nhập mật khẩu hiện tại"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="fa fa-eye-slash"></i></a>
                    </div>
                </div>
                <div class="col-12">
                    <label for="newPassword" class="form-label">Mật khẩu mới</label>
                    <div class="input-group" id="show_hide_new_password">
                        <input type="password" name="newPassword" class="form-control border-end-0" id="newPassword"  placeholder="Nhập mật khẩu mới"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="fa fa-eye-slash"></i></a>
                    </div>
                </div>
                <div class="col-12">
                    <label for="retypePassword" class="form-label">Xác nhận mật khẩu</label>
                    <div class="input-group" id="show_hide_retype_password">
                        <input type="password" name="retypePassword" class="form-control border-end-0" id="retypePassword"  placeholder="Nhập lại mật khẩu mới"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="fa fa-eye-slash"></i></a>
                    </div>
                </div>
                <br>
                <div class="rec-submit">
                    <button type="submit" class="btn-submit-recuitment" name="">
                      <i class="fa fa-floppy-o pr-2"></i>Cập Nhật
                    </button>
                  </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("fa-eye-slash");
                $('#show_hide_password i').removeClass("fa-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("fa-eye-slash");
                $('#show_hide_password i').addClass("fa-eye");
            }
        });

        $("#show_hide_new_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_new_password input').attr("type") == "text") {
                $('#show_hide_new_password input').attr('type', 'password');
                $('#show_hide_new_password i').addClass("fa-eye-slash");
                $('#show_hide_new_password i').removeClass("fa-eye");
            } else if ($('#show_hide_new_password input').attr("type") == "password") {
                $('#show_hide_new_password input').attr('type', 'text');
                $('#show_hide_new_password i').removeClass("fa-eye-slash");
                $('#show_hide_new_password i').addClass("fa-eye");
            }
        });

        $("#show_hide_retype_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_retype_password input').attr("type") == "text") {
                $('#show_hide_retype_password input').attr('type', 'password');
                $('#show_hide_retype_password i').addClass("fa-eye-slash");
                $('#show_hide_retype_password i').removeClass("fa-eye");
            } else if ($('#show_hide_retype_password input').attr("type") == "password") {
                $('#show_hide_retype_password input').attr('type', 'text');
                $('#show_hide_retype_password i').removeClass("fa-eye-slash");
                $('#show_hide_retype_password i').addClass("fa-eye");
            }
        });
    });
</script>

@endsection