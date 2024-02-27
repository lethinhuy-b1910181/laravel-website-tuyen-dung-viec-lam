<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Quản trị viên</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>
 
        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Dashboard"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>
            <li class="nav-item dropdown {{ Request::is('admin/company') || Request::is('admin/candidate')  ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" ><i class="fas fa-hand-point-right"></i><span>Quản lý tài khoản</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/company') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_company') }}"><i class="fas fa-angle-right"></i>Tài khoản tuyển dụng</a></li>
                    <li class="{{ Request::is('admin/candidate') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_candidate') }}"><i class="fas fa-angle-right"></i>Tài khoản ứng viên</a></li>
                    
                </ul>
            </li>
            <li class="{{ Request::is('admin/job-manager') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_manager') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Why Choose Items"><i class="fas fa-hand-point-right"></i> <span>Quản lý bài tuyển dụng</span></a></li>
            <li class="nav-item dropdown {{ Request::is('admin/job-category/*') || Request::is('admin/job-location/*') || Request::is('admin/job-type/*') || Request::is('admin/job-experience/*') || Request::is('admin/job-gender/*') || Request::is('admin/job-salary/*')|| Request::is('admin/job-nature/*')|| Request::is('admin/job-level/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" ><i class="fas fa-hand-point-right"></i><span>Danh Mục Việc Làm</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/job-category/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_category') }}"><i class="fas fa-angle-right"></i>Ngành nghề</a></li>
                    <li class="{{ Request::is('admin/job-location/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_location') }}"><i class="fas fa-angle-right"></i>Đại điểm</a></li>
                    <li class="{{ Request::is('admin/job-type/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_type') }}"><i class="fas fa-angle-right"></i>Hình thức công việc</a></li>
                    <li class="{{ Request::is('admin/job-nature/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_nature') }}"><i class="fas fa-angle-right"></i>Cấp bậc</a></li>
                    <li class="{{ Request::is('admin/job-level/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_level') }}"><i class="fas fa-angle-right"></i>Trình độ</a></li>
                    <li class="{{ Request::is('admin/job-experience/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_experience') }}"><i class="fas fa-angle-right"></i>Kinh nghiệm</a></li>
                    <li class="{{ Request::is('admin/job-salary/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_salary') }}"><i class="fas fa-angle-right"></i>Mức lương</a></li>
                    <li class="{{ Request::is('admin/job-gender/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_gender') }}"><i class="fas fa-angle-right"></i>Giới tính</a></li>
                    
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/company-location/*') || Request::is('admin/company-industry/*') || Request::is('admin/company-size/*')  ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" ><i class="fas fa-hand-point-right"></i><span>Danh Mục Công Ty</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/company-location/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_company_location') }}"><i class="fas fa-angle-right"></i>Địa điểm</a></li>
                    <li class="{{ Request::is('admin/company-industry/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_company_industry') }}"><i class="fas fa-angle-right"></i>Lĩnh vực</a></li>
                    <li class="{{ Request::is('admin/company-size/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_company_size') }}"><i class="fas fa-angle-right"></i>Qui mô</a></li>
                </ul>
            </li>

            {{-- <li class="{{ Request::is('admin/why-choose/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_why_choose_item') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Why Choose Items"><i class="fas fa-hand-point-right"></i> <span>Why Choose Items</span></a></li> --}}
            <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_post') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Posts"><i class="fas fa-hand-point-right"></i> <span>Danh Mục Bài Viết</span></a></li>
            {{-- <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="FAQs"><i class="fas fa-hand-point-right"></i> <span>Danh Mục Câu Hỏi</span></a></li>
            <li class="{{ Request::is('admin/package/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_package') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Package"><i class="fas fa-hand-point-right"></i> <span>Danh Mục Bảng Giá</span></a></li> --}}

            <li class="nav-item dropdown {{ Request::is('admin/home-page')|| Request::is('admin/faq-page') ||Request::is('admin/blog-page')||Request::is('admin/term-page')||Request::is('admin/privacy-page')||Request::is('admin/contact-page')||Request::is('admin/pricing-page')||Request::is('admin/other-page') ? 'active' : ''}}" >
                <a href="#" class="nav-link has-dropdown" ><i class="fas fa-hand-point-right"></i><span>Cài đặt giao diện</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/home-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_page') }}"><i class="fas fa-angle-right"></i> Trang chủ</a></li>
                    {{-- <li class="{{ Request::is('admin/faq-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq_page') }}"><i class="fas fa-angle-right"></i> FAQ</a></li> --}}
                    <li class="{{ Request::is('admin/blog-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_blog_page') }}"><i class="fas fa-angle-right"></i> Trang bài viết</a></li>
                    <li class="{{ Request::is('admin/term-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_term_page') }}"><i class="fas fa-angle-right"></i> Trang điều khoản sử dụng</a></li>
                    <li class="{{ Request::is('admin/privacy-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_privacy_page') }}"><i class="fas fa-angle-right"></i> Trang chính sách bảo mật</a></li>
                    <li class="{{ Request::is('admin/contact-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_contact_page') }}"><i class="fas fa-angle-right"></i> Trang liên hệ</a></li>
                    {{-- <li class="{{ Request::is('admin/pricing-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_pricing_page') }}"><i class="fas fa-angle-right"></i> Trang bảng giá</a></li> --}}
                    <li class="{{ Request::is('admin/other-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_other_page') }}"><i class="fas fa-angle-right"></i> Khác</a></li>

                </ul>
            </li>
        </ul>   
    </aside>
</div>