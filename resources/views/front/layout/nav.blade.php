<div class="navbar-area" id="stickymenu">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('uploads/logo.png') }}" alt="" />
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav" >
        <div class="container ">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('uploads/logo.png') }}" alt="" />
                </a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Request::is('job-list') || Request::is('job/*') ? 'active' : '' }}" >
                        <a href="{{ route('job_list') }}" class="nav-link">
                            Việc Làm</a
                        >
                    </li>
                    <li class="nav-item {{ Request::is('company-list')  ? 'active' : '' }}" >
                        <a href="{{ route('company_list') }}" class="nav-link"
                            >Công Ty</a
                        >
                    </li>
                    <li class="nav-item {{ Request::is('blog')||Request::is('post/*') ? 'active' : '' }}">
                        <a href="{{ route('blog') }}" class="nav-link"
                            >Blog</a
                        >
                    </li>
                    <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                        <a href="{{ route('contact') }}" class="nav-link"
                            >Liên Hệ</a
                        >
                    </li>


                </ul>
                <div
                    class="collapse navbar-collapse mean-menu"
                    id="navbarSupportedContent"
                >
                <ul class="navbar-nav ml-auto">
                    
                    @if(Auth::guard('company')->check())
                        <li class="nav-item">
                            <a href="{{ route('company_edit_profile') }}" 
                                >
                                <i class="fas fa-user"></i> {{ Auth::guard('company')->user()->person_name }}
                                </a
                            >
                        </li>
                    @elseif(Auth::guard('candidate')->check())
                        <li class="menu">
                            <a href="{{ route('candidate_edit_profile') }} " 
                                >    
                                @if (Auth::guard('candidate')->user()->photo != '')
                                    <img style="border-radius: 50%;" alt="image" src="{{ asset('uploads/'.Auth::guard('candidate')->user()->photo) }}" class="rounded-circle-custom">
                                
                                @else
                                <img style="border-radius: 50%;" alt="image" src="{{ asset('uploads/noimg/no_image.jpg')}}" class="rounded-circle-custom"/>
                                    
                                @endif   
                                {{ Auth::guard('candidate')->user()->name }}        
                                </a >
                        </li>
                    @else
                        <li class="  menu">
                            <a href="# " class="nav-link" data-bs-toggle="modal" data-bs-target="#sign-in-popup" 
                            >Đăng Nhập</a
                        >
                        </li>
                        <li class="  menu">
                            <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#sign-in-popup" 
                                >Đăng Ký
                                </a
                            >
                        </li> 
                        <li class=" menu">
                            <a class="nav-link btn-employers" href="" class="nav-link"  data-bs-toggle="modal" data-bs-target="#form-signin">Nhà Tuyển Dụng</a>
                        </li>   
                    @endif

                </ul>
                    
                </div>
                
            </nav>
            
        </div>
    </div>
</div>
@include('front.layout.modal.form_login')
@include('front.layout.modal.form_signin')

<script>
    $(document).ready(function() {
        $("#openModalButton").click(function() {
            $.ajax({
                type: "GET",
                url: "{{ route('login_form') }}", // Route xử lý việc tải modal
                dataType: "html",
                success: function(data) {
                    // Tìm và thay thế nội dung modal bằng nội dung từ AJAX
                    $(".modal.in .modal-content").html(data);
                    $(".modal.in").show(); // Hiển thị modal
                }
            });
        });
    });
    </script>
