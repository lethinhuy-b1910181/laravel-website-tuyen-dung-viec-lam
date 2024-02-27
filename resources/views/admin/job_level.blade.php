@extends('admin.layout.app')

@section('heading','Trình độ')

@section('button')
<div>
    <a href="{{ route('admin_job_level_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm mới</a>
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
                                    <th><center>Tên</center></th>
                                    <th><center>Hành động</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($job_levels as $item)
                                    <tr>
                                        
                                            <td><center>{{ $loop->iteration }}</center></td>
                                            <td><center>{{ $item->name }}</center></td>
                                            <td>
                                                <center>
                                                    <a href="{{ route('admin_job_level_edit',$item->id) }}" class="btn btn-warning btn-sm text-white" ><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin_job_level_delete',$item->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash-alt"></i></a>
                                                    
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