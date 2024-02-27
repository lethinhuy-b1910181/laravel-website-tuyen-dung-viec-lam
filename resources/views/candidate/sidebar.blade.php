<!-- Side bar -->
<div class="col-md-3 col-sm-12 col-12">


    <div class="block-sidebar" style="margin-bottom: 20px;">
        <header>
            <h3 class="title-sidebar font-roboto  ">
            Trung tâm quản lý
            </h3>
        </header>
       
        <div class="content-sidebar menu-trung-tam-ql menu-ql-employer">
          
          <ul class="list-group list-group-flush">
           
            <li class="list-group-item {{ Request::is('candidate/edit-profile') ? 'active' : '' }}">
                <a href="{{ route('candidate_edit_profile') }}"
                    ><i class="fas fa-user mx-3"></i>Hồ sơ & CV</a
                >
            </li>
            <li class="list-group-item {{ Request::is('candidate/my-job') ? 'active' : '' }}">
                <a href="{{ route('my_job') }}"><i class="fa fa-briefcase  mx-3"></i>Việc làm của tôi</a>
            </li>
            
            <li class="list-group-item {{ Request::is('candidate/change_password') ? 'active' : '' }}">
                <a href="{{ route('candidate_change_password') }}"
                    ><i class="fas fa-database mx-3"></i>Đổi mật khẩu</a
                >
            </li>
            <li class="list-group-item ">
                <a href="{{ route('candidate_logout') }}"><i class="fas fa-sign-out-alt mx-3"></i>Đăng xuất</a>
            </li>
        </ul>
        </div>
    </div>
</div>