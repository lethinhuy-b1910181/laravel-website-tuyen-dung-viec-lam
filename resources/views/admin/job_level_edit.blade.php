@extends('admin.layout.app')

@section('heading','Cập Nhật Trình Độ')

@section('button')
<div>
    <a href="{{ route('admin_job_level') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Xem tất cả</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_job_level_update', $job_level_item->id) }}" method="post"  >
                        @csrf
                        <div class="form-group mb-3">
                            <label>Tên ngành nghề</label>
                            <input type="text" class="form-control" name="name" value="{{ $job_level_item->name }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection