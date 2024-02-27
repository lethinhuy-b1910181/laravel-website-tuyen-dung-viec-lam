@extends('admin.layout.app')

@section('heading','Ngành Nghề')

@section('button')
<div>
    <a href="{{ route('admin_job_category_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm mới</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row" >
        <div class="col-12" >
            <div class="card" >
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th><center>SL</center></th>
                                    <th><center>Tên Ngành Nghề</center></th>
                                    <th><center>Hình Ảnh</center></th>
                                    <th><center>Action</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($job_categories as $item)
                                    <tr>
                                        
                                            <td><center>{{ $loop->iteration }}</center></td>
                                            <td><center>{{ $item->name }}</center></td>
                                            <td><center><img src="{{ asset('uploads/'.$item->icon) }}" alt=""class=" w_50"></center></td>
                                            <td>
                                                <center>
                                                    <a href="{{ route('admin_job_category_edit',$item->id) }}" class="btn btn-warning btn-sm text-white" ><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin_job_category_delete',$item->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash-alt"></i></a>
                                                    
                                                </center>
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
@endsection