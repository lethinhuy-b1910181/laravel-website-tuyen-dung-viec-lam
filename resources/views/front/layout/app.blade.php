<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <meta name="description" content="@yield('seo_meta_description')" />
        <title>@yield('seo_title')</title>

        <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}" />
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css"> --}}

        <!-- All CSS -->
        @include('front.layout.styles')
        <!-- All Javascripts -->
        @include('front.layout.scripts')


        <link
            href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
            rel="stylesheet"
        />
        
        <!-- Font Awesome -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> --}}
        
    </head>
    <body>
        {{-- <div class="top " >
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-side">
                        <ul>
                            <li class="phone-text">(+84) 111 222 333</li>
                            <li class="email-text">contact@hijob.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 right-side">
                        <ul class="right">

                            @if(Auth::guard('company')->check())
                                <li class="menu">
                                    <a href="{{ route('company_home') }}"
                                        >
                                        <i class="fas fa-user"></i> {{ Auth::guard('company')->user()->person_name }}
                                        </a
                                    >
                                </li>
                            @elseif(Auth::guard('candidate')->check())
                                <li class="menu">
                                    <a href="{{ route('candidate_home') }}"
                                        ><i class="fas fa-user"></i> {{ Auth::guard('candidate')->user()->name }}</a
                                    >
                                </li>
                            @else
                                <li class="menu">
                                    <a href="{{ route('login') }}"
                                        ><i class="fas fa-sign-in-alt"></i> Đăng nhập</a
                                    >
                                </li>
                                <li class="menu">
                                    <a href="{{ route('signup') }}"
                                        ><i class="fas fa-user"></i> Đăng kí</a
                                    >
                                </li>   
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
        @include('front.layout.nav')
        @yield('main_content')

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">For Candidates</h2>
                            <ul class="useful-links">
                                <li><a href="">Browser Jobs</a></li>
                                <li><a href="">Browse Candidates</a></li>
                                <li><a href="">Candidate Dashboard</a></li>
                                <li><a href="">Saved Jobs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">For Companies</h2>
                            <ul class="useful-links">
                                <li><a href="">Post Job</a></li>
                                <li><a href="">Browse Jobs</a></li>
                                <li><a href="">Company Dashboard</a></li>
                                <li><a href="">Applications</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">Liên hệ</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="right">
                                    .
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="right">contact@hijob.com</div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="right">(+84) 111 222 333</div>
                            </div>
                            <ul class="social">
                                <li>
                                    <a href=""
                                        ><i class="fab fa-facebook-f"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href=""
                                        ><i class="fab fa-twitter"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href=""
                                        ><i class="fab fa-pinterest-p"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href=""
                                        ><i class="fab fa-linkedin-in"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href=""
                                        ><i class="fab fa-instagram"></i
                                    ></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">Tin tức</h2>
                            <p>
                                Để nhận được tin tức mới nhất từ chúng tôi, vui lòng đăng ký tại đây:
                            </p>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        name=""
                                        class="form-control"
                                    />
                                </div>
                                <div class="form-group">
                                    <input
                                        type="submit"
                                        class="btn btn-primary"
                                        value="Đăng ký ngay"
                                    />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright">
                            Copyright LTNY, .
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="right">
                            <ul>
                                <li><a href="{{ route('terms') }}">Điều khoản chung</a></li>
                                <li><a href="{{ route('privacy') }}">Chính sách bảo mật</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>
        @include('front.layout.scripts_footer')

        @if($errors->any())
        @foreach($errors->all() as $error)
            <script>
                iziToast.error({
                    title: '',
                    position: 'bottomRight',
                    message: '{{ $error }}',
                });
            </script>
        @endforeach
    @endif

    @if(session()->get('error'))
        <script>
            iziToast.error({
                title: '',
                position: 'center',
                message: '{{ session()->get('error') }}',
            });
        </script>
    @endif

    @if(session()->get('success'))
        <script>
            iziToast.success({
                title: '',
                position: 'bottomRight',
                message: '{{ session()->get('success') }}',
            });
        </script>
    @endif
    </body>
</html>
