{{-- @extends('front.layout.app')

@section('main_content') --}}

@foreach ($featured_jobs as $item)
<div class="modal fade text-left " id="detail_job_{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container-fluid job-detail-wrap">
                        <div class=" job-detail">
                            <div class="job-detail-header">
                                <div class="row">
                                    <div class="col-md-2 col-sm-12 col-12">
                                        <div class="job-detail-header-logo">
                                        <a href="#">
                                            <img src="{{ asset('uploads/noimg/no_image.jpg') }}" alt="" />
                                        </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-7 col-7">
                                        <div class="job-detail-header-desc">
                                            <div class="job-detail-header-title">
                                                <a href="#"></a>
                                            </div>
                                            <div class="job-detail-header-company">
                                                <a href="#">company name</a>
                                            </div>
                                            <div class="job-detail-header-address">
                                                company address
                                            </div>
                                            <div class="job-detail-header-de">
                                                <p><i class="fa fa-money  size-1rem green-color pr-2"></i><span class="pr-2"></span>salary</p>
                                                <p class="pl-2"><i class="fas fa-map-marker-alt size-1rem green-color pr-2"></i><span class="pr-2"> </span>location</p>
                                                <p class="pl-2"><i class="fa fa-briefcase size-1rem green-color pr-2"></i><span class="pr-2"></span> kinh nghiệm</p>
                                                
                                            </div>
                                            <div class="job-detail__info--deadline">
                                                <span class="job-detail__info--deadline--icon">
                                                <i class="fa fa-clock"></i>
                                                </span>
                                                deadline
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-12">
                                        <div class="jd-header-wrap-right">
                                        <div class="jd-center">
                                            <div class="jd-center-apply col-md-12 col-sm-12 col-12">
                                                <a href="#" class="btn btn-apply"><i class="fa fa-paper-plane me-3"></i>Ứng tuyển ngay</a>
                                            </div>
                                            <div class="jd-center-save col-md-12 col-sm-12 col-12">
                                            {{-- @if(Auth::guard('candidate')->check())
                                                @php
                                                    $toggle = '';
                                                    $target = '';
                                                    $count = App\Models\CandidateBookmark::where('candidate_id', Auth::guard('candidate')->user()->id)->where('job_id', $item->id)->count();
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
                                            @endif --}}
            
                                            <button class="box-save-job-hover bookmark-button-text" data-bs-toggle="" data-bs-target=""  data-productid="" data-productid="" data-save="">
                                                <i class="fa fa-heart-o pr-2"></i><span class="bookmark-text">Lưu tin</span>
                                            </button>
                                                
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                   
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                                                <span class="fw-600 pr-2">Chức vụ:</span>
                                            </div>
                                            <div class="col-md-6 mb-1">
                                                <span><i class="pr-2 green-color fas fa-address-card"></i></span>
                                                <span class="fw-600 pr-2">Yêu cầu bằng cấp:</span>
                                            </div>
                                            <div class="col-md-6 mb-1">
                                                <span><i class="pr-2 green-color fas fa-venus-mars"></i></span>
                                                <span class="fw-600 pr-2">Yêu cầu giới tính:</span>
                                            </div><div class="col-md-6 mb-1">
                                                <span><i class="pr-2 green-color fas fa-users"></i></span>
                                                <span class="fw-600 pr-2">Số lượng cần tuyển:</span>
                                            </div>
                                            <div class="col-md-6 mb-1">
                                                <span><i class="pr-2 green-color fa fa-credit-card"></i></span>
                                                <span class="fw-600 pr-2">Hình thức làm việc:</span>
                                            </div>
                                            <div class="col-md-6 mb-1">
                                                <span><i class="pr-2 green-color fas fa-list-ul"></i></span>
                                                <span class="fw-600 pr-1">Ngành nghề:</span>
                                                <a href="#" class="pr-2"> </a> 
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                        <div class="job-detail__information-detail" id="box-job-information-detail">
                                            <h2 class="job-detail__information-detail--title">
                                                Mô tả công việc
                                            </h2>
                                            <div class="job-detail__information-detail--content">
                                                <div class="job-description">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="job-detail__information-detail" id="box-job-information-detail">
                                            <h2 class="job-detail__information-detail--title">
                                                Yêu cầu công việc
                                            </h2>
                                            <div class="job-detail__information-detail--content">
                                                <div class="job-description">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                  
                                        <div class="job-detail__information-detail" id="box-job-information-detail">
                                            <h2 class="job-detail__information-detail--title">
                                                Phúc lợi
                                            </h2>
                                            <div class="job-detail__information-detail--content">
                                                <div class="job-description">
                                                </div>
                                            </div>
                                        </div>
                                 
                                        <div class="job-detail__information-detail" id="box-job-information-detail">
                                            <h2 class="job-detail__information-detail--title">
                                                Thành phần hồ sơ
                                            </h2>
                                            <div class="job-detail__information-detail--content">
                                                <div class="job-description">
                                                </div>
                                            </div>
                                        </div>
                                  
                                        <div class="job-detail__information-detail" id="box-job-information-detail">
                                            <h2 class="job-detail__information-detail--title">
                                                Thông tin liên hệ
                                            </h2>
                                            <div class="job-detail__information-detail--content">
                                                <div class="job-description">
                                                </div>
                                            </div>
                                        </div>
                                 
                                    <!-- content -->
                                </div>
                                    <!-- content Viec lam cung cong ty -->
                          
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
                                                                <div class="job-item-default bg-highlight">
                                                                    <div class="avatar">
                                                                        <a href="" target="_blank">
                                                                            <img src="{{ asset('uploads/noimg/no_image.jpg') }}"  alt="">
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
                                                                                        <a href="" target="_blank">
                                                                                            <span>title</span>
                                                                                        </a>
                                                                                    </h3>
                                                                                    <a href="" class="company">cont ty</a>
                                                                                    
                                                                                </div>
                                                                                <div class="box-right">
                                                                                    <label class="title-salary">
                                                                                        <i class="fa fa-money  green-color "></i>luong
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        <div class="info">
                                                                            <div class="label-content">
                                                                                <label class="address"><i class="fas fa-map-marker-alt green-color pr-2"></i></label>
                    
                                                                                <label class="time"><i class="fa fa-calendar green-color pr-2"></i>
                                                                                    deadline
                                                                                    
                                                                                </label>
                                                                                <label class="address">
                                                                                    
                                                                                    <i class="fa fa-clock green-color pr-2"></i>Cập nhật 
                                                                                </label>
                                                                            </div>
                                                                            <div class="icon">
                                                                                <button class="btn btn-apply-now">
                                                                                    <span>Ứng tuyển</span>
                                                                                </button>
                                                                                <div class="box-save-job">
                                                                                    
                                                                                    <button class="bookmark-button box-save-job-hover" >
                                                                                        <i class="fa fa-heart-o" style="font-size: 20px"></i> Luu tin
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
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end content Viec lam cung cong ty -->
                                
                            </div>
                            <!-- Sidebar -->
                            <div class="col-md-4 col-sm-12 col-12 clear-right">
                                <div class="side-bar mb-3">
                                    <div class="job-detail__box--right job-detail__company">
                                        <div class="job-detail__company--information">
                                            <div class="job-detail__company--information-item company-name">
                                                <a class="company-logo" href="" target="_blank" >
                                                    <img src="{{ asset('uploads/noimg/no_image.jpg') }}" alt="" class="img-responsive">
                                                </a>
                                                <h2 class="">
                                                    <a class="name" href="" target="_blank" >cong ty</a>
                                                    <div class="company-subdetail-label">
                                                    </div>
                                                </h2>
                                            </div>
                                        <div class="job-detail__company--information-item company-scale">
                                            <div class="company-title">
                                                <i class="pr-2 grey-color fas fa-users"></i>
                                                Quy mô:
                                            </div>
                                            <div class="company-value">size</div>
                                        </div>
                                        <div class="job-detail__company--information-item company-scale">
                                            <div class="company-title">
                                                <i class="fas fa-map-marker-alt grey-color pr-2"></i>
                                                Địa điểm:
                                            </div>
                                            <div class="company-value" >
                                           
                                            </div>
                                        </div>
                                        </div>
                                        <div class="job-detail__company--link">
                                            <a href="" target="_blank">Xem trang công ty <i class="fa fa-external-link"></i></a>
                                            
                                        </div>
                                    </div>
                                </div>
                                    <div class="side-bar mb-3">
                                        <h2 class="text">
                                            Việc làm liên quan
                                        </h2>
                                        <hr style="color: #00b14f; font-size: 20px">
            
                                        <div class="job-best-salary-inner">
                                            
                                           
                                                <div class="job-over-item ">
                                                    <div class="cvo-flex">
                                                        <div class="col-title cvo-glex-grow">
                                                            <h3>
                                                                <a href="" target="_blank" class="title quickview-job text_ellipsis">
                                                                    <strong class="job_title">
                                                                        ten
                                                                    </strong>
                                                                </a>
                                                            </h3>
                                                            <a href="" target="_blank" class="text-silver company  company_name">
                                                               name
                                                            </a>
                                                        </div>
            
                                                    </div>
                                                
                                                    <div class="box-footer">
                                                        <div class="col-job-info">
                                                            <div class="salary">
                                                                <i class="fa fa-money green-color pr-2"></i><span class="text_ellipsis"></span>
                                                            </div>
                                                            <div class="address">
                                                                <i class="fas fa-map-marker-alt green-color pr-2"></i> <span class="text_ellipsis"></span>
                                                            </div>
                                                            
                                                        
                                                        </div>
                                                        
                                                    </div>
                                                
                                                </div>
                                               
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>    

@endforeach

{{-- @endsection                                                                                                                                          --}}