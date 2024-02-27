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
                    
                    <li class="list-group-item {{ Request::is('company/edit-profile') ? 'active' : '' }}">
                        <a href="{{ route('company_edit_profile') }}"
                            ><i class="fas fa-user mx-3"></i>Hồ sơ công ty</a
                        >
                    </li>
                    <li class="list-group-item {{ Request::is('company/create-job') ? 'active' : '' }}">
                        <a href="{{ route('company_job_create') }}"><i class="fa fa-briefcase  mx-3"></i>Đăng tin tuyển dụng</a>
                    </li>
                    <li class="list-group-item {{ Request::is('company/jobs') || Request::is('company/candidate-list/*') ? 'active' : '' }}">
                        <a href="{{ route('company_job') }}"><i class="fa fa-briefcase  mx-3"></i>Danh sách việc làm</a>
                    </li>
                    
                    <li class="list-group-item ">
                        <a href="{{ route('company_logout') }}"><i class="fas fa-sign-out-alt mx-3"></i>Đăng xuất</a>
                    </li>
                </ul>
                </div>
            </div>
        </div>