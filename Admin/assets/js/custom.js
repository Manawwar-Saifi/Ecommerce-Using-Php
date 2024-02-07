$(document).ready(function () {
   
    
    $(document).on('click','.category_delete_btn',function (e) {
        e.preventDefault();

        id = $(this).val()


       swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover.",
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
                console.log(response);
                if(response==200)
                {
                    swal("Good job!", "Category Deleted Successfully", "success");
                    $('#category_table').load(location.href+" #category_table")
                }
                else if(response==500)
                {
                    swal("Error!", "Something went wrong", "error");
                }
            }
          });
        } 
      });

    });
   
});