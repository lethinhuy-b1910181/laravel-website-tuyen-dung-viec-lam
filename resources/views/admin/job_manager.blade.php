@extends('admin.layout.app')

@section('heading','Bài đăng tuyển dụng')



@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><center>Nhà tuyển dụng</center></th>
                                    <th><center>Tuyển dụng</center></th>
                                    <th><center>Địa điểm</center></th>
                                    <th><center>Lượt ứng tuyển</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $item)
                                    <tr>
                                        <td>
                                            
                                            <a href="/admin/job-manager/status/{{ $item->id }}" class="btn btn-sm btn-{{ $item->status ? 'success' : 'danger' }}">
                                                {{ $item->status ? 'On' : 'Off' }}
                                              </a>
                                        </td>
                                        <td>
                                            <div class="text">
                                                <i class="fas fa-user-tie px-3" style="color: green"></i>{{ $item->rCompany->person_name }}
                                              </div>
                                              <div class="text">
                                                <i class="fa fa-envelope px-3"style="color: green"></i>{{ $item->rCompany->email }}
                                              </div>
                                              <div class="text">
                                                <i class="fa fa-briefcase px-3"style="color: green"></i>{{ $item->rCompany->company_name }}
                                              </div>
                                            
                                        </td>
                                        <td>{{ $item->title }}</td>
                                        
                                        <td>{{ $item->rJobLocation->name }}</td>
                                        <td>
                                            {{ $item->quantity }}
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
