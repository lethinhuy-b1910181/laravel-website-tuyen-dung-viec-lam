@extends('front.layout.app')
@section('seo_title'){{ $home_page_data->title }}@endsection
@section('seo_meta_description'){{ $home_page_data->meta_description }}@endsection


@section('main_content')
<div class="slider" style="background: url({{ asset('uploads/'.$home_page_data->background) }})  ">
    <div class="bg" ></div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="search-wrapper" >
                    <div class="text">
                        <h2>{{ $home_page_data->heading }}</h2>
                       
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false">Tìm việc làm
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Tìm công ty
                            </button>
                        </li>
                    </ul>
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
                                    
                                    <div >
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
                                    <div>
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
                    <!-- content tab 2 -->
                    <div class="tab-pane stab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        
                            <form action="{{ url('company-list') }}" method="get">
                            <div class="row">
                                <div class="col-md-10 col-sm-12">
                                        <div class="input-group s-input-group ">
                                            <input type="text" name="title" class="form-control sinput" placeholder="Nhập tên công ty">
                                            <span><i class="fa fa-search"></i></span>
                                        </div>
                                </div>
                                
                                <div class="col-md-2 col-sm-12" style="
                                z-index: 0;">
                                    
                                    <button type="submit" class="btn btn-primary btn-search col-sm-12" >Tìm kiếm</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                    <!-- (end) content tab 2 -->
                </div>
            
            </div>
            </div>
        </div>
    </div>
</div>



@if ($home_page_data->feature_job_status == 'Show')
    <div class="job">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2 class="text_ellipsis uppercase box-title">{{ $home_page_data->feature_job_heading }}</h2>

                    </div>
                </div>
            </div>
            <div class="row">
            @if(!$featured_jobs->isEmpty())
                @foreach ($featured_jobs as $item)
                    <div class="col-lg-6 col-md-6">
                        <div class="featured-job-item " id="featured-job">
                            <div class="cvo-flex">
                                <a href="{{ route('company', $item->rCompany->id) }}" target="_blank">
                                    <div class="box-company-logo">
                                        <div class="avatar">
                                            <img src="{{ asset('uploads/'.$item->rCompany->logo) }}" alt=""  class="img-responsive"/>
                                        </div>
                                    </div>
                                </a>
                                <div class="body">
                                    <div class="body-content">
                                        <div class="title-block">
                                            <div>
                                                <h3 class="job-title" >
                                                    <a  href="{{ route('job', $item->id) }}"target="_blank">
                                                        <span style="font-size: 18px">{{ $item->title }}</span>
                                                    </a>
                                                </h3>
                                                <a href="{{ route('company', $item->rCompany->id) }}" class="company">{{ $item->rCompany->company_name }}</a>
                                                
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
                                            
                                        </div>
                                        <div class="icon">
                                            @if(Auth::guard('candidate')->check())

                                                @php

                                                    $apply = App\Models\CandidateApplication::where('candidate_id', Auth::guard('candidate')->user()->id)->where('job_id', $item->id)->count();
                                            
                                                @endphp

                                                @if ($apply>0)
                                                    <button class="btn btn-apply-now" style="width: 100px;background: green;">
                                                
                                                    <span>Đã ứng tuyển</span>
                                                
                                                </button>
                                                @endif
                                            @endif
                                            <div class="box-save-job">
                                                @if(Auth::guard('candidate')->check())
                                                    @php
                                                        $toggle = '';
                                                        $target = '';
                                                        $count = App\Models\CandidateBookmark::where('candidate_id', Auth::guard('candidate')->user()->id)->where('job_id', $item->id)->count();
                                                        if($count > 0){
                                                            $save = 'fa fa-heart';
                                                        }
                                                        else {
                                                            $save = 'fa fa-heart-o';
                                                        }
                                                    @endphp
                                                @else
                                                        @php
                                                            $save = 'fa fa-heart-o';
                                                            $toggle = 'modal';
                                                            $target = '#sign-in-popup';
                                                        @endphp
                                                @endif 
                                                <button class="bookmark-button  box-save-job-hover" data-bs-toggle="{{ $toggle }}" data-bs-target="{{ $target }}"  data-productid="{{ $item->id }}" data-save="{{ $save }}">
                                                    <i class="{{ $save }}" style="font-size: 20px"></i>
                                                </button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
           
                @endforeach
                <div class="col-md-12" >
                    <div style="justify-content: center; display: flex">
                        {{ $featured_jobs->links() }}
                    </div>
                    
                </div>
            @endif
            </div>

        </div>
    </div>
