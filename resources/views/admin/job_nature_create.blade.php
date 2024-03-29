@extends('admin.layout.app')

@section('heading','Thêm Tính Chất Mới')

@section('button')
<div>
    <a href="{{ route('admin_job_nature') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Xem tất cả</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_job_nature_store') }}" method="post"  >
                        @csrf
                        <div class="form-group mb-3">
                            <label>Tên </label>
                            <input type="text" class="form-control" name="name" >
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

@endsection