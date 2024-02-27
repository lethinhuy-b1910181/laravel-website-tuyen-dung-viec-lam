

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('front.layout.styles')
        <!-- All Javascripts -->
        @include('front.layout.scripts')
</head>
<body>
    <div class="container-fluid" style="background: #f3f5f7">
        <div class="container" id="view-file">
            <div class="row content">
                <div class="col-md-8">
                    <iframe src="/uploads/{{ $data->file }}" width="100%" height="530px"></iframe>
                </div>
                <div class="col-md-4">
                    <div class="header">
                        <div class="col-md-10" style="display: flex; justify-content: center; align-items:end">
                            <h4>Thông Tin Chung</h4>

                        </div>
                        <div class="col-md-2" style="display: flex; justify-content: end; align-items:start; font-size:24px">
                            <a href="{{ route('company_candidate_list', $data->job_id) }}" style="color: red">
                                &times;
                            </a>
                        </div>
                    </div>
                    <div class="body ">
                        <div class="row ">
                            <div class="col-md-3">
                                <img style="border-radius: 50%; width:80px; height:80px"  alt="image" src="{{ asset('uploads/'.$data->rCandidate->photo) }}" class="rounded-circle-custom">

                            </div>
                            <div class="col-md-9">
                                <div class="text">
                                    {{ $data->name }}        

                                </div>
                                <div class="text">
                                {{ $data->email }}        
                                    
                                </div>
                                <div class="text">
                                {{ $data->phone }}  
                                    
                                </div>
                            </div>
                        </div>
                        @if($data->letter != '')
                        <div class="row justify-content-center align-items-center g-2" style="padding-top:10px">
                            <i>{!! $data->letter !!}</i>
                        </div>
                        @endif
                    </div>
                    <hr>
                    <div class="note">
                        <h5><b>Đánh giá CV</b></h5>
                        <div class="row justify-content-center align-items-center g-2" style="padding: 20px">
      
                            <div class="col">
                                <a class="btn btn-outline-success change-status success-status" data-jobid="{{ $data->id }}" data-status="1">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" {{ $data->status == 1 ? 'checked' : '' }}>
                                    Phù hợp
                                </a>
                            </div>
                            <div class="col">
                                <a class="btn btn-outline-danger change-status danger-status" data-jobid="{{ $data->id }}" data-status="0">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"{{ $data->status == 0 ? 'checked' : '' }}>
                                    Không phù hợp
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('front.layout.scripts_footer')
    <script>
        $(document).ready(function () {
            $('.change-status').on('click', function (e) {
                e.preventDefault();
    
                var jobId = $(this).data('jobid');
                var status = $(this).data('status');
    
                // Gỡ bỏ thuộc tính checked từ tất cả các radio button trước khi thêm nó vào button được click
                $('input[name="inlineRadioOptions"]').prop('checked', false);
                $(this).find('input[type="radio"]').prop('checked', true);
    
                // Thực hiện ajax request
                $.ajax({
                    type: 'POST',
                    url: '{{ route("change-job-status", ":id") }}'.replace(':id', jobId),
                    data: { _token: '{{ csrf_token() }}', status: status },
                    success: function (response) {
                        // Xử lý thành công, có thể cập nhật giao diện hoặc hiển thị thông báo
                        console.log(response.message);
                    },
                    error: function (error) {
                        // Xử lý lỗi
                        console.log(error.responseJSON.message);
                    }
                });
            });
        });
    </script>
</body>
</html>