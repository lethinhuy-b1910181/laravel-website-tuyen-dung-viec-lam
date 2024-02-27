@extends('front.layout.app')

{{-- @section('seo_title'){{ $faq_page_item->title }}@endsection
@section('seo_meta_description'){{ $faq_page_item->meta_description }}@endsection --}}

@section('main_content')
<div class="slider slider-heading" style="background: url({{ asset('uploads/banner_home.jpg') }}) no-repeat top center; ">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item user-heading">
                    <div class="inner-title">
                        
                        <h3>
                            Cập Nhật Thông Tin Tài Khoản
                        </h3>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid published-recuitment-wrapper">
    <div class="container published-recuitment-content">
      <div class="row"> 
        @include('candidate.sidebar')
        <div class="col-md-9 col-sm-12 col-12 recuitment-inner">
          <div class="recuiter-info">
            
            <div class="clearfix list-rec">
              <h4>việc làm của tôi</h4>
            </div>
          </div>
          <div class="accordion accordion-content" id="accordionExample">
            <div class="card recuitment-card">
              <div class="card-header recuitment-card-header" id="heading5">
                <h2 class="mb-0">
                  <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                    Việc làm đã lưu
                    <span id="clickc1_advance1" class="clicksd">
                      <i class="fa fa fa-angle-up"></i>
                    </span>
                  </a>
                </h2>
              </div>
              <div id="collapse5" class="collapse " aria-labelledby="heading5" data-parent="#accordionExample" >
                <div class="card-body recuitment-body">
                    <div class="table-candidate">
                        @if($jobs->count() != 0)
                        <div class="block block-table">
                            
                                <div class="block-head">
                                    <div class="page-row align-items-center">
                                        
                                        <div class="column-md-8">
                                            <div class="block-title">
                                                <span>Danh sách <b>{{ $jobs->count() }}</b> việc làm đã lưu</span>
                                            </div>
                                        </div>
                                        <div class="column-md-4">
                                            <div class="block-search" id="blockSearch">
                                                <input type="text" placeholder="Tìm kiếm" id="txt-search">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-body">
                                    
                                    <div class="table-theme">
                                        
                                        <table class="table-style" id="tbl-custom">
                                            <thead>
                                                <tr>
                                                    
                                                    <th style="width: 42%" class="table-sort sort-asc" data-colname="tuyendung_tieude">Vị trí tuyển dụng</th>
                                                    <th style="width: 20%">Khu vực</th>
                                                    <th style="width: 15%" class="table-sort" data-colname="tuyendung_mucluong">Mức lương</th>
                                                    <th style="width: 15%" class="table-sort" data-colname="tuyendung_hannop">Hạn nộp</th>
                                                    <th style="width: 8%" class="align-center">
                                                        Xóa
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jobs as $item)
                                                <tr>
                                                        <td style="width: 45%">
                                                            <div class="name">
                                                                <p style="text-transform: uppercase"><a href="{{ route('job', $item->rJob->id) }}" target="_blank">{{ $item->rJob->title }}</a></p>
                                                                <a href="{{ route('company', $item->rJob->rCompany->id) }}" target="_blank">
                                                                <span  data-toggle="tooltip" data-original-title="">{{ $item->rJob->rCompany->company_name }}</span>
                                                                 </a>
                                                            </div>
                                                        </td>
                                                        <td style="width: 20%">
                                                            <div class="text">
                                                                <span data-toggle="tooltip" data-original-title="Cần Thơ">{{ $item->rJob->rJobLocation->name }}</span>
                                                            </div>
                                                        </td>
                                                        <td style="width: 15%">
                                                            <div class="text">
                                                                {{ $item->rJob->rJobSalary->name }}
                                                            </div>
                                                        </td>
                                                        <td style="width: 15%">
                                                            <div class="text">
                                                                @php
                                                                    $date = new DateTime($item->rJob->deadline); 
                                                                @endphp
                                                                {{ $date->format('d-m-Y') }}
                                                            </div>
                                                        </td>
                                                        <td style="width: 5%">
                                                            <div class="checkbox-vieclam" >
                                                                <a href="" id="delete" class="delete-button" data-productid="{{ $item->id }}">
                                                                    <i class="fas fa-remove " style="color: red; font-size: 16px"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    
                                </div>
                            
                        </div>
                        @else
                            <div style="display: flex; justify-content:center; padding-bottom:10px">
                                <img src="{{ asset('uploads/noimg/nojob.png') }}" alt="" width="150px" height="150px" >
                                
                            </div>
                            <div style="display: flex; justify-content:center; padding-bottom:20px; padding-top:20px; font-size:14px">Bạn chưa lưu công việc nào!!!</div>
                            <div style="display: flex; justify-content:center; padding-bottom:20px">
                                
                                <button class="btn btn-apply-now" style="background: #00b14f; color: #fff;  font-weight: 500 ">
                                    <a href="{{ route('job_list') }}" style="color: #fff">Tìm việc ngay</a>
                                </button>
                            </div>
                            
                
                                                    
                        @endif
                    </div>
                </div>

              </div>
            </div>

            <div class="card recuitment-card">
                <div class="card-header recuitment-card-header" id="heading5">
                  <h2 class="mb-0">
                    <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                      Việc làm đã ứng tuyển
                      <span id="clickc1_advance1" class="clicksd">
                        <i class="fa fa fa-angle-up"></i>
                      </span>
                    </a>
                  </h2>
                </div>
                <div id="collapse6" class="collapse " aria-labelledby="heading6" data-parent="#accordionExample">
                    <div class="card-body recuitment-body">
                        <div class="table-candidate">
                            @if($job_apply->count() != 0)
                            <div class="block block-table">
                                
                                    <div class="block-head">
                                        <div class="page-row align-items-center">
                                            
                                            <div class="column-md-8">
                                                <div class="block-title">
                                                    <span>Danh sách <b>{{ $job_apply->count() }}</b> việc làm đã nộp</span>
                                                </div>
                                            </div>
                                            <div class="column-md-4">
                                                <div class="block-search" id="blockSearch">
                                                    <input type="text" placeholder="Tìm kiếm" id="txt-search">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-body">
                                        
                                        <div class="table-theme">
                                            
                                            <table class="table-style" id="tbl-custom">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th style="width: 25%" class="table-sort sort-asc" data-colname="tuyendung_tieude">Vị trí tuyển dụng</th>
                                                        <th style="width: 15%">Ngày nộp</th>
                                                        <th style="width: 15%" class="table-sort" data-colname="tuyendung_mucluong">CV</th>
                                                        <th style="width: 30%" class="table-sort" data-colname="tuyendung_hannop">Nội dung</th>
                                                        <th style="width: 15%" class="table-sort" data-colname="tuyendung_hannop">Trạng thái</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($job_apply as $item)
                                                    <tr>
                                                            <td style="width: 25%">
                                                                <div class="name">
                                                                    <p style="text-transform: uppercase"><a href="{{ route('job', $item->rJob->id) }}" target="_blank">{{ $item->rJob->title }}</a></p>
                                                                    <a href="{{ route('company', $item->rJob->rCompany->id) }}" target="_blank">
                                                                    <span  data-toggle="tooltip" data-original-title="">{{ $item->rJob->rCompany->company_name }}</span>
                                                                     </a>
                                                                </div>
                                                            </td>
                                                            
                                                            <td style="width: 15%">
                                                                <div class="text">
                                                                    {{ $item->created_at->format('d-m-Y') }}
                                                                </div>
                                                            </td>
                                                            <td style="width: 15%">
                                                                <div class="text">
                                                                    <a href="{{ url('uploads/'.$item->file) }}">
                                                                    <span data-toggle="tooltip" data-original-title="Cần Thơ">Download</span>
                                                                        
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td style="width: 30%">
                                                                <div class="text">
                                                                    {!! $item->letter !!}
                                                                </div>
                                                            </td>
                                                            <td style="width: 15%">
                                                                @if ($item->status == -1)
                                                                    @php
                                                                        $color = 'primary';
                                                                        $text = 'Đang chờ xử lí'
                                                                    @endphp
                                                                @elseif($item->status == 1)
                                                                    @php
                                                                        $color = 'success';
                                                                        $text = 'Duyệt'
                                                                    @endphp
                                                                @elseif($item->status == 0) 
                                                                    @php
                                                                        $color = 'danger';
                                                                        $text = 'Từ chối'
                                                                    @endphp 
                                                                @endif

                                                                <div class="badge bg-{{ $color }}">
                                                                    {{ $text }}
                                                                </div>
                                                            </td>
                                                            
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                        
                                    </div>
                                
                            </div>
                            @else
                                <div style="display: flex; justify-content:center; padding-bottom:10px">
                                    <img src="{{ asset('uploads/noimg/nojob.png') }}" alt="" width="150px" height="150px" >
                                    
                                </div>
                                <div style="display: flex; justify-content:center; padding-bottom:20px; padding-top:20px; font-size:14px">Bạn chưa lưu công việc nào!!!</div>
                                <div style="display: flex; justify-content:center; padding-bottom:20px">
                                    
                                    <button class="btn btn-apply-now" style="background: #00b14f; color: #fff;  font-weight: 500 ">
                                        <a href="{{ route('home') }}" style="color: #fff">Tìm việc ngay</a>
                                    </button>
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
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#fileElem').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection