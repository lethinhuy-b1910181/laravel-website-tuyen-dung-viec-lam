
    <div class="modal fade text-left" id="sign-in-popup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <ul class="nav nav-tabs" id="auth-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="false">Đăng Nhập
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="true">Đăng Ký
                            </button>
                        </li>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
{{-- ======= Login Form --}}
                        <div class="tab-pane active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <center>
                                <h4 style="font-weight: 600; font-size:18px; padding-top:20px" >ĐĂNG NHẬP ỨNG VIÊN</h4>

                            </center>
                            <form action="{{ route('candidate_login_submit') }}" method="post">   
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
                                    {{-- <p class="or text-center mb-0 fz-12px">Hoặc đăng nhập bằng tài khoản mạng xã hội </p> --}}
                                </div>
                                {{-- <div class="d-flex justify-content-center flex-nowrap">
                                    <a id="login-with-facebook" class="btn btn-social btn-primary input-block-level mx-1 h-40 my-3 btn-login-social">
                                  
                                        <span class="ml-2">Facebook</span>
                                    </a>
                                    <a id="login-with-google" class="btn btn-social btn-default input-block-level mx-1 h-40 my-3 btn-login-social">
                                    
                                        <span class="ml-2">Google</span>
                                    </a>
                                    
                                </div> --}}
                                 {{-- <div class="d-flex justify-content-center option-auth">
                                    <div class="d-flex align-items-start gap-2 agreement-social">
                                        <div class="pdt-2" style="position: relative">
                                            <input id="agreement-social-login" name="agreement-social" type="checkbox" checked="">
                                            <label for="agreement-social-login"></label>
                                        </div>
                                        <p>
                                            <label for="agreement-social-login">
                                                Bằng việc đăng nhập bằng tài khoản mạng xã hội, tôi đã đọc và đồng ý với <a target="_blank" class="text-success" href="#">Điều
                                                khoản dịch vụ</a> và <a target="_blank" class="text-success" href="#">Chính
                                                sách
                                                bảo
                                                mật</a> của HiJob
                                            </label>
                                        </p>
                                    </div>
                                </div> --}}
                            </form>
                            {{-- <div class="mt-3 d-flex justify-content-between option-auth">
                                <div>
                                    <span>Bạn chưa có tài khoản?</span>
                                    <a class="text-success font-weight-bold" href="#" >
                                    Đăng ký ngay
                                    </a>
                                </div>
                                <a class="text-success font-weight-bold" href="#">
                                Quên mật khẩu
                                </a>
                            </div> --}}
                        </div>
{{-- ======= End Login Form --}}

                        <div class="tab-pane" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <center>
                                <h4 style="font-weight: 600; font-size:18px; padding-top:20px" >ĐĂNG KÝ ỨNG VIÊN</h4>

                            </center>
                            <form action="{{ route('candidate_signup_submit') }}" method="post">
                                @csrf
                                <div id="register-error" class="alert-danger d-none"></div>
                                <div class="form-group mb-3">
                                    <label  class="mb-1">Họ tên</label>
                                    <div class="input-group border-hover">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input type="text" name="name" class="form-control" placeholder="Nhập họ tên của bạn" aria-label="Nhập email của bạn" value="">
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
    