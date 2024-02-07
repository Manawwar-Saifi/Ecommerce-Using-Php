$(document).ready(function () {
   
    
    $(document).on('click','.category_delete_btn',function (e) {
        e.preventDefault();

        id = $(this).val()

       alert(id);

       swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            method: "POST",
            url: "code.php",
            data: {
                'category_id':id,
                'category_delete_btn':true
            },
            success: function (response) {
                
            }
          });
        } else {
          swal("Your imaginary file is safe!");
        }
      });

    });
   
});