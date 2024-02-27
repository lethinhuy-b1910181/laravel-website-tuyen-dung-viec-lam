@extends('front.layout.app')

@section('main_content')

<div class="main">
    <div class="company-cover">
        <div class="container">
            <div class="company-cover-inner">
                <div class="cover-wrapper">
                    <img src="{{ asset('uploads/noimg/bg_cty.jpg') }}" alt="">
                </div>
                <div class="company-logo">
                    <div class="company-image-logo">
                        <img src="{{ asset('uploads/'.$company->logo) }}" class="img-responsive" alt="">
                    </div>
                </div>
                <div class="company-detail-overview">
                    <div class="box-detail">
                        <h1 class="company-detail-name text-highlight">{{ $company->company_name }}</h1>
                        <div class="company-subdetail">
                            <div class="company-subdetail-info">
                                <span class="company-subdetail-info-icon"><i class="fa fa-users"></i></span>
                                <span class="company-subdetail-info-text">{{ $company->rCompanySize->name }}</span>
                            </div>
                            <div style="
                            color: #fff;" class="d-flex igap-2 justify-content-center cursor-pointer" >
                                
                                <div class="small-text text-decoration-underline">
                                {{ $jobs->count() }} tin tuyển dụng
                                </div>
                                </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div id="section-introduce">
                        <div class="company-info">
                            <h2 class="title">Giới thiệu công ty</h2>
                            <div class="box-body">
                                <div class="content">
                                    <p>{!! $company->description !!}</p>
                                    <div class="temp"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!$jobs->isEmpty())
                        <div class="main-job" >
                            <div class="job-listing">
                                <h2 class="title-heading">Tuyển dụng</h2>
                                <div class="box-body">
                                    <div class="job-list-default">
                                        @foreach ($jobs as $item)
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
                                                                <a href="" class="company">{{ $company->company_name }}</a>
                                                                
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
                                                                 ngày để ứng tuyển
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
                                                                    <button class="btn btn-apply-now" style="width: 100px;background: green;">
                                                                
                                                                    <span>Đã ứng tuyển</span>
                                                                
                                                                </button>
                                                                @endif

                                                            @else

                                                            <a href="{{ route('job', $item->id) }}" class="btn btn-apply-now " id="apply-hover"  >
                                                                    
                                                                Ứng tuyển 
                                                            </a>
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
                
                                                                
                                                                <button class="bookmark-button box-save-job-hover" data-bs-toggle="{{ $toggle }}" data-bs-target="{{ $target }}"  data-productid="{{ $item->id }}" data-productid="{{ $item->id }}" data-save="{{ $save }}">
                                                                    <i class="{{ $save }}" style="font-size: 20px"></i>
                                                                </button>

                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(!$company_filed->isEmpty())
                        <div id="section-top-company-field">
                            <h2 class="title">
                                Top công ty cùng lĩnh vực
                            </h2>
                            <div id="slider-company">
                                <div class="owl-carousel owl-theme top-company">
                                    @foreach($company_filed as $item)
                                        <div class="top-company--item">
                                            <div class="box-logo">
                                                <a href="{{ route('company', $item->id) }}">
                                                    <img src="{{ asset('uploads/'.$item->logo) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="box-content">
                                                <a href="{{ route('company', $item->id) }}">
                                                    <div class="top-company__title">
                                                        <span>{{ $item->company_name }}</span>
                                                    </div>
                                                </a>
                                                @if($jobCounts[$item->id] != 0)
                                                <label class="top-company__badge"><b>{{ $jobCounts[$item->id] }}</b> việc làm</label>
                                                @endif
                                            </div>

                                        </div>
                                    @endforeach
                                    
                                </div> 

                            </div>
                        </div>
                    @endif
                    
                </div>
                <div class="col-md-4">
                    <div id="section-contact">
                        <h2 class="title">Thông tin công ty</h2>
                        <div class="box-body">
                            <div class="item">
                                <div class="box-caption">
                                    <i class="fas fa-phone-alt blue-color w-20"></i>
                                    <span>{{ $company->phone }}</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="box-caption">
                                    <i class="fas fa-map-marker-alt green-color pr-2"></i>
                                    <span>Địa chỉ công ty </span>
                                </div>
                                <div class="desc">
                                    {!! $company->address !!}
                                </div>
                            </div>
                            <div class="item">
                                <div class="box-caption">
                                    <i class="fas fa-globe blue-color w-20"></i>
                                    <span><a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="box-caption">
                                    <i class="fas fa-users blue-color w-20"></i>
                                    <span>{{ $company->rCompanySize->name }}</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="box-caption">
                                    <i class="fas fa-credit-card   blue-color w-20"></i>
                                    <span>MST: {{ $company->founded_on }}</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="box-caption">
                                    <i class="fas fa-briefcase blue-color w-20"></i>
                                    <span>Lĩnh vực: {{ $company->rCompanyIndustry->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>






{{-- <div
class="page-top page-top-job-single page-top-company-single"
style="background-image: url('uploads/banner.jpg')"
>
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 job job-single">
                <div class="item d-flex justify-content-start">
                    <div class="logo">
                        <img src="{{ asset('uploads/'.$company->logo) }}" alt="" />
                    </div>
                    <div class="text">
                        <h3>{{ $company->company_name }}</h3>
                        <div
                            class="detail-1 d-flex justify-content-start"
                        >
                            <div class="category">{{ $company->rCompanyIndustry->name }}</div>
                            <div class="location">{{ $company->rCompanyLocation->name }}</div>
                            <div class="email">{{ $company->email }}</div>
                            
                        </div>
                        <div class="special">
                            <div class="type">{{ $company->r_job_count }} vị trí đang tuyển</div>
                            <div class="social">
                                <ul>
                                    <li>
                                        <a href=""
                                            ><i
                                                class="fab fa-facebook-f"
                                            ></i
                                        ></a>
                                    </li>
                                    
                                    <li>
                                        <a href=""
                                            ><i
                                                class="fab fa-instagram"
                                            ></i
                                        ></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


{{-- <div class="job-result pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                @if($jobs->count() !=0)
                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Công việc đang tuyển dụng
                        </h2>
                        <div class="job related-job pt-0 pb-0">
                            <div class="container">
                                <div class="row">
                                    @foreach ($jobs as $item)
                                    <div class="col-md-12">
                                        <div
                                            class="item d-flex justify-content-start"
                                        >
                                            <div class="logo">
                                                <img
                                                    src="{{ asset('uploads/'.$company->logo) }}"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="text">
                                                <h3>
                                                    <a href="{{ route('job', $item->id) }}"
                                                        >{{ $item->title }}
                                                       </a
                                                    >
                                                </h3>
                                                <div
                                                    class="detail-1 d-flex justify-content-start"
                                                >
                                                    <div class="category">
                                                        {{ $item->rJobCategory->name }}
                                                    </div>
                                                    <div class="location">
                                                        {{ $item->rJobLocation->name }}
                                                    </div>
                                                </div>
                                                <div
                                                    class="detail-2 d-flex justify-content-start"
                                                >
                                                    <div class="budget">
                                                        {{ $item->rJobSalary->name }}
                                                    </div>
                                                    <div class="date">
                                                        {{ $item->deadline}}
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <div
                                                    class="special d-flex justify-content-start"
                                                >
                                                @if($item->is_featured == 1)
                                                <div class="featured">
                                                    Tốt nhất
                                                </div>
                                                @endif
                                                    <div class="type">
                                                        {{ $item->rJobType->name }}
                                                    </div>
                                                @if($item->is_urgent == 1)
                                                    <div class="urgent">
                                                        Tuyển gấp
                                                    </div>
                                                @endif
                                                </div>
                                                <div class="bookmark">
                                                    <a href=""
                                                        ><i
                                                            class="fas fa-bookmark active"
                                                        ></i
                                                    ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="left-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Giới thiệu công ty
                    </h2>
                    <p>
                       {!! $company->description !!}
                    </p>
                    
                </div>
                @if($company_photos->count() != 0)
                <div class="left-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Hình ảnh hoạt động
                    </h2>
                    <div class="photo-all">
                        <div class="row">
                            @foreach ($company_photos as $item)
                            
                            <div class="col-md-6 col-lg-4">
                                <div class="item">
                                    <a
                                        href="{{ asset('uploads/'.$item->photo) }}"
                                        class="magnific"
                                    >
                                        <img
                                            src="{{ asset('uploads/'.$item->photo) }}"
                                            alt=""
                                        />
                                        <div class="icon">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                        <div class="bg"></div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                @endif
               
                <div class="left-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Videos
                    </h2>
                    <div class="video-all">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="item">
                                    <a
                                        class="video-button"
                                        href="http://www.youtube.com/watch?v=j_Y2Gwaj7Gs"
                                    >
                                        <img
                                            src="http://img.youtube.com/vi/j_Y2Gwaj7Gs/0.jpg"
                                            alt=""
                                        />
                                        <div class="icon">
                                            <i
                                                class="far fa-play-circle"
                                            ></i>
                                        </div>
                                        <div class="bg"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="item">
                                    <a
                                        class="video-button"
                                        href="http://www.youtube.com/watch?v=BvngUP0sHhQ"
                                    >
                                        <img
                                            src="http://img.youtube.com/vi/BvngUP0sHhQ/0.jpg"
                                            alt=""
                                        />
                                        <div class="icon">
                                            <i
                                                class="far fa-play-circle"
                                            ></i>
                                        </div>
                                        <div class="bg"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="item">
                                    <a
                                        class="video-button"
                                        href="http://www.youtube.com/watch?v=deLf6eynC40"
                                    >
                                        <img
                                            src="http://img.youtube.com/vi/deLf6eynC40/0.jpg"
                                            alt=""
                                        />
                                        <div class="icon">
                                            <i
                                                class="far fa-play-circle"
                                            ></i>
                                        </div>
                                        <div class="bg"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="right-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Thông tin công ty
                    </h2>
                    <div class="summary">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td><b>Điện thoại:</b></td>
                                    <td>{{ $company->phone }}</td>
                                </tr>
                                <tr>
                                    <td><b>Địa chỉ:</b></td>
                                    <td>{{ $company->address }}</td>
                                </tr>
                                <tr>
                                    <td><b>Website:</b></td>
                                    <td>{{ $company->website }}</td>
                                </tr>
                                <tr>
                                    <td><b>Qui mô:</b></td>
                                    <td>{{ $company->rCompanySize->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>MST: </b></td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Lĩnh vực: </b></td>
                                    <td>{{ $company->rCompanyIndustry->name }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Hành lập:</b>
                                    </td>
                                    <td>{{ $company->founded_on }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="right-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Liên hệ chúng tôi
                    </h2>
                    <div class="enquery-form">
                        <form action="" method="post">
                            <div class="mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Họ và Tên"
                                />
                            </div>
                            <div class="mb-3">
                                <input
                                    type="email"
                                    class="form-control"
                                    placeholder="Địa chỉ Email"
                                />
                            </div>
                            <div class="mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Số điện thoại"
                                />
                            </div>
                            <div class="mb-3">
                                <textarea
                                    class="form-control h-150"
                                    rows="3"
                                    placeholder="Lời nhắn"
                                ></textarea>
                            </div>
                            <div class="mb-3">
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    Gửi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @if($company->map_code != '')
                <div class="right-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Vị trí bản đồ
                    </h2>
                    <div class="location-map">
                        {!! $company->map_code !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div> --}}


    
@endsection