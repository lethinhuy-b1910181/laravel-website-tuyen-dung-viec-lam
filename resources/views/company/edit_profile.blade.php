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
        @include('company.sidebar')
        <div class="col-md-9 col-sm-12 col-12 recuitment-inner">
          <div class="recuiter-info">
            
            <div class="clearfix list-rec">
              <h4>Cập nhật Hồ sơ công ty</h4>
            </div>
          </div>
          <div class="accordion accordion-content" id="accordionExample">
            <div class="card recuitment-card">
              <div class="card-header recuitment-card-header" id="heading4">
                <h2 class="mb-0">
                  <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                    Hồ sơ công ty
                    <span id="clickc1_advance4" class="clicksd">
                      <i class="fa fa fa-angle-up"></i>
                    </span>
                  </a>
                </h2>
              </div>
              
              <div id="collapse4" class="collapse " aria-labelledby="heading4" data-parent="#collapse4">
                <form action="{{ route('company_edit_profile_update') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body recuitment-body">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Tên người liên hệ<span style="color: red" class="pl-2">*</span></label>
                      <div class="col-sm-9">
                        <input type="text"
                              name="person_name"
                              value="{{ Auth::guard('company')->user()->person_name }}"
                              class="form-control" placeholder="Nhập tên người liên hệ"/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Tên công ty<span style="color: red" class="pl-2">*</span></label>
                      <div class="col-sm-9">
                        <input type="text"
                              name="company_name"
                              value="{{ Auth::guard('company')->user()->company_name }}"
                              class="form-control" placeholder="Nhâp tên công ty"/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Mã số thuế<span style="color: red" class="pl-2">*</span></label>
                      <div class="col-sm-9">
                        <input type="text"
                              name="founded_on"
                              value="{{ Auth::guard('company')->user()->founded_on}}"
                              class="form-control" placeholder="Nhâp mã số thuế của công ty"/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Địa chỉ Email</label>
                      <div class="col-sm-9">
                        <input
                            type="text"
                            name="email"
                            class="form-control"
                            value="{{ Auth::guard('company')->user()->email }} "
                            placeholder="Nhập địa chỉ Email"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Điện thoại<span style="color: red" class="pl-2">*</span></label>
                      <div class="col-sm-9">
                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            value="{{ Auth::guard('company')->user()->phone }}"
                            placeholder="Nhập số điện thoại công ty"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Địa chỉ<span style="color: red" class="pl-2">*</span></label>
                      <div class="col-sm-9">
                        <input
                            type="text"
                            name="address"
                            class="form-control"
                            value="{{ Auth::guard('company')->user()->address }}"
                            placeholder="Nhập chi tiết địa chỉ công ty"
                        />
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Tỉnh/ Thành phố<span style="color: red; " class="pl-2">*</span></label>
                      <div class="col-sm-9">
                        <select type="text" name="company_location_id" class="form-control select-w" id="jobProvince2">
                          @foreach ($company_locations as $item)
                            <option value="{{ $item->id }}" @if($item->id == Auth::guard('company')->user()->company_location_id) selected @endif>{{ $item->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Quy mô nhân sự<span style="color: red" class="pl-2">*</span></label>
                      <div class="col-sm-9">
                        <select type="text" name="company_size_id" class="form-control select-w" id="jobEmployerScale">
                          @foreach ($company_sizes as $item)

                            <option value="{{ $item->id }}" @if($item->id == Auth::guard('company')->user()->company_size_id) selected @endif>{{ $item->name }}</option>
                            
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Loại hình hoạt động<span style="color: red" class="pl-2">*</span></label>
                      <div class="col-sm-9">
                        <select  type="text" name="company_industry_id" class="form-control select-w" >
                          @foreach ($company_industries as $item)

                            <option value="{{ $item->id }}" @if($item->id == Auth::guard('company')->user()->company_industry_id) selected @endif>{{ $item->name }}</option>
                            
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Sơ lược về công ty<span style="color: red" class="pl-2">*</span></label>
                      <div class="col-sm-9">
                        <textarea
                            name="description"
                            class="form-control editor"
                            cols="30"
                            rows="10"
                            placeholder="Sơ lược về công ty"
                        >{{ Auth::guard('company')->user()->description }}</textarea>
                       
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Logo</label>
                      <div class="col-sm-9 " >
                        <div id="drop-area">
                            <input type="file" name="logo" id="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)">
                            <progress id="progress-bar" max=100 value=0 class="d-none"></progress>
                              <div id="gallery"></div>
                            @if(Auth::guard('company')->user()->logo == '')
                              <label style="cursor: pointer;" for="fileElem">Tải ảnh lên hoặc kéo thả vào đây</label>
                              
                            @else
                            <label style="cursor: pointer;" for="fileElem">
                              
                              <img
                              src="{{ asset('uploads/'.Auth::guard('company')->user()->logo) }}"
                              alt=""
                              class="logo"
                              id="showImage"
                              style="display: inline-block; object-fit:cover;image-rendering: pixelated;width: 150px;
                              height: 150px;"

                              />
                            </label>

                            @endif
                            
                        
                        </div>
                        
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Website</label>
                      <div class="col-sm-9">
                        <input
                            type="text"
                            name="website"
                            class="form-control"
                            value="{{ Auth::guard('company')->user()->website }}"
                            placeholder="Nhập đường link wedsite công ty"
                        />
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
                  <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                    Đổi mật khẩu
                    <span id="clickc1_advance1" class="clicksd">
                      <i class="fa fa fa-angle-up"></i>
                    </span>
                  </a>
                </h2>
              </div>
              <div id="collapse5" class="collapse " aria-labelledby="heading5" data-parent="#accordionExample">
                <form class="recuitment-form">
                  <div class="card-body recuitment-body " id="change_pwd">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Mật khẩu hiện tại<span style="color: red" class="pl-2">*</span></label>
                      <div class="col-sm-9 input-group" id="show_hide_password">
                        <input type="password" name="oldPassword" class="form-control border-end-0"  placeholder="Nhập mật khẩu hiện tại"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="fa fa-eye-slash"></i></a>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Mật khẩu mới<span style="color: red" class="pl-2">*</span></label>
                      <div class="col-sm-9 input-group" id="show_hide_new_password">
                        <input type="password" name="newPassword" class="form-control" placeholder="Nhập mật khâủ mới"/><a href="javascript:;" class="input-group-text bg-transparent"><i class="fa fa-eye-slash"></i></a>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label text-right label">Xác nhận mật khẩu<span style="color: red" class="pl-2">*</span></label>
                      <div class="col-sm-9 input-group" id="show_hide_retype_password">
                        <input type="password" name="retypePassword" class="form-control" placeholder="Nhập lại mật khẩu mới"/><a href="javascript:;" class="input-group-text bg-transparent"><i class="fa fa-eye-slash"></i></a>
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

      $("#show_hide_password a").on('click', function (event) {
          event.preventDefault();
          if ($('#show_hide_password input').attr("type") == "text") {
              $('#show_hide_password input').attr('type', 'password');
              $('#show_hide_password i').addClass("fa-eye-slash");
              $('#show_hide_password i').removeClass("fa-eye");
          } else if ($('#show_hide_password input').attr("type") == "password") {
              $('#show_hide_password input').attr('type', 'text');
              $('#show_hide_password i').removeClass("fa-eye-slash");
              $('#show_hide_password i').addClass("fa-eye");
          }
      });

      $("#show_hide_new_password a").on('click', function (event) {
          event.preventDefault();
          if ($('#show_hide_new_password input').attr("type") == "text") {
              $('#show_hide_new_password input').attr('type', 'password');
              $('#show_hide_new_password i').addClass("fa-eye-slash");
              $('#show_hide_new_password i').removeClass("fa-eye");
          } else if ($('#show_hide_new_password input').attr("type") == "password") {
              $('#show_hide_new_password input').attr('type', 'text');
              $('#show_hide_new_password i').removeClass("fa-eye-slash");
              $('#show_hide_new_password i').addClass("fa-eye");
          }
      });

      $("#show_hide_retype_password a").on('click', function (event) {
          event.preventDefault();
          if ($('#show_hide_retype_password input').attr("type") == "text") {
              $('#show_hide_retype_password input').attr('type', 'password');
              $('#show_hide_retype_password i').addClass("fa-eye-slash");
              $('#show_hide_retype_password i').removeClass("fa-eye");
          } else if ($('#show_hide_retype_password input').attr("type") == "password") {
              $('#show_hide_retype_password input').attr('type', 'text');
              $('#show_hide_retype_password i').removeClass("fa-eye-slash");
              $('#show_hide_retype_password i').addClass("fa-eye");
          }
      });
  });
</script>

    
@endsection