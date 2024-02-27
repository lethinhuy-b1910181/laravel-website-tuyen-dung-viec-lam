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
              <h4>Cập nhật Hồ sơ và CV </h4>
            </div>
          </div>
          <div class="accordion accordion-content" id="accordionExample">
            <div class="card recuitment-card">
              <div class="card-header recuitment-card-header" id="heading5">
                <h2 class="mb-0">
                  <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                    Thông tin cá nhân
                    <span id="clickc1_advance1" class="clicksd">
                      <i class="fa fa fa-angle-up"></i>
                    </span>
                  </a>
                </h2>
              </div>
              <div id="collapse5" class="collapse " aria-labelledby="heading5" data-parent="#accordionExample">
                <form class="recuitment-form" action="{{ route('candidate_edit_profile_update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="avt">
                        <div class="profile-avatar">
                            <img id="showImage" src="{{ (!empty(Auth::guard('candidate')->user()->photo)) ? asset('uploads/'.Auth::guard('candidate')->user()->photo) : asset('uploads/noimg/no_image.jpg') }}" >
                            <div class="change-avatar">
                                <input type="file" name="photo" id="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)">
                                <label style="cursor: pointer;" for="fileElem"><i class="fa fa-camera"></i></label>
                            </div>
                        </div>
                    </div>
                    
                  <div class="card-body recuitment-body">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Họ và Tên<span style="color: red" class="pl-2">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="name" value="{{ Auth::guard('candidate')->user()->name }}" class="form-control" placeholder="Nhập họ và tên"/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Email<span style="color: red" class="pl-2">*</span></label>
                      <div class="col-sm-9">
                        <input type="mail" name="email" value="{{ Auth::guard('candidate')->user()->email }}"  class="form-control" placeholder="Nhập địa chỉ email" disabled/>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right label">Điện thoại<span style="color: red" class="pl-2">*</span></label>
                        <div class="col-sm-9">
                          <input type="number" name="phone" value="{{ Auth::guard('candidate')->user()->phone }}" class="form-control" placeholder="Nhập số điện thoại"/>
                        </div>
                      </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right label">Giới tính<span style="color: red" class="pl-2">*</span></label>
                        <div class="col-sm-9">
                          <select
                              name="gender"
                              class="form-control select2"
                              id="jobGender"
                          >
                              <option value="" selected>Chọn giới tính</option>
                               <option value="1" @if(Auth::guard('candidate')->user()->gender == 1) selected @endif>Nam</option>
                               <option value="0" @if(Auth::guard('candidate')->user()->gender == 0) selected @endif>Nữ</option>
                            
                          </select>
                          
                        </div>
                      </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Địa chỉ<span style="color: red" class="pl-2">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="address" value="{{ Auth::guard('candidate')->user()->address }}" class="form-control" placeholder="Nhập địa chỉ"/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Link cá nhân<span style="color: red" class="pl-2">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="website" value="{{ Auth::guard('candidate')->user()->website }}" class="form-control" placeholder="Nhập link cá nhân (Linkedin, porfolio,..)"/>
                      </div>
                    </div>
                  </div>

                  <div class="rec-submit">
                    <button type="submit" class="btn-submit-recuitment" name="">
                      <i class="fa fa-floppy-o pr-2"></i>Cập Nhật
                    </button>
                  </div>
                </form>

              </div>
            </div>

            <div class="card recuitment-card">
                <div class="card-header recuitment-card-header" id="heading5">
                  <h2 class="mb-0">
                    <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                      CV và cover letter
                      <span id="clickc1_advance1" class="clicksd">
                        <i class="fa fa fa-angle-up"></i>
                      </span>
                    </a>
                  </h2>
                </div>
                <div id="collapse6" class="collapse " aria-labelledby="heading6" data-parent="#accordionExample">
                  <form action="{{ route('candidate_update_cv') }}" method="POST" enctype="multipart/form-data" class="recuitment-form">
                    @csrf
                    <div class="card-body recuitment-body">
                        <h2 style="font-weight: 700;
                        font-size: 20px;
                        line-height: 34px;">Quản lý CV</h2>
                        <div class="profile-section__text py-3 mb-2 paragraph text-rich-grey" >
                          <i style="font-size: 14px;
                          font-weight: 400;
                          color: #979595;
                          line-height: 24px;">
                            Tải CV của bạn bên dưới để có thể sử dụng xuyên suốt quá trình tìm việc
                          </i>
                          
                        </div>
                        <div class="cv-card">
                          <h3 style="font-size: 1rem">CV của bạn</h3>
                          
                          <div id="file-name" style=" text-decoration: underline;color:#4E4C4D">
                            
                            @if( Auth::guard('candidate')->user()->cv_url)
                            <a href="{{ url('uploads/'.Auth::guard('candidate')->user()->cv_url)}}">
                              {{  Auth::guard('candidate')->user()->cv_url }}
                              
                            </a>
                            @else
                                <span>Chưa có CV được tải lên.</span>
                            @endif
                          </div>
                        
                        <input type="file" name="cv_url" id="file-input" style="display: none; position: absolute; left: -9999px; top: -9999px; z-index: -9999;" accept="doc, docx, pdf">
                        
                          <label style="cursor: pointer;" for="file-input" id="upload-btn">
                            <a class="btn btn-upload-file">
                                <i class="fa fa-upload"></i>
                                
                                <span id="upload-text">Tải lên</span>

                                <span class="cv-box__description">
                                  (Sử dụng tệp .doc, .docx hoặc .pdf, không chứa mật khẩu bảo vệ và dưới 3MB)
                                </span>
                            </a>
                          </label>
                          
                      </div>
                      <div class="cover-letter">
                        <h2 style="font-weight: 700;
                        font-size: 20px;
                        line-height: 34px;">Thư giới thiệu</h2>
                          <hr class="text-silver-grey">

                        <div class="profile-section__text py-3 mb-2 paragraph text-rich-grey" >
                          <i style="font-size: 14px;
                          font-weight: 400;
                          color: #979595;
                          line-height: 24px;">
                            Gợi ý: Bắt đầu bằng việc mô tả những gì bạn có thể mang đến cho công việc và tại sao công việc này lại khiến bạn hứng thú 

                          </i>
                        </div>
                        
                          <textarea
                              name="cover_letter"
                              class="form-control "
                              cols="30"
                              rows="10"
                             
                          >{{ Auth::guard('candidate')->user()->cover_letter }}</textarea>
                      </div>

                    </div>
                    <div class="rec-submit">
                      <button type="submit" class="btn-submit-recuitment" name="">
                        <i class="fa fa-floppy-o pr-2"></i>Cập Nhật
                      </button>
                    </div>
                  </form>
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
<script>
  document.getElementById('file-input').addEventListener('change', function() {
      var fileName = this.files[0].name;
      document.getElementById('file-name').innerHTML = fileName;
  });
</script>

@endsection