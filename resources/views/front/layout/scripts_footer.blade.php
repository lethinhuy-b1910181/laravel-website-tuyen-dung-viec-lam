<script src="{{ asset('dist-front/js/custom.js') }}"></script>
{{-- <script src="{{ asset('dist-front/js/owlcarousel/jquery.min.js') }}"></script> --}}
<script src="{{ asset('dist-front/js/owlcarousel/owl.carousel.js') }}"></script>
<script src="{{ asset('dist-front/js/popper.min.js') }}"></script>
<script src="{{ asset('dist-front/js/jobdata.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('dist-front/js/code.js') }}"></script> 
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}


<script type="text/javascript">
    $(document).ready(function() {
        $('.bookmark-button').click(function() {
            var button = $(this);
            var productId = button.data('productid');
            var icon = button.find('i');
            var saveStatus = button.data('save');
            var url = "{{ route('candidate_bookmark_add', ['id' => ':productId']) }}";
            url = url.replace(':productId', productId);
            $.ajax({
                type: 'GET',
                url: url,
                success: function(response) {
                    if (saveStatus === 'fa fa-heart') {
                        icon.removeClass('fa fa-heart').addClass('fa fa-heart-o');
                        button.data('save', 'fa fa-heart-o');
                    } else {
                        icon.removeClass('fa fa-heart-o').addClass('fa fa-heart');
                        button.data('save', 'fa fa-heart');
                    }
                }
            });
        });
    });
    $(document).ready(function() {
        $('.bookmark-button-text').click(function() {
            var button = $(this);
            var productId = button.data('productid');
            var icon = button.find('i');
            var saveStatus = button.data('save');
            var textSpan = button.find('.bookmark-text');
            var url = "{{ route('candidate_bookmark_add', ['id' => ':productId']) }}";
            url = url.replace(':productId', productId);
            $.ajax({
                type: 'GET',
                url: url,
                success: function(response) {
                    if (saveStatus === 'fa fa-heart') {
                        icon.removeClass('fa fa-heart').addClass('fa fa-heart-o');
                        button.data('save', 'fa fa-heart-o');
                        textSpan.text('Lưu tin');
                        
                    } else {
                        icon.removeClass('fa fa-heart-o').addClass('fa fa-heart');
                        button.data('save', 'fa fa-heart');
                        textSpan.text('Đã lưu');
                    }
                }
            });
        });
    });
</script>

{{-- <script type="text/javascript">
    $(document).ready(function() {
        $('.bookmark-button-text').click(function() {
            var button = $(this);
            var productId = button.data('productid');
            var icon = button.find('i');
            var saveStatus = button.data('save');
            var textSpan = button.find('.bookmark-text');
            var url = "{{ route('candidate_bookmark_add', ['id' => ':productId']) }}";
            url = url.replace(':productId', productId);
            $.ajax({
                type: 'GET',
                url: url,
                success: function(response) {
                    if (saveStatus === 'fa fa-heart') {
                        icon.removeClass('fa fa-heart').addClass('fa fa-heart-o');
                        button.data('save', 'fa fa-heart-o');
                        textSpan.text('Lưu tin');
                        
                    } else {
                        icon.removeClass('fa fa-heart-o').addClass('fa fa-heart');
                        button.data('save', 'fa fa-heart');
                        textSpan.text('Đã lưu');
                    }
                }
            });
        });
    });
</script> --}}

{{-- <script>
    $(document).ready(function() {

    $('.delete-button').click(function(e) {
        e.preventDefault(); // Ngăn chặn chuyển hướng đến liên kết

        var button = $(this);
        var jobId = button.data('productid');
        
        $.ajax({
            type: 'GET',
            url: url,
            success: function(response) {
                var jobContainer = button.closest('.job-container');
                jobContainer.remove(); // Xóa phần tử job-container
            }
        });
    });
});

</script> --}}


