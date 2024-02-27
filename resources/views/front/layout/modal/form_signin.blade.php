

<div class="modal fade text-left" id="form-signin" tabindex="-1" role="dialog" aria-hidden="true">
    <div  class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header header_sign">
                <ul class="nav nav-tabs" id="auth-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab-1" data-bs-toggle="tab" data-bs-target="#login-1" type="button" role="tab" aria-controls="login-1" aria-selected="false">Đăng Nhập
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab-1" data-bs-toggle="tab" data-bs-target="#register-1" type="button" role="tab" aria-controls="register-1" aria-selected="true">Đăng Ký
                        </button>
                    </li>
                </ul>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="login-1" role="tabpanel" aria-labelledby="login-tab-1">
                        <center>
                            <h4 style="font-weight: 600; font-size:18px; padding-top:20px" >ĐĂNG NHẬP NHÀ TUYỂN DỤNG</h4>

                        </center>
                        <form action="{{ route('company_login_submit') }}" method="post">   
                            @csrf

                            <div id="sign-error" class="alert-danger d-none"></div>
                            
                            <div class="form-group mb-3">
                                <label  class="mb-1">Email</label>
                                <div class="input-group border-hover">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="Nhập email của bạn" aria-label="Nhập email của bạn" value="">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label  class="mb-1">Mật khẩu</label>
                                <div class="input-group border-hover" id="show_hide_password">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input type="password" id="password"  name="password" class="form-control" placeholder="Nhập mật khẩu" aria-label="Nhập mật khẩu">
                                    <div class="input-group-prepend eye-icon" >
                                        <a href="javascript:;" class="input-group-text bg-transparent"><i class="fa fa-eye-slash"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-sign input-block-level w-100 h-40 mb-3 btn-primary-hover">Đăng
                                nhập
                                </button>
                            </div>
                            
                        </form>
                    </div>
                    <div class="tab-pane" id="register-1" role="tabpanel" aria-labelledby="register-tab-1">
                        <center>
                            <h4 style="font-weight: 600; font-size:18px; padding-top:20px" >ĐĂNG KÝ NHÀ TUYỂN DỤNG</h4>

                        </center>
                        <form action="{{ route('company_signup_submit') }}" method="post">
                            @csrf
                            <div id="register-error" class="alert-danger d-none"></div>
                            <div class="form-group mb-3">
                               
                                <label  class="mb-1">Họ tên</label>
                                <div class="input-group border-hover">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text"name="person_name"
                                    value="{{ old('person_name') }}"
                                     class="form-control" placeholder="Nhập họ tên của bạn" aria-label="Nhập email của bạn" value="">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label  class="mb-1">Công ty</label>
                                <div class="input-group border-hover">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="company_name" class="form-control" placeholder="Nhập tên công ty" value="{{ old('company_name') }}">
                                </div>
                               
                            </div>
                            <div class="form-group mb-3">
                                <label  class="mb-1">Email</label>
                                <div class="input-group border-hover">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="Nhập email của bạn" aria-label="Nhập email của bạn" value="">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label  class="mb-1">Mật khẩu</label>
                                <div class="input-group border-hover" id="new_password">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input type="password" id="password_register" name="password" class="form-control" placeholder="Nhập mật khẩu" aria-label="Nhập mật khẩu">
                                    <div class="input-group-prepend eye-icon" >
                                        <a href="javascript:;" class="input-group-text bg-transparent"><i class="fa fa-eye-slash"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label  class="mb-1">Xác nhận mật khẩu</label>
                                <div class="input-group border-hover" id="retype_password">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input type="password" id="password_confirm" name="retype_password" class="form-control" placeholder="Nhập mật khẩu" aria-label="Nhập mật khẩu">
                                    <div class="input-group-prepend eye-icon" >
                                        <a href="javascript:;" class="input-group-text bg-transparent"><i class="fa fa-eye-slash"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <div class="d-flex align-items-start gap-2 agreement-social">
                                    <div class="pdt-2">
                                        <input id="agreement-social-register" name="agreement-social" type="checkbox" checked="">
                                        <label for="agreement-social-register"></label>
                                    </div>
                                    <p>
                                        <label for="agreement-social-register">
                                        Tôi đã đọc và đồng ý với <a target="_blank" href="#" class="text-success">Điều khoản
                                        dịch vụ</a> và <a target="_blank" href="#" class="text-success">Chính sách bảo
                                        mật</a> của TopCV
                                        </label>
                                    </p>
                                </div>
                                <button type="submit" class="btn btn-sign input-block-level w-100 h-40 mb-3 btn-primary-hover">Đăng ký
                                </button>
                            </div>
                        </form>
                    </div>
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
                $('#show_hide_password .eye-icon i').addClass("fa-eye-slash");
                $('#show_hide_password .eye-icon i').removeClass("fa-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password .eye-icon i').removeClass("fa-eye-slash");
                $('#show_hide_password .eye-icon i').addClass("fa-eye");
            }
        });

        $("#new_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#new_password input').attr("type") == "text") {
                $('#new_password input').attr('type', 'password');
                $('#new_password .eye-icon i').addClass("fa-eye-slash");
                $('#new_password .eye-icon i').removeClass("fa-eye");
            } else if ($('#new_password input').attr("type") == "password") {
                $('#new_password input').attr('type', 'text');
                $('#new_password .eye-icon i').removeClass("fa-eye-slash");
                $('#new_password .eye-icon i').addClass("fa-eye");
            }
        });

        $("#retype_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#retype_password input').attr("type") == "text") {
                $('#retype_password input').attr('type', 'password');
                $('#retype_password .eye-icon i').addClass("fa-eye-slash");
                $('#retype_password .eye-icon i').removeClass("fa-eye");
            } else if ($('#retype_password input').attr("type") == "password") {
                $('#retype_password input').attr('type', 'text');
                $('#retype_password .eye-icon i').removeClass("fa-eye-slash");
                $('#retype_password .eye-icon i').addClass("fa-eye");
            }
        });

    });
</script>