@endif

<div class="top-company">
    <div class="container job-board2">
        <div class="row">
            <div class="top-company__heading">
                <h2 class="top-company__title">
                    Nhà Tuyển Dụng Hàng Đầu
                </h2>
            </div>
            <div class="col-md-12 job-board2-wrap">
                <div class="owl-carousel owl-theme job-board2-contain">
                    @foreach ($companies as $item)
                        <div class="item job-latest-item">
                            <div class="company-logo">
                                <a href="{{ route('company', $item->id) }}" class="job-latest-group">
                                
                                    <div class="job-lt-logo">
                                        @if($item->logo != '')
                                        <img src="{{ asset('uploads/'.$item->logo) }}">
                                        @else
                                        <img src="{{ asset('uploads/noimg/no_image.jpg') }}">
                                        @endif

                                    </div>
                                </a>
                            </div>
                            <div class="company-name">
                                <a class="job-latest-group" href="{{ route('company', $item->id) }}">{{ $item->company_name }}</a>
                             
                            </div>
                            <div class="company-job">

                            </div>
                        </div>
                    @endforeach
              </div>
      
            </div>
        </div>
       
    </div>
    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:2,
                        nav:true,
                        dots: false
                    },
                    600:{
                        items:3,
                        nav:false,
                        dots: false
                    },
                    1000:{
                        items: 4,
                        nav:true,
                        loop:false,
                        slideBy: 1
                    }
                }
            });
        });
    </script>
</div>




<div class="quangcao">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12 col-sm-12">
                <a href="#" target="_blank">
                    <img class="w_100" src="{{ asset('uploads/quangcao/anh0.png') }}" alt="" style="height: auto; display: inline;" width="350px" height="140px">
                </a>
            </div>
        </div>
    </div>
</div>

<div class="category">
    <div class="container-fluid">
        <div class="container job-best-salary">
          <div class="row">
            <div class="col-md-12 job-board2-wrap-header job-best-salary-header">
              <h3> Top Ngành Nghề Nổi Bật</h3>
            </div>
          </div>
          <div class="row job-best-salary-inner">

            @foreach ($job_category_data as $item)
                <div class="col-md-6 job-over-item">
                    <div class="job-inner-over-item">
                        <div class="category-icon">
                            <a href="{{ url('job-list?category='.$item->id) }}" class="job-latest-group">
                                <div class="job-lt-logo">
                                    <img src="{{ asset('uploads/'.$item->icon) }}">
                                </div>
                            </a>
                        </div>
                        <div class="category-name">
                            <a class="job-latest-group" href="{{ url('job-list?category='.$item->id) }}">{{ $item->name }}</a>
                                
                        </div>
                        <div class="category-job">
                            <p>( {{ $item->r_job_count }} việc làm )</p>
                        </div>
                    </div>
                </div>
            @endforeach
            
          </div>
        </div>
      </div>
    
</div>

@if ($home_page_data->blog_status == 'Show')
    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2 class="text_ellipsis uppercase box-title">Tin Tức Mới Nhất</h2>
                       
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($posts as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <div class="photo">
                                <img src="{{ asset('uploads/'.$item->photo) }}" alt="" />
                            </div>
                            <div class="text">
                                <h2>
                                    <a href="{{ route('post',$item->slug) }}"
                                        >{{ $item->title }}</a
                                    >
                                </h2>
                                <div class="short-des">
                                    <p>
                                        {{$item->short_description}}
                                    </p>
                                </div>
                                <div class="button">
                                    <a href="{{ route('post',$item->slug) }}" class="btn btn-primary"
                                        >Đọc tiếp</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
@endif
{{-- <script>
    $(document).ready(function () {
    $('.open-modal').click(function (e) {
        e.preventDefault();
        var jobId = $(this).data('job-id');
        var modalId = "#detail_job_" + jobId;
        loadProductData(jobId, modalId);
        $(modalId).modal('show');
    });

    function loadProductData(jobId, modalId) {
        $.ajax({
            type: "GET",
            url: "{{ route('detail-job', ['id' => ':jobId']) }}".replace(':jobId', jobId), // Thay thế :jobId bằng jobId
            dataType: "json",
            success: function (data) {
                // Cập nhật nội dung modal dựa trên dữ liệu từ máy chủ
                $(modalId).html(data.modal);
            }
        });
    }
});

</script> --}}



{{-- @include('front.layout.modal.detail_job') --}}
@endsection

