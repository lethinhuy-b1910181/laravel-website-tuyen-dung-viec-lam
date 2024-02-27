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
                                                <input type="text" name="title" class="form-control sinput" placeholder="Nhập vị trí ứng tuyển" value="{{ $form_title }}">
                                                <span><i class="fa fa-search"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="category" id="computer-languages" data-select2-id="computer-languages" tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                                                    <option value="" selected="" hidden="" data-select2-id="2">Tất cả ngành nghề</option>
                                                    @foreach ($job_categories as $item)
                                                        <option value="{{ $item->id }}" @if($form_category == $item->id) selected  @endif >
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
                                                        <option value="{{ $item->id }}" @if($form_location == $item->id) selected  @endif>
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
                                <div class="search-action ml-3">
                                    <a class=" collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                      
                                        <span id="" class="clicksd">
                                          <i class="fa fa-angle-down" style="
                                          color: green;"></i>
                                        </span>
                                        <b>Tìm kiếm nâng cao    </b>
                                      </a>
                                    {{-- <a href="" data-bs-toggle="collapse" data-bs-target="#collapse0" aria-expanded="false" aria-controls="collapse0"   class="collapsed" >
                                        <i class="fa fa-angle-down"></i>
                                        Tìm kiếm nâng cao
                                    </a> --}}
                                </div>

                                {{-- <div id="collapse0" class="row collapse show" data-parent="#collapse0"> --}}
                                    <div id="collapse4" class="row collapse " aria-labelledby="heading4" data-parent="#collapse4">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <select name="salary" class="select2" aria-hidden="true">
                                                    <option value="" >Lọc theo mức lương</option>
                                                    @foreach ($job_salaries as $item)
                                                        <option value="{{ $item->id }}" @if($form_salary == $item->id) selected  @endif >
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <select name="nature"  class="select2" aria-hidden="true">
                                                    <option value="" selected="" hidden="" data-select2-id="2">Lọc theo cấp bậc</option>
                                                    @foreach ($job_natures as $item)
                                                        <option value="{{ $item->id }}" @if($form_nature == $item->id) selected  @endif >
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <select name="type" class="select2" aria-hidden="true">
                                                    <option value="" selected="" hidden="" data-select2-id="2">Lọc theo loại hình</option>
                                                    @foreach ($job_types as $item)
                                                        <option value="{{ $item->id }}" @if($form_type == $item->id) selected  @endif >
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <select name="experience"  class="select2" aria-hidden="true">
                                                    <option value="" selected="" hidden="" data-select2-id="13">Lọc theo kinh nghiệm</option>
                                                    @foreach ($job_experiences as $item)
                                                        <option value="{{ $item->id }}" @if($form_experience == $item->id) selected  @endif>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>  
                            <div class="search-result">
                                <div class="search-result-text section-search-result ">
                                    <div class="search-result-text__item section-job-total" style="display: flex;">
                                        <span>
                                            <span class="hight-light">
                                            Tổng
                                            </span>
                                            <span class="total-job-search">{{ $jobs->count() }}</span>
                                            <span class="hight-light">
                                            kết quả
                                            </span>
                                        </span>
                                     </div>
                                
                                </div>
                            </div>
                        </div>
                        <!-- (end) content tab 1 -->
                        
                    </div>
            
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="job-result" style="background-color: #F7F7F7">
        <div class="container">
            <div class="row justify-content-center align-items-center">
            
                
                <div class="col-md-12 ">
                    <div class="job">
                        <div class="container">
                            <div class="ctn-breadcrumb-detail">
                                <a href="{{ route('home') }}" class="text-highlight bold">Trang chủ</a> <i class="fa fa-angle-right"></i>
                                 <span class="text-dark-blue">Tuyển dụng <b>{{ $jobs->count() }}</b> việc làm mới nhất 2023</span>
                            </div>
                            <div class="row row-10">
                                <div class="search-inner bg-white border" >
                                @if(!$jobs->isEmpty())
                                    
                                    <div class="p-3">
                                        <div class="box-body">
                                            <div class="job-list-default">
                                                @foreach ($jobs as $item)
                                                <div class="job-item-default bg-highlight">
                                                    <div class="avatar">
                                                        <a title="{{ $item->rCompany->name }}" href="{{ route('company', $item->rCompany->id) }}" target="_blank">
                                                            <img src="{{ asset('uploads/'.$item->rCompany->logo) }}" alt="">
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
                                                                <label class="address">
                                                                     @php
                                                                    Carbon\Carbon::setLocale('vi');
                                                                    @endphp
                                                                    <i class="fa fa-clock green-color pr-2"></i>Cập nhật {{ $item->created_at->diffForHumans() }}
                                                                </label>
                                                            </div>
                                                            <div class="icon" >
                                                                @if(Auth::guard('candidate')->check())
                                                                
                                                                    @php

                                                                        $apply = App\Models\CandidateApplication::where('candidate_id', Auth::guard('candidate')->user()->id)->where('job_id', $item->id)->count();
                                                                
                                                                    @endphp

                                                                    @if ($apply>0)
                                                                    <button class="btn btn-apply-now " style="border-radius: 5px;background: green;">
                                                                        
                                                                        Đã ứng tuyển
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

                                                                    {{-- <a href="{{ route('candidate_bookmark_add', $item->id) }}" data-productid="{{ $item->id }}" class="save box-save-job-hover ">
                                                                        <i class="{{ $save }}"></i>
                                                                    </a> --}}
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12" >
                                            <div style="justify-content: center; display: flex">
                                                {{ $jobs->links() }}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    
                                    <div class="p-3">
                                        <div class="box-body">
                                            <div class="job-list-default">
                                                <h6>Không có kết quả tìm kiếm phù hợp</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection

