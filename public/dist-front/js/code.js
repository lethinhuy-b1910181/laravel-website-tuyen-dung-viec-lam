$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Bạn có chắc bỏ lưu công việc này?',
                    
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Xóa thành công',
                        '',
                        'success'
                        
                      )
                    }
                  }) 


    });

  });
