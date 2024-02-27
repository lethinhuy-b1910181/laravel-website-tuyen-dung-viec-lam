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
              <h4>Danh sách công việc</h4>
            </div>
          </div>
          <div class="accordion accordion-content" id="accordionExample">
    {{-- ================= phần xử lí Danh sách công việc đã đăng ================= --}}
            <div class="card recuitment-card">
              
              {{-- <div id="collapse4" class="collapse " aria-labelledby="heading4" data-parent="#collapse4"> --}}
                <div class="card-body recuitment-body">
                  <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr class="heading">
                              <th><center></center></th>
                                <th><center>STT</center></th>
                                <th><center>Tiêu đề</center></th>
                                <th><center>Lượt ứng tuyển</center></th>
                                <th><center>Ngày đăng & Hết hạn</center></th>
                                <th><center>Hành động</center></th>
                            </tr>
                            @foreach ($jobs as $item)
                                <tr>
                                  <td>
                                    <center>
                                      <a href="/company/jobs/status/{{ $item->id }}" class="btn btn-sm btn-{{ $item->status ? 'success' : 'danger' }}">
                                        {{ $item->status ? 'On' : 'Off' }}
                                      </a>
                                    </center>
                                  </td>
                                    <td><center>{{ $loop->iteration }}</center></td>
                                    
                                    <td >{{ $item->title }}</td>
                                    <td><center>{{ $item->quantity }}</center></td>
                                    <td>
                                      @php
                                        $date = new DateTime(); // Ngày hiện tại
                                        $date_t = new DateTime($item->deadline); // Ngày từ biến $item->deadline
                                        $date_t->add(new DateInterval('P1D'));
                                        $interval = $date->diff($date_t); // Tính khoảng cách thời gian giữa $date và $date_t
                                        
                                        
                                        $deadline = new DateTime($item->deadline)
                                      @endphp
                                      @if($interval->days == 0)
                                        <center>{{ $item->created_at->format('d-m-Y') }} & Đã hết hạn</center></td>
                                      @else
                                        <center>{{ $item->created_at->format('d-m-Y') }} & {{ $deadline->format('d-m-Y') }}</center></td>
                                      @endif
                                    <td>

                                      <center>
                                        <a
                                        href="{{ route('company_candidate_list', $item->id ) }}"
                                            class="btn btn-primary btn-sm text-white"
                                            ><i class="fas fa-eye"></i
                                        ></a>
                                        <a
                                        data-bs-toggle="modal" data-bs-target="#job-edit-{{$item->id}}" 
                                            class="btn btn-warning btn-sm text-white"
                                            ><i class="fas fa-edit"></i
                                        ></a>
                                        <a
                                            href="{{ route('company_job_delete', $item->id) }}"
                                            class="btn btn-danger btn-sm"
                                            onClick="return confirm('Are you sure?');"
                                            ><i class="fas fa-trash-alt"></i
                                        ></a>
                                      </center>
                                        
                                    </td>
                                </tr>
                                <div class="modal fade text-left job-edit" id="job-edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                  <div  class="modal-dialog modal-xl  modal-dialog-zoom" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <div class="modal-title">
                                                  Cập Nhật Thông Tin Việc làm
                                              </div>
                              
                                              <button type="button" class="close" data-bs-dismiss="modal">
                                                  <i class="fas fa-times"></i>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                            <form action="{{ route('company_job_edit_update', $item->id) }}" method="post">
                                              @csrf
                                              <div class="card-body recuitment-body">
                                                <div class="form-group row">
                                                  <label class="col-sm-3 col-form-label text-right label">Tiêu đề<span style="color: red" class="pl-2">*</span></label>
                                                  <div class="col-sm-9">
                                                    <input type="text" name="title" class="form-control" value="{{ $item->title }}" placeholder="Nhập tiêu đề" />
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  
                                                  <label class="col-sm-3 col-form-label text-right label">Số lượng cần tuyển</label>
                                                  <div class="col-sm-9">
                                                    <input
                                                      type="number"
                                                      class="form-control"
                                                      min="1"
                                                      value="{{ $item->vacancy }}"
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
                                                    >{{ $item->description }}</textarea>
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
                                                    >{{ $item->skill }}</textarea>
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
                                                    >{{ $item->benefit }}</textarea>
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label class="col-sm-3 col-form-label text-right label">Giới tính<span style="color: red" class="pl-2">*</span></label>
                                                  <div class="col-sm-9">
                                                    <select
                                                        name="job_gender_id"
                                                        class="form-control form-select"
                                                    >
                                                        <option value="">Chọn giới tính</option>
                                                        @foreach ($job_genders as $gen)
                                                        <option value="{{ $gen->id }}" @if($gen->id == $item->job_gender_id) selected @endif>{{ $gen->name }}</option>
                                                            
                                                        @endforeach
                                                    </select>
                                                    
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label class="col-sm-3 col-form-label text-right label">Ngành nghề</label>
                                                  <div class="col-sm-9">
                                                    <select
                                                        name="job_category_id"
                                                        class="form-control form-select"
                                                    >
                                                        <option selected="selected" value="">Chọn ngành nghề</option>
                                                        @foreach ($job_categories as $cat)
                                                        <option value="{{ $cat->id }}" @if($cat->id == $item->job_category_id) selected @endif>{{ $cat->name }}</option>

                                                        @endforeach
                                                    </select>
                                                    
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label class="col-sm-3 col-form-label text-right label">Cấp bậc<span style="color: red" class="pl-2">*</span></label>
                                                  <div class="col-sm-9">
                                                    <select
                                                        name="job_nature_id"
                                                        class="form-control form-select"
                                                    >
                                                      <option selected="selected" value="">Chọn cấp bậc tuyển dụng</option>
                                                        @foreach ($job_natures as $nat)
                                                        <option value="{{ $nat->id }}" @if($nat->id == $item->job_nature_id) selected @endif>{{ $nat->name }}</option>
                                                        @endforeach
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label class="col-sm-3 col-form-label text-right label">Trình độ<span style="color: red" class="pl-2">*</span></label>
                                                  <div class="col-sm-9">
                                                    <select
                                                        name="job_level_id"
                                                        class="form-control form-select"
                                                    >
                                                      <option selected="selected"  value="">Chọn trình độ</option>
                                                        @foreach ($job_levels as $lev)
                                                        <option value="{{ $lev->id }}" @if($lev->id == $item->job_level_id) selected @endif>{{ $lev->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label class="col-sm-3 col-form-label text-right label">Kinh nghiệm<span style="color: red" class="pl-2">*</span></label>
                                                  <div class="col-sm-9">
                                                    <select
                                                        name="job_experience_id"
                                                        class="form-control form-select"
                                                    >
                                                      <option selected="selected" value="">Chọn kinh nghiệm</option>
                                                        @foreach ($job_experiences as $ex)
                                                        <option value="{{ $ex->id }}" @if($ex->id == $item->job_experience_id) selected @endif>{{ $ex->name }}</option>

                                                        @endforeach
                                                    </select>
                                                    
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label class="col-sm-3 col-form-label text-right label">Mức lương<span style="color: red" class="pl-2">*</span></label>
                                                  <div class="col-sm-9">
                                                    <select
                                                        name="job_salary_id"
                                                        class="form-control form-select"
                                                        
                                                    >
                                                      <option selected="selected" value="">Chọn mức lương</option>
                                                      
                                                        @foreach ($job_salaries as $sala)                                 
                                                        <option value="{{ $sala->id }}" @if($sala->id == $item->job_salary_id) selected @endif>{{ $sala->name }}</option>

                                                        @endforeach
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label class="col-sm-3 col-form-label text-right label">Hình thức làm việc<span style="color: red" class="pl-2">*</span></label>
                                                  <div class="col-sm-9">
                                                    <select
                                                      name="job_type_id"
                                                      class="form-control form-select"
                                                      
                                                    ><option selected="selected" value="">Chọn hình thức làm việc</option>
                                                      @foreach ($job_types as $tp)
                                                      <option value="{{ $tp->id }}" @if($tp->id == $item->job_type_id) selected @endif>{{ $tp->name }}</option>

                                                      @endforeach
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label class="col-sm-3 col-form-label text-right label">Nơi làm việc</label>
                                                  <div class="col-sm-9">
                                                    <select
                                                        name="job_location_id"
                                                        class="form-control form-select"
                                                    >
                                                    <option selected="selected" value="">Chọn nơi làm việc</option>
                                                        @foreach ($job_locations as $loca)
                                                        <option value="{{ $loca->id }}" @if($loca->id == $item->job_location_id) selected @endif>{{ $loca->name }}</option>
                                                            
                                                        @endforeach
                                                    </select>
                                                  
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label class="col-sm-3 col-form-label text-right label">Hạn nộp hồ sơ<span style="color: red" class="pl-2">*</span></label>
                                                  <div class="col-sm-9">
                                                    @php
                                                      $tt = new DateTime($item->deadline);

                                                    @endphp
                                                    {{-- <input type="text" name="deadline" class="form-control" value="" > --}}
                                                    <input type="text" name="deadline" class="form-control" id="datepicker" value="{{ $tt->format('d-m-Y') }}">

                                                    
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
                            @endforeach
                            
                        </tbody>
                    </table>
                  </div>
                </div>
              {{-- </div> --}}
            </div>
    {{-- ================= Kết thúc phần xử lí Danh sách công việc đã đăng ================= --}}


          </div>
        </div>
      </div>
    </div>
</div>


<script>
  $(function() {
    $("#datepicker").datepicker({
      dateFormat: "dd-mm-yy",  // Định dạng hiển thị mong muốn
      altFormat: "yy-mm-dd",   // Định dạng giá trị được gửi đi
      altField: "#actualDate"  // Thêm một trường ẩn để giữ giá trị thực tế
    });
  });
  $(function() {
    $("#datepickers").datepicker({
      dateFormat: "dd-mm-yy",  // Định dạng hiển thị mong muốn
      altFormat: "yy-mm-dd",   // Định dạng giá trị được gửi đi
      altField: "#actualDate"  // Thêm một trường ẩn để giữ giá trị thực tế
    });
  });
</script>
    
@endsection