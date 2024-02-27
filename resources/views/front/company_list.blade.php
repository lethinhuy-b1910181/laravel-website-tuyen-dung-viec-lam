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
                            <form action="{{ url('company-list') }}" method="get">
                                <div class="row">
                                    <div class="col-md-10 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="input-group s-input-group">
                                                <input type="text" name="title" class="form-control sinput" placeholder="Nhập tên công ty" value="{{ $form_title }}">
                                                <span><i class="fa fa-search"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="industry" id="computer-languages" data-select2-id="computer-languages" tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                                                    <option value="" selected="" hidden="" data-select2-id="2">Loại hình công ty</option>
                                                    @foreach ($company_industry as $item)
                                                        <option value="{{ $item->id }}" @if($form_industry == $item->id) selected  @endif>
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
                                                    @foreach ($company_location as $item)
                                                        <option value="{{ $item->id }}"@if($form_location == $item->id) selected  @endif>
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
                            <div class="search-result">
                                <div class="search-result-text section-search-result ">
                                    <div class="search-result-text__item section-job-total" style="display: flex;">
                                        <span>
                                            <span class="hight-light">
                                            Tổng
                                            </span>
                                            <span class="total-job-search">{{ $company->count() }}</span>
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

<div class="container company">
    <div class="ctn-breadcrumb-detail">
         <h5 class="text-dark-blue"> Danh sách công ty </h5>
    </div>
    <div class="col-lg-12 pl-lg-5">
        <div class="row employers-list">
            @foreach ($company as $item)
            <div class="col-6 col-lg-3 employer-item position-relative mb-4">
                <div class="employer-logo border">
                    <img alt="{{ $item->company_name }}" loading="lazy" src="{{ asset('uploads/'.$item->logo) }}">
                </div>
                <a class="clickable-outside text-decoration-none" href="{{ route('company', $item->id) }}">
                    <h6 class="text-line-clamp-2 mt-3 mb-1" style="color: #000; text-transform:uppercase ">
                {{ $item->company_name }}
                    </h6>
                </a>
                <p class="employer-jobs-count  m-0" style="color: #00B14F">
                    {{ $item->rJob->count() }} việc đang tuyển
                </p>
                <p class="employer-location text-secondary">
                    {{ $item->rCompanyLocation->name }}
                </p>
            </div>
                
            @endforeach
           
        </div>
    </div>
</div>

@endsection