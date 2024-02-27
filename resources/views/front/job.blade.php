@extends('front.layout.app')

@section('main_content')

<div class="slider slider-job" style="background: url({{ asset('uploads/'.$home_page_data->background) }})  ">
    <div class="bg" ></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="search-wrapper" >
                    
                    
                    <div class="tab-content search-tab-content" id="myTabContent">
                        <!-- content tab 1 -->
                        <div class="tab-pane stab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form action="{{ url('job-list') }}" method="get">
                            <div class="row">
                            <div class="col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="input-group s-input-group">
                                        <input type="text" name="title" class="form-control sinput" placeholder="Nhập vị trí ứng tuyển">
                                        <span><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="category" id="computer-languages" data-select2-id="computer-languages" tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                                            <option value="" selected="" hidden="" data-select2-id="2">Tất cả ngành nghề</option>
                                            @foreach ($job_categories as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        
                                        <div class="dfa-icon">
                                            <i class="fa fa-briefcase sfa" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="location" id="s-provinces" data-select2-id="s-provinces" tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                                            <option value="" selected="" hidden="" data-select2-id="13">Tất cả địa điểm</option>
                                            @foreach ($job_locations as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="dfa-icon">
                                            <i class="fa fa-map-marker dfa" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12" style="z-index: 0;">
                                <button type="submit" class="btn btn-primary btn-search col-sm-12" >Tìm kiếm</button>
                            </div>
                            </div>
                        </form>  
                        </div>
                        <!-- (end) content tab 1 -->
                        
                    </div>
            
                </div>
            </div>
        </div>
    </div>
</div>

<div class="job-content">
    <!-- job detail header -->
    <div class="container-fluid job-detail-wrap">
        <div class="container job-detail">
            <div class="ctn-breadcrumb-detail">
                <a href="{{ route('home') }}" class="text-highlight bold">Trang chủ</a> <i class="fa fa-angle-right"></i>
                 <span class="text-dark-blue">{{ $job->title }}</span>
                </div>
            <div class=" job-detail">
                <div class="job-detail-header">
                    <div class="row">
                        <div class="col-md-2 col-sm-12 col-12">
                            <div class="job-detail-header-logo">
                              <a href="{{ route('company', $job->rCompany->id) }}">
                                <img src="{{ asset('uploads/'.$job->rCompany->logo) }}" alt="" />
                              </a>
                            </div>
                          </div>
                        <div class="col-md-7 col-sm-7 col-7">
                            <div class="job-detail-header-desc">
                                <div class="job-detail-header-title">
                                    <a href="#">{{ $job->title }}</a>
                                </div>
                                <div class="job-detail-header-company">
                                    <a href="{{ route('company', $job->rCompany->id) }}">{{ $job->rCompany->company_name }}</a>
                                </div>
                                <div class="job-detail-header-address">
                                    {{ $job->rCompany->address }}
                                </div>
                                <div class="job-detail-header-de">
                                    <p><i class="fa fa-money  size-1rem green-color pr-2"></i><span class="pr-2"></span>{{ $job->rJobSalary->name }}</p>
                                    <p class="pl-2"><i class="fas fa-map-marker-alt size-1rem green-color pr-2"></i><span class="pr-2"> </span>{{ $job->rJobLocation->name }}</p>
                                    <p class="pl-2"><i class="fa fa-briefcase size-1rem green-color pr-2"></i><span class="pr-2"></span>{{ $job->rJobExperience->name }} kinh nghiệm</p>
                                    
                                </div>
                                <div class="job-detail__info--deadline">
                                    <span class="job-detail__info--deadline--icon">
                                    <i class="fa fa-clock"></i>
                                    </span>
                                    @php
                                        $deadline = new DateTime($job->deadline)
                                    @endphp
                                    Hạn nộp hồ sơ: {{ $deadline->format('d-m-Y') }}
                                    </div>
                                
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-12">
                            <div class="jd-header-wrap-right">
                              <div class="jd-center">
                                <div class="jd-center-apply col-md-12 col-sm-12 col-12">
                                    @if(Auth::guard('candidate')->check())
                                        @php

                                            $apply = App\Models\CandidateApplication::where('candidate_id', Auth::guard('candidate')->user()->id)->where('job_id', $job->id)->count();
                                       
                                        @endphp

                                        @if ($apply>0)
                                        <a class="btn-apply" style="border-radius: 5px;background: green;width: 150px;">
                                            
                                            Đã ứng tuyển
                                        </a>
                                        @else
                                            <a href="#" class="btn btn-apply"  data-bs-toggle="modal" data-bs-target="#apply-job-model_{{ $job->id }}">
                                                <i class="fa fa-paper-plane me-3"></i>
                                                Ứng tuyển ngay
                                            </a>
                                        @endif
                                        
                                    @else
                                    <a href="#" class="btn btn-apply"  data-bs-toggle="modal" data-bs-target="#sign-in-popup">
                                        <i class="fa fa-paper-plane me-3"></i>
                                        Ứng tuyển ngay
                                    </a>
                                    @endif
                                    
                                </div>
                                <div class="jd-center-save col-md-12 col-sm-12 col-12">
                                    @if(Auth::guard('candidate')->check())
                                        @php
                                            $toggle = '';
                                            $target = '';
                                            $count = App\Models\CandidateBookmark::where('candidate_id', Auth::guard('candidate')->user()->id)->where('job_id', $job->id)->count();
                                            if($count > 0){
                                                $save = 'fa fa-heart';
                                                $text = 'Đã lưu';
                                            }
                                            else {
                                                $save = 'fa fa-heart-o';
                                                $text = 'Lưu tin';
                                            }
                                        @endphp
                                    @else
                                        @php
                                            $save = 'fa fa-heart-o';
                                            $text = 'Lưu tin';
                                            $toggle = 'modal';
                                            $target = '#sign-in-popup';
                                        @endphp
                                    @endif

                                <button class="box-save-job-hover bookmark-button-text" data-bs-toggle="{{ $toggle }}" data-bs-target="{{ $target }}"  data-productid="{{ $job->id }}" data-productid="{{ $item->id }}" data-save="{{ $save }}">
                                    <i class="{{ $save }} pr-2"></i><span class="bookmark-text">{{ $text }}</span>
                                </button>
                                    
                                </div>
                              </div>
                            </div>
                          </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- (end) job detail header -->

    <!-- Phần thân -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <!-- Main wrapper -->
                <div class="col-md-8 col-sm-12 col-12 clear-left">
                    <div class="main-wrapper">
                        <div class="recruitment-inner recruitment-info recruitment-info-content">
                            <div class="row row-10">
                                <div class="col-md-6 mb-1">
                                    <span><i class="pr-2 green-color fas fa-user-tie"></i></span>
                                    <span class="fw-600 pr-2">Chức vụ:</span>{{ $job->rJobNature->name }}
                                </div>
                                <div class="col-md-6 mb-1">
                                    <span><i class="pr-2 green-color fas fa-address-card"></i></span>
                                    <span class="fw-600 pr-2">Yêu cầu bằng cấp:</span>{{ $job->rJobLevel->name }}
                                </div>
                                <div class="col-md-6 mb-1">
                                    <span><i class="pr-2 green-color fas fa-venus-mars"></i></span>
                                    <span class="fw-600 pr-2">Yêu cầu giới tính:</span>{{ $job->rJobGender->name }}
                                </div><div class="col-md-6 mb-1">
                                    <span><i class="pr-2 green-color fas fa-users"></i></span>
                                    <span class="fw-600 pr-2">Số lượng cần tuyển:</span>{{ $job->vacancy }}
                                </div>
                                <div class="col-md-6 mb-1">
                                    <span><i class="pr-2 green-color fa fa-credit-card"></i></span>
                                    <span class="fw-600 pr-2">Hình thức làm việc:</span>{{ $job->rJobType->name }}
                                </div>
                                <div class="col-md-6 mb-1">
                                    <span><i class="pr-2 green-color fas fa-list-ul"></i></span>
                                    <span class="fw-600 pr-1">Ngành nghề:</span>
                                    <a href="#" class="pr-2"> {{ $job->rJobCategory->name }}</a> 
                                </div>
                            </div>
                        </div>
                        <hr>
                        @if($job->description != '')
                            <div class="job-detail__information-detail" id="box-job-information-detail">
                                <h2 class="job-detail__information-detail--title">
                                    Mô tả công việc
                                </h2>
                                <div class="job-detail__information-detail--content">
                                    <div class="job-description">
                                        {!! $job->description !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($job->skill != '')
                            <div class="job-detail__information-detail" id="box-job-information-detail">
                                <h2 class="job-detail__information-detail--title">
                                    Yêu cầu công việc
                                </h2>
                                <div class="job-detail__information-detail--content">
                                    <div class="job-description">
                                        {!! $job->skill !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($job->benefit != '')
                            <div class="job-detail__information-detail" id="box-job-information-detail">
                                <h2 class="job-detail__information-detail--title">
                                    Phúc lợi
                                </h2>
                                <div class="job-detail__information-detail--content">
                                    <div class="job-description">
                                        {!! $job->benefit !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($job->attachments != '')
                            <div class="job-detail__information-detail" id="box-job-information-detail">
                                <h2 class="job-detail__information-detail--title">
                                    Thành phần hồ sơ
                                </h2>
                                <div class="job-detail__information-detail--content">
                                    <div class="job-description">
                                        {!! $job->attachments !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($job->attachments != '')
                            <div class="job-detail__information-detail" id="box-job-information-detail">
                                <h2 class="job-detail__information-detail--title">
                                    Thông tin liên hệ
                                </h2>
                                <div class="job-detail__information-detail--content">
                                    <div class="job-description">
                                        {!! $job->attachments !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- content -->
                    </div>
                        <!-- content Viec lam cung cong ty -->
                    @if($job_company->count())
                        <div class="col-md-12 ">
                            <div class="job">
                                <div class="container">
                                    <div class="row row-10">
                                        <div class="search-inner bg-white border" >
                                            <div class="py-2 px-3 border-bottom page-search-sort">
                                                <div class="col-md-12">  
                                                    <h6><i class="fa fa-briefcase "></i> Việc làm cùng công ty</h6>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div class="job-list-default">
                                                    @foreach ($job_company as $item)
                                                    <div class="job-item-default bg-highlight">
                                                        <div class="avatar">
                                                            <a href="{{ route('company', $item->rCompany->id) }}" target="_blank">
                                                                <img src="{{ asset('uploads/'.$item->rCompany->logo) }}"  alt="">
                                                            </a>
                                                        </div>
                                                        <div class="body">
                                                            <div class="body-content">
                                                                <div class="title-block">
                                                                    <div>
                                                                        <h3 class="title">
                                                                            <div class="box-label-top">
                                                                                " "
                                                                            </div>
                                                                            <a href="{{ route('job', $item->id) }}" target="_blank">
                                                                                <span>{{ $item->title }}</span>
                                                                            </a>
                                                                        </h3>
                                                                        <a href="" class="company">{{ $item->rCompany->company_name }}</a>
                                                                        
                                                                    </div>
                                                                    <div class="box-right">
                                                                        <label class="title-salary">
                                                                            <i class="fa fa-money  green-color "></i>{{ $item->rJobSalary->name }}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="info">
                                                                <div class="label-content">
                                                                    <label class="address"><i class="fas fa-map-marker-alt green-color pr-2"></i>{{ $item->rJobLocation->name }}</label>
        
                                                                    <label class="time"><i class="fa fa-calendar green-color pr-2"></i>
                                                                        
                                                                        Còn <b>
                                                                                @php
                                                                                    $date = new DateTime(); // Ngày hiện tại
                                                                                    $date_t = new DateTime($item->deadline); // Ngày từ biến $item->deadline
                                                                                    $date_t->add(new DateInterval('P1D'));
                                                                                    $interval = $date->diff($date_t); // Tính khoảng cách thời gian giữa $date và $date_t
                                                                                    
                                                                                    echo $interval->days; // In ra khoảng cách thời gian
        
                                                                                @endphp
                                                                            </b>
                                                                         để ứng tuyển
                                                                    </label>
                                                                    <label class="address">
                                                                         @php
                                                                        Carbon\Carbon::setLocale('vi');
                                                                        @endphp
                                                                        <i class="fa fa-clock green-color pr-2"></i>Cập nhật {{ $item->created_at->diffForHumans() }}
                                                                    </label>
                                                                </div>
                                                                <div class="icon">
                                                                    @if(Auth::guard('candidate')->check())
                                                                        @php

                                                                            $apply = App\Models\CandidateApplication::where('candidate_id', Auth::guard('candidate')->user()->id)->where('job_id', $item->id)->count();
                                                                    
                                                                        @endphp
                                
                                                                        @if ($apply>0)
                                                                        <button class="btn btn-apply-now " style="border-radius: 5px;background: green; width:120px; font-size:14px">
                                                                        
                                                                            Đã ứng tuyển
                                                                        </button>
                                                                        
                                                                        @endif
                                                            
                                                                    @endif
                                                                        
                                                                            
                                                                      
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                       
                                                    @endforeach
                                                
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                        <!-- end content Viec lam cung cong ty -->
                    
                </div>
                <!-- Sidebar -->
                <div class="col-md-4 col-sm-12 col-12 clear-right">
                    <div class="side-bar mb-3">
                        <div class="job-detail__box--right job-detail__company">
                            <div class="job-detail__company--information">
                                <div class="job-detail__company--information-item company-name">
                                    <a class="company-logo" href="{{ route('company', $job->rCompany->id) }}" target="_blank" >
                                        <img src="{{ asset('uploads/'.$job->rCompany->logo) }}" alt="" class="img-responsive">
                                    </a>
                                    <h2 class="">
                                        <a class="name" href="{{ route('company', $job->rCompany->id) }}" target="_blank" >{{ $job->rCompany->company_name }}</a>
                                        <div class="company-subdetail-label">
                                        </div>
                                    </h2>
                                </div>
                            <div class="job-detail__company--information-item company-scale">
                                <div class="company-title">
                                    <i class="pr-2 grey-color fas fa-users"></i>
                                    Quy mô:
                                </div>
                                <div class="company-value">{{ $job->rCompany->rCompanySize->name }}</div>
                            </div>
                            <div class="job-detail__company--information-item company-scale">
                                <div class="company-title">
                                    <i class="fas fa-map-marker-alt grey-color pr-2"></i>
                                    Địa điểm:
                                </div>
                                <div class="company-value" >
                                {{ $job->rCompany->address }}
                                </div>
                            </div>
                            </div>
                            <div class="job-detail__company--link">
                                <a href="{{ route('company', $job->rCompany->id) }}" target="_blank">Xem trang công ty <i class="fa fa-external-link"></i></a>
                                
                            </div>
                        </div>
                    </div>
                    @if($jobs->count())
                        <div class="side-bar mb-3">
                            <h2 class="text">
                                Việc làm liên quan
                            </h2>
                            <hr style="color: #00b14f; font-size: 20px">

                            <div class="job-best-salary-inner">
                                
                                @foreach ($jobs as $item)
                                
                                    <div class="job-over-item ">
                                        <div class="cvo-flex">
                                            <div class="col-title cvo-glex-grow">
                                                <h3>
                                                    <a href="{{ route('job', $item->id) }}" target="_blank" class="title quickview-job text_ellipsis">

                                                        <strong class="job_title">
                                                            {{ $item->title }}
                                                        </strong>
                                                    </a>
                                                </h3>
                                                <a href="{{ route('company', $item->rCompany->id) }}" target="_blank" class="text-silver company  company_name">
                                                    {{ $item->rCompany->company_name }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <div class="col-job-info">
                                                <div class="salary">
                                                    <i class="fa fa-money green-color pr-2"></i><span class="text_ellipsis">{{ $item->rJobSalary->name }}</span>
                                                </div>
                                                <div class="address">
                                                    <i class="fas fa-map-marker-alt green-color pr-2"></i> <span class="text_ellipsis">{{ $item->rJobLocation->name }}</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    
                                    </div>
                                
                                @endforeach
                                   
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
  <!-- (end) Phần thân -->
    
</div>



@if(Auth::guard('candidate')->check())

    <div class="modal fade text-left " id="apply-job-model_{{ $job->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg apply-job-model" role="document">
            {{-- <div class="form-group">
                    <div class="jFiler jFiler-theme-dragdropbox" >
                        <input type="file" value="" name="file" id="filer_input" style="display: none; position: absolute; left: -9999px; top: -9999px; z-index: -9999;" accept="doc, docx, pdf">
                        <div class="jFiler-input-dragDrop" >
                            <div class="jFiler-input-inner" style="justify-content: center;">
                                <label style="cursor: pointer;" for="filer_input">
                                <a class="btn btn-upload-file">
                                    <i class="fa fa-upload"></i>
                                    Chọn file
                                </a>
                            </label>
                            </div>
                        </div>
                        
                        <div id="file-display" style="display: none;">
                            <div style="display: flex;
                            justify-content: center;">
                                <div id="file-name" style="color: #00b14f;
                                display: -webkit-box;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 600;
                                overflow: hidden;
                                text-align: initial;
                                text-overflow: ellipsis;
                                padding: 5px;
                                padding-right: 20px;
                                ">
                                </div>
                                <a  style="align-items: center;
                                background: #fff1f0;
                                border: none;
                                border-radius: 4px;
                                color: #d83324;
                                display: flex;
                                gap: 8px;
                                height: 32px;
                                justify-content: center;
                                padding: 0 8px;">
                                <i id="delete-icon" class="fa fa-trash-o" style="color: red; font-size: 16px; cursor:pointer"></i>

                                </a>
                            </div>
                            
                        </div>

                        
                    </div>

                </div> --}}

            <form action="{{ route('candidate_apply_job', $job->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title bold">Ứng tuyển <span class="text-highlight">{{ $job->title }}</span></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="new-apply" style="
                        padding: 10px 20px 20px 20px;
                    ">
                            <div id="frm-upload" style="">
                                    <div class="row form-group">
                                        <strong class="default-text input-label" 
                                        style="    align-items: center;
                                        display: flex;
                                        justify-content: center;">Tải lên CV từ máy tính</strong><br>
                                        <span style="    align-items: center;
                                        display: flex;
                                        justify-content: center;"
                                        class="default-text text-gray fs-12">File doc, docx, pdf. Tối đa 5MB.</span>
                                    </div>
                                    
                                    {{-- <div class="form-group">
                                        <div class="jFiler jFiler-theme-dragdropbox">
                                            <!-- Hiển thị thông tin file hoặc nút chọn file -->
                                            <div id="file-display" style="display: none;">
                                                <div style="display: flex; justify-content: center;">
                                                    <div id="file-name" style="color: #00b14f; font-size: 14px; font-style: normal; font-weight: 600; overflow: hidden; text-align: initial; text-overflow: ellipsis; padding: 5px; padding-right: 20px;">
                                                        <!-- Hiển thị dữ liệu từ cv_url nếu có -->
                                                        @if(isset(Auth::guard('candidate')->user()->cv_url))
                                                          {{ Auth::guard('candidate')->user()->cv_url }}
                                                        @endif
                                                    </div>
                                                    <a id="delete-icon" style="align-items: center; background: #fff1f0; border: none; border-radius: 4px; color: #d83324; display: flex; gap: 8px; height: 32px; justify-content: center; padding: 0 8px; cursor: pointer;">
                                                        <i class="fa fa-trash-o" style="color: red; font-size: 16px;"></i>
                                                    </a>
                                                </div>
                                            </div>
                                    
                                            <!-- Nút chọn file -->
                                            <label id="file-upload-label" style="cursor: pointer; display: none;" for="filer_input">
                                                <a class="btn btn-upload-file">
                                                    <i class="fa fa-upload"></i>
                                                    Chọn file
                                                </a>
                                            </label>
                                            <input type="file" name="file" id="filer_input" style="display: none; position: absolute; left: -9999px; top: -9999px; z-index: -9999;" accept="doc, docx, pdf">
                                            
                                            <script>
                                                $(document).ready(function() {
                                                    // Kiểm tra nếu cv_url tồn tại thì hiển thị
                                                    @if(isset(Auth::guard('candidate')->user()->cv_url))
                                                        $('#file-name').html('{{ Auth::guard('candidate')->user()->cv_url }}'); 
                                                        $('#file-display').show(); 
                                                        $('#file-upload-label').hide(); 
                                                    @else
                                                        // Nếu cv_url không tồn tại, hiển thị nút chọn file
                                                        $('#file-upload-label').show(); 
                                                    @endif
                                    
                                                    // Sự kiện khi thay đổi giá trị của input file
                                                    $('#filer_input').change(function() {
                                                        var fileName = $(this).val().split('\\').pop(); 
                                                        $('#file-name').text(fileName); 
                                                        $('#file-display').show(); 
                                                        $('#file-upload-label').hide(); 
                                                    });
                                    
                                                    // Xử lý sự kiện xóa tệp
                                                    $('#delete-icon').click(function() {
                                                        $('#filer_input').val(''); 
                                                        $('#file-name').text(''); 
                                                        $('#file-display').hide(); 
                                                        $('#file-upload-label').show(); 
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div> --}}

                                    <div class="form-group">
                                        <div class="jFiler jFiler-theme-dragdropbox " style="
                                        justify-content: center;
                                        display: flex;">
                                            <!-- Hiển thị thông tin file hoặc nút chọn file -->
                                            <div id="file-display" style="display: none;">
                                                <div style="display: flex; justify-content: center;">
                                                    <div id="file-name" style="color: #00b14f; font-size: 14px; font-style: normal; font-weight: 600; overflow: hidden; text-align: initial; text-overflow: ellipsis; padding: 5px; padding-right: 20px;">
                                                        <!-- Hiển thị dữ liệu từ cv_url nếu có -->
                                                        @if(isset(Auth::guard('candidate')->user()->cv_url))
                                                            {{ Auth::guard('candidate')->user()->cv_url }}
                                                            <!-- Thêm trường ẩn để giữ giá trị cv_url -->
                                                            {{-- <input type="hidden" name="file" value="{{ Auth::guard('candidate')->user()->cv_url }}"> --}}
                                                        @endif
                                                    </div>
                                                    <a id="delete-icon" style="align-items: center; background: #fff1f0; border: none; border-radius: 4px; color: #d83324; display: flex; gap: 8px; height: 32px; justify-content: center; padding: 0 8px; cursor: pointer;">
                                                        <i class="fa fa-trash-o" style="color: red; font-size: 16px;"></i>
                                                    </a>
                                                </div>
                                            </div>
                                    
                                            <!-- Nút chọn file -->
                                            <label id="file-upload-label" style="display: none ;cursor: pointer; " for="filer_input">
                                                <a class="btn btn-upload-file">
                                                    <i class="fa fa-upload"></i>
                                                    Chọn file
                                                </a>
                                            </label>
                                            <input type="file" name="file" id="filer_input" value="{{ Auth::guard('candidate')->user()->cv_url }}" style="display: none; position: absolute; left: -9999px; top: -9999px; z-index: -9999;" accept="doc, docx, pdf">
                                    
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-title">Họ và tên<span class="danger">&nbsp;*</span></label>
                                        <input type="text" name="name" value="{{ Auth::guard('candidate')->user()->name }}" placeholder="Họ tên hiển thị với Nhà tuyển dụng" name="fullname" class="form-control input-sm" style="font-size: 12px">
                                        <p class="text-small text-danger italic" id="fullnameErrorMessage" style="margin-top: 5px; display: none"></p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-title">Email<span class="danger">&nbsp;*</span></label>
                                                <input type="text" name="email" value="{{ Auth::guard('candidate')->user()->email }}" placeholder="Email hiển thị với Nhà tuyển dụng" name="email" class="form-control input-sm" style="font-size: 12px">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-title">Số điện thoại<span class="danger">&nbsp;*</span></label>
                                                <input name="phone" type="text" value="{{ Auth::guard('candidate')->user()->phone }}" placeholder="Số điện thoại hiển thị với Nhà tuyển dụng" name="phone" class="form-control input-sm" style="font-size: 12px">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-title letter">Thư giới thiệu: </label>
                                        <textarea name="letter" rows="7" class="form-control" id="" placeholder="Viết giới thiệu ngắn gọn về bản thân (điểm mạnh, điểm yếu) vè nêu rõ mong muốn, lý do làm việc tại công ty này. Đây là cách gây ấn tượng với nhà tuyển dụng nếu bạn chưa có kinh nghiệm làm việc (hoặc CV không tốt)" rows="3">{{ Auth::guard('candidate')->user()->cover_letter }}</textarea>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-topcv-primary btn-theme" id="btn-apply">Nộp CV</button>
                        <button type="button" class="btn btn-default btn-theme close-modal" data-bs-dismiss="modal">Hủy</button>
                    </div>
                
                </div>
            </form>
        </div>
    </div>    
@endif
{{-- <script>
    $(document).ready(function() {
        // Kiểm tra nếu cv_url tồn tại thì hiển thị
        @if(isset(Auth::guard('candidate')->user()->cv_url))
            $('#file-name').html('<a href="{{ Auth::guard('candidate')->user()->cv_url}}" target="_blank">{{ Auth::guard('candidate')->user()->cv_url }}</a>'); 
            $('#file-display').show(); 
            $('.jFiler-input-dragDrop').hide(); 
        @endif

        // Sự kiện khi thay đổi giá trị của input file
        $('#filer_input').change(function() {
            var fileName = $(this).val().split('\\').pop(); 
            $('#file-name').text(fileName); 
            $('#file-display').show(); 
            $('.jFiler-input-dragDrop').hide(); 
        });

        // Xử lý sự kiện xóa tệp
        $('#delete-icon').click(function() {
            $('#filer_input').val(''); 
            $('#file-name').text(''); 
            $('#file-display').hide(); 
            $('.jFiler-input-dragDrop').show(); 
        });
    });
</script> --}}

 <script>
            $(document).ready(function() {
                // Kiểm tra nếu cv_url tồn tại thì hiển thị
                @if(isset(Auth::guard('candidate')->user()->cv_url))
                    $('#file-name').html('{{ Auth::guard('candidate')->user()->cv_url }}');
                    $('#file-display').show();
                    $('#file-upload-label').hide(); 
                @else
                    // Nếu cv_url không tồn tại, hiển thị nút chọn file
                    $('#file-upload-label').show(); 
                @endif

                // Sự kiện khi thay đổi giá trị của input file
                $('#filer_input').change(function() {
                    var fileName = $(this).val().split('\\').pop();
                    $('#file-name').text(fileName);
                    $('#file-display').show();
                    $('#file-upload-label').hide();
                });

                // Xử lý sự kiện xóa tệp
                $('#delete-icon').click(function() {
                    $('#filer_input').val('');
                    $('#file-name').text('');
                    $('#file-display').hide();
                    $('#file-upload-label').show();
                });
            });
        </script>
@endsection