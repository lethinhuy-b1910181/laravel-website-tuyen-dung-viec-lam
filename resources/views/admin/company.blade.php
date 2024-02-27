@extends('admin.layout.app')

@section('heading','Tài khoản ứng viên')



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
                                    
                                    <th><center>Tên người dùng</center></th>
                                    <th><center>Email</center></th>
                                    <th><center>Công ty</center></th>
                                    <th><center>Địa chỉ</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $item)
                                    <tr>
                                        <td>
                                            
                                            <a href="/admin/company/status/{{ $item->id }}" class="btn btn-sm btn-{{ $item->status ? 'success' : 'danger' }}">
                                                {{ $item->status ? 'On' : 'Off' }}
                                              </a>
                                              
                                            
                                        </td>
                                        <td>{{ $item->person_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <div class="row justify-content-center align-items-center g-2">
                                                <div class="col-3">
                                            <img src="{{ asset('uploads/'.$item->logo) }}" alt=""class=" w_50">
                                                    
                                                </div>
                                                <div class="col-9">
                                                    {{ $item->company_name }}
                                                </div>
                                            </div>
                                           
                                        </td>
                                        <td>{{ $item->address }}</td>
                                        
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
