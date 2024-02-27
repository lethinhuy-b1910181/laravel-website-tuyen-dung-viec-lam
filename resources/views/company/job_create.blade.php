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
              <h4>Đăng tin tuyển dụng</h4>
            </div>
          </div>
          <div class=" accordion accordion-content" id="accordionExample" style="
          display: flex;
          justify-content: center;">
           <form action="{{ route('company_job_create_submit') }}" method="post" style="width: 100%">
            @csrf
            <div class="card-body recuitment-body">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right label">Tiêu đề<span style="color: red" class="pl-2">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Nhập tiêu đề" />
                </div>
              </div>
              <div class="form-group row">
                
                <label class="col-sm-3 col-form-label text-right label">Số lượng cần tuyển</label>
                <div class="col-sm-9">
                  <input
                    type="number"
                    class="form-control"
                    min="1"
                    value="{{ old('vacancy') ? old('vacancy') : '1' }}"
                    name="vacancy"
                />
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right label">Mô tả công việc<span style="color: red" class="pl-2">*</span></label>
                <div class="col-sm-9">
                  <textarea
                      name="description"
                      class="form-control editor"
                      cols="30"
                      rows="5"
                      placeholder="Nhập mô tả công việc"
                  >{{ old('description') }}</textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right label">Yêu cầu công việc<span style="color: red" class="pl-2">*</span></label>
                <div class="col-sm-9">
                  <textarea
                      name="skill"
                      class="form-control editor"
                      cols="30"
                      rows="10"
                      placeholder="Nhập yêu cầu công việc"
                  >{{ old('skill') }}</textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right label">Quyền lợi<span style="color: red" class="pl-2">*</span></label>
                <div class="col-sm-9">
                  <textarea
                      name="benefit"
                      class="form-control editor"
                      cols="30"
                      rows="10"
                      placeholder="Quyền lợi công việc"
                  >{{ old('benefit') }}</textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right label">Giới tính<span style="color: red" class="pl-2">*</span></label>
                <div class="col-sm-9">
                  <select
                      name="job_gender_id"
                      class="form-control select2"
                      id="jobGender"
                  >
                      <option value="">Chọn giới tính</option>
                      @foreach ($job_genders as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                  </select>
                  
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right label">Ngành nghề</label>
                <div class="col-sm-9">
                  <select
                      name="job_category_id"
                      class="form-control select2"
                      id="jobType"
                  >
                      <option selected="selected" value="">Chọn ngành nghề</option>
                      @foreach ($job_categories as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                  </select>
                  
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right label">Cấp bậc<span style="color: red" class="pl-2">*</span></label>
                <div class="col-sm-9">
                  <select
                      name="job_nature_id"
                      class="form-control select2"
                      id="natureWork"
                  >
                    <option selected="selected" value="">Chọn cấp bậc tuyển dụng</option>
                      @foreach ($job_natures as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right label">Trình độ<span style="color: red" class="pl-2">*</span></label>
                <div class="col-sm-9">
                  <select
                      name="job_level_id"
                      class="form-control select2"
                      id="jobLevel"
                  >
                    <option selected="selected"  value="">Chọn trình độ</option>
                      @foreach ($job_levels as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                  </select>
                  
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right label">Kinh nghiệm<span style="color: red" class="pl-2">*</span></label>
                <div class="col-sm-9">
                  <select
                    id="jobExperience"
                      name="job_experience_id"
                      class="form-control select2"
                  >
                    <option selected="selected" value="">Chọn kinh nghiệm</option>
                      @foreach ($job_experiences as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                  </select>
                  
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right label">Mức lương<span style="color: red" class="pl-2">*</span></label>
                <div class="col-sm-9">
                  <select
                      name="job_salary_id"
                      class="form-control select2"
                      id="jobSalary"
                  >
                    <option selected="selected" value="">Chọn mức lương</option>
                      @foreach ($job_salaries as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right label">Hình thức làm việc<span style="color: red" class="pl-2">*</span></label>
                <div class="col-sm-9">
                  <select
                    name="job_type_id"
                    class="form-control select2"
                    
                  ><option selected="selected" value="">Chọn hình thức làm việc</option>
                    @foreach ($job_types as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right label">Địa điểm tuyển dụng</label>
                <div class="col-sm-9">
                  <select
                      name="job_location_id"
                      class="form-control select2"
                    
                  >
                  <option selected="selected" value="">Chọn địa điểm</option>
                  
                      @foreach ($job_locations as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                  </select>
                
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right label">Hạn nộp hồ sơ<span style="color: red" class="pl-2">*</span></label>
                <div class="col-sm-9">
                  {{-- <input type="date" name="deadline" class="form-control" value="{{ old('deadline') ? old('deadline') : date('d-m-Y') }}" > --}}
                  <input type="text" name="deadline" class="form-control" id="datepickers" value="{{ old('deadline') ? old('deadline') : date('d-m-Y') }}">
                </div>
              </div>
            </div>
            <div class="rec-submit">
              <button type="submit" class="btn-submit-recuitment" name="">
                <i class="fa fa-floppy-o pr-2"></i>Lưu Tin
              </button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
</div>

<script>
  $(document).ready(function () {
        $(".multiple-select").select2();
    });
</script>

@endsection