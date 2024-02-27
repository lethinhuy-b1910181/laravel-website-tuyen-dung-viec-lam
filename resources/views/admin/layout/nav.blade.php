<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right w-100-p justify-content-end">
        <li class="nav-link">
            <a href="{{ route('home') }}" target="_blank" class="btn btn-warning">website</a>
        </li>
        <li class="nav-item dropdown custom-dropdown">
            <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img alt="image" src="{{ asset('uploads/'.Auth::guard('admin')->user()->photo) }}" class="rounded-circle-custom">
                <div class="d-sm-none d-lg-inline-block">{{ Auth::guard('admin')->user()->name }}</div>
            </a>
            <ul class="dropdown-menu ">
                    
                    <li>
                        <a href="{{ route('admin_profile') }}" class="dropdown-item">
                            <i class="far fa-user me-2"></i> Cập Nhật Thông Tin
                        </a>
                    </li>
                <li><a href="{{ route('admin_logout') }}" class="dropdown-item"><i class="fas fa-sign-out-alt me-2"></i> Đăng xuất</a></li>
            </ul>

            
        </li>
    </ul>
</nav>