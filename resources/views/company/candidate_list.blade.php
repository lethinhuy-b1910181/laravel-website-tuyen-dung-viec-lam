@extends('front.layout.app')


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
        @include('company.sidebar')
        <div class="col-md-9 col-sm-12 col-12 recuitment-inner">
          <div class="recuiter-info">
            
            <div class="clearfix list-rec">
                <div class="row " >
                    <div class="col-2" style="
                    font-size: 20px;
                    padding-left: 20px;
                    color: green;
                ">
                <a href="{{ route('company_job') }}" style="
                font-size: 20px;
                color: rgb(98, 156, 11);
            ">  
                    <i class="fas fa-arrow-left"></i></div>

                </a>
                    <div class="col-10">
                        <h4>Danh sách ứng viên </h4>
                        <h4> ứng tuyển: {{ $single_job->title }} </h4></div>
                
                </div>
              
            </div>
          </div>
          <div class=" accordion accordion-content" id="accordionExample" style="
          display: flex;
          justify-content: center;">
          <div class="card-body recuitment-body">
            <div class="table-responsive">
              <table class="table">
                  <tbody>
                      <tr class="heading">
                          <th><center>STT</center></th>
                          <th><center>Ứng viên</center></th>
                          <th>Thông tin</th>
                          <th><center>Trạng thái</center></th>
                      </tr>
                      @foreach ($candidates as $item)
                          <tr>
                            <td><center>{{ $loop->iteration }}</center></td>
                              <td style="padding-top: 15px"><center>
                                <div class="text">
                              <a href="{{ url('/company/view-cv', $item->id) }}">{{ $item->name }}</a>
                                </div>
                                @if($item->is_seen == 1)
                                  <div class="text" style="color: grey; font-size:14px; padding-top:5px">Đã xem</div>
                                @endif
                            </center></td>
                              <td >
                                <div class="text">
                                  <i class="fa fa-envelope-o px-3" style="color: green"></i>{{ $item->email }}
                                </div>
                                <div class="text">
                                  <i class="fa fa-phone px-3"style="color: green"></i>{{ $item->phone }}
                                </div>
                                <div class="text">
                                  <i class="fa fa-clock-o px-3"style="color: green"></i>{{ $item->created_at }}
                                </div>
                                </td>
                              <td>
                                @if ($item->status == -1)
                                    @php
                                        $color = 'warning';
                                        $text = 'Đang chờ xử lí'
                                    @endphp
                                @elseif($item->status == 1)
                                    @php
                                        $color = 'success';
                                        $text = 'Phù hợp'
                                    @endphp
                                @elseif($item->status == 0) 
                                    @php
                                        $color = 'danger';
                                        $text = 'Từ chối'
                                    @endphp 
                                @endif
                                <center>
                                  <div class="badge bg-{{ $color }}">
                                    {{ $text }}
                                </div>
                                </center>
                                
                                   
                              <td>
                                  
                              </td>
                          </tr>
                      @endforeach
                      
                  </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection