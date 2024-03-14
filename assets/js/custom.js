

$(document).ready(function () {

   
    

    $(document).on('click','.increment-btn', function (e) {
        e.preventDefault();
       
        let qty = $(this).closest('.single-product').find('.input-qty').val();
        let value = parseInt(qty,10);
        value  = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
        }
        $(this).closest('.single-product').find('.input-qty').val(value);
      
    });
    $(document).on('click','.decrement-btn', function (e) {
        e.preventDefault();
       
        let qty = $(this).closest('.single-product').find('.input-qty').val();
        let value = parseInt(qty,10);
        value  = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
        }
        $(this).closest('.single-product').find('.input-qty').val(value);
    });




    // ADD TO CART

    $(document).on('click','#AddToCart' ,function () 
    {
        let prod_id = $(this).val();
        let qty = $(this).closest('.single-product').find('.input-qty').val();
        $.ajax({
         method:"POST",
         url: "functions/handleCart.php",
         data: {
             "prod_id":prod_id,
             "prod_qty":qty,
             "scope":"add"
         },
         
                success: function (response) {
                   
                    if(response==200)
                    {
                        alert("Added Successsfully");
                    }
                    else if(response==202)
                    {
                        alert("Product qty updated");
                    }
                    
                    else if(response==100)
                    {
                        window.location.href="login.php";
                        alert("Login To Continue");
                    }
                    else if(response==500)
                    {
                        alert("Something went wrong")
                    }

                    
                    
                    
                    
                }
        }); //Ajax end





    });
    
});