@extends('front.layout.app')

{{-- @section('seo_title'){{ $faq_page_item->title }}@endsection
@section('seo_meta_description'){{ $faq_page_item->meta_description }}@endsection --}}

@section('main_content')
    <div
    class="page-top"
    style="background-image: url('uploads/banner.jpg')"
    >
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Cập nhật mẫu tin</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="card">
                        @include('company.sidebar')
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <form action="{{ route('company_job_edit_update', $job_data->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">Tiêu đề</label>
                                <input type="text" name="title" class="form-control" value="{{ $job_data->title }}" />
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">Mô tả công việc</label>
                                <textarea
                                    name="description"
                                    class="form-control editor"
                                    cols="30"
                                    rows="10"
                                >{{ $job_data->description }}</textarea>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">Yêu cầu chung</label>
                                <textarea
                                    name="skill"
                                    class="form-control editor"
                                    cols="30"
                                    rows="10"
                                >{{ $job_data->skill }}</textarea>
                            </div>
                            
                        </div>

                        <div class="row">
                            
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label"
                                    >Quyền lợi được hưởng</label>
                                <textarea
                                    name="benefit"
                                    class="form-control editor"
                                    cols="30"
                                    rows="10"
                                >{{ $job_data->benefit }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Thành phần hồ sơ</label>
                                <textarea
                                    name="attachments"
                                    class="form-control editor"
                                    cols="30"
                                    rows="10"
                                >{{ $job_data->attachments }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Hạn nộp hồ sơ</label>
                                <input
                                    type="text"
                                    name="deadline"
                                    class="form-control datepicker"
                                    value="{{ $job_data->deadline}}"
                                />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Số lượng cần tuyển</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    min="1"
                                    value="{{ $job_data->vacancy }}"
                                    name="vacancy"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Ngành nghề</label>
                                <select
                                    name="job_category_id"
                                    class="form-control select2"
                                >
                                    @foreach ($job_categories as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $job_data->job_category_id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label"
                                    >Địa điểm</label
                                >
                                <select
                                    name="job_location_id"
                                    class="form-control select2"
                                >
                                    @foreach ($job_locations as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $job_data->job_location_id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label"
                                    >Hình thức làm việc</label
                                >
                                <select
                                    name="job_type_id"
                                    class="form-control select2"
                                >
                                    @foreach ($job_types as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $job_data->job_type_id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label"
                                    >Kinh nghiệm</label
                                >
                                <select
                                    name="job_experience_id"
                                    class="form-control select2"
                                >
                                    @foreach ($job_experiences as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $job_data->job_experience_id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label"
                                    >Yêu cầu giới tính</label
                                >
                                <select
                                    name="job_gender_id"
                                    class="form-control select2"
                                >
                                    @foreach ($job_genders as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $job_data->job_gender_id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label"
                                    >Mức lương</label
                                >
                                <select
                                    name="job_salary_id"
                                    class="form-control select2"
                                >
                                    @foreach ($job_salaries as $item)
                                        <option value="{{ $item->id }}"@if($item->id == $job_data->job_salary_id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label"
                                    >Vị trí bản đồ</label
                                >
                                <textarea
                                    name="map_code"
                                    class="form-control h-150"
                                    cols="30"
                                    rows="10"
                                >{{ $job_data->map_code }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label"
                                    >Có phải việc làm nổi bật không?</label
                                >
                                <select name="is_featured" class="form-control select2">
                                    <option value="0" @if($job_data->is_featured == 0) selected @endif>Không</option>
                                    <option value="1" @if($job_data->is_featured == 1) selected @endif>Có</option>

                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label"
                                    >Có phải việc làm tuyển gấp không?</label
                                >
                                <select name="is_urgent" class="form-control select2">
                                    <option value="0" @if($job_data->is_urgent == 0) selected @endif>Không</option>
                                    <option value="1" @if($job_data->is_urgent == 1) selected @endif>Có</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <input
                                    type="submit"
                                    class="btn btn-primary"
                                    value="Cập nhật"
                                />
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection