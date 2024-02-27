@extends('admin.layout.app')

@section('heading','Thêm Ngành Nghề Mới')

@section('button')
<div>
    <a href="{{ route('admin_job_category') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Xem tất cả</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_job_category_store') }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group mb-3">
                            <label>Tên ngành nghề</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                        <div class="form-group mb-3">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="icon" id="image">
                        </div>
                        <div class="form-group mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0"></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <img id="showImage" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="" class="" width="80">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection