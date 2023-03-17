function addtocart(invoker,product_id){
    var product_name = $(invoker).data('product_name');
    var product_price = $(invoker).data('product_price');
    var quantity = $(invoker).data('quantity');
    var image = $(invoker).data('image');
    $.ajax({
            url: '/add-to-cart-js',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'product_id': product_id,
                'product_name': product_name,
                'product_price': product_price,
                'quantity': quantity,
                'image': image
            },
            success: function (response) {
                if(response=='success' || response.status == 'true'){                    
                    toastr.success("Item added to cart successfully. Go to cart!");                   
                    setTimeout(function(){
                        location.reload();
                    }, 3000);
                }
                if(response == 'login'){                    
                    toastr.info("Please login or Sign Up");                    
                    setTimeout(function(){
                        window.location.replace('/customer/login')
                    }, 5000);

                }
            },
            error: function (error) {
                toastr.error('Failed');
                console.log(error)
            },
        });
}

function cart_price(invoker, i){
   var qty = $('#qty-'+i).val();
   var price = $('#price-'+i).val();
   

   $('#quantity-'+i).val(qty);
   $('#total-'+i).val(price*qty);
   $('#total_text-'+i).text('$ '+price*qty);

   var total = $('#total-'+i).val();
  
}

function remove_cart_product(cart_id, i){
    var con = confirm('are you sure');
    if(con == true){
    $.ajax({
            url: '/customer/remove-to-cart-js',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'id': cart_id
            },
            success: function (response) {
                if(response=='empty'){                    
                    toastr.success("Product not found.");                   
                    // setTimeout(function(){
                    //     location.reload();
                    // }, 3000);
                }
                if(response=='success'){                    
                    toastr.success("Product removed successfully from cart.");  
                    // $('#header_cart-'+i).fadeOut('fast').remove();
                     $('#header_cart-'+i).animate({
                        'margin-left' : "50%",
                        'opacity' : '0',
                        },'fast', function(){
                        $(this).remove();
                    });
                    $('#cart_remove-'+i).animate({
                        'margin-left' : "50%",
                        'opacity' : '0',
                        },'fast', function(){
                        $(this).remove();
                    });        
                    setTimeout(function(){
                        location.reload();
                    }, 5000);
                }
                if(response == 'login'){                    
                    toastr.info("Please login or Sign Up");                    
                    setTimeout(function(){
                        window.location.replace('/customer/login')
                    }, 5000);

                }
            },
            error: function (error) {
                toastr.error('Failed');
                console.log(error)
            },
        });
    }

}

function addToWishlist(invoker,product_id){
    var name = $(invoker).data('name');
    $.ajax({
            url: '/add-to-wishlist-js',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'product_id': product_id
            },
            beforeSend: function() {
                $("button[data-name='"+name+"']").html('<i class="fas fa-spinner fa-spin"></i>');
            },
            success: function (response) {
                if(response=='success'){                    
                    toastr.success("Item added to wishlist successfully. Go to wishlist!");                   
                    setTimeout(function(){
                        location.reload();
                    }, 3000);
                }
                if(response == 'login'){                    
                    toastr.info("Please login or Sign Up");                    
                    setTimeout(function(){
                        window.location.replace('/customer/login')
                    }, 5000);

                }
            },
            error: function (error) {
                toastr.error('Failed');
                console.log(error)
            },
        });
}

function removeToWishlist(invoker,wishlist_id){
    var name = $(invoker).data('name');
    $.ajax({
            url: '/customer/remove-to-wishlist-js',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'wishlist_id': wishlist_id
            },
            beforeSend: function() {
                $("button[data-name='"+name+"']").html('<i class="fas fa-spinner fa-spin"></i>');
            },
            success: function (response) {
                if(response=='success'){                    
                    toastr.success("Item removes successfully from wishlist.");                   
                    setTimeout(function(){
                        location.reload();
                    }, 3000);
                }
                if(response == 'login'){                    
                    toastr.info("Please login or Sign Up");                    
                    setTimeout(function(){
                        window.location.replace('/customer/login')
                    }, 5000);

                }
            },
            error: function (error) {
                toastr.error('Failed');
                console.log(error)
            },
        });
}

function get_state(invoker,type){
   if(invoker==''){
        $("#checkout-bill-state").html('<option value="">Select a state...</option>');
        return false;
    }
    $.ajax({
            url: '/get_state',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'id': invoker,
            },
            success: function (response) {
                if(type == 'billing'){
                    $("#checkout-bill-state").html(response);
                }
                if(type == 'shipping'){
                    $("#checkout-state").html(response);
                }
                if(type == 'address'){
                    $("#checkout-address-state").html(response);
                }
                 if(type == 'editaddress'){
                    $("#checkout-editaddress-state").html(response);
                }
            },
            error: function (error) {
                toastr.error('Failed');
                console.log(error)
            },
        });
}

function get_city(invoker,type){
   if(invoker==''){
        $("#checkout-bill-city").html('<option value="">Select a city...</option>');
        return false;
    }
    $.ajax({
            url: '/get_city',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'id': invoker,
            },
            success: function (response) {
                if(type=='billing'){
                    $("#checkout-bill-city").html(response);
                }
                if(type=='shipping'){
                    $("#checkout-city").html(response);
                }
                if(type == 'address'){
                    $("#checkout-address-city").html(response);
                }
                if(type == 'editaddress'){
                    $("#checkout-editaddress-city").html(response);
                }
            },
            error: function (error) {
                toastr.error('Failed');
                console.log(error)
            },
        });
}

$(function() {
    var e_country = $('#checkout-editaddress-country').val();
    if(e_country){
        $( "#checkout-editaddress-country" ).trigger( "change" );
    }

    var country = $('#checkout-address-country').val();
    if(country){
        $( "#checkout-address-country" ).trigger( "change" );
    }
});
$('#promo-code').keyup(function(){
    $("#apply_promo").html('Apply');
})
$('#apply_promo').click(function(){

    var code = $('#promo-code').val();
    var email = $('#checkout-email').val();
    if(code == ''){
        alert('Please enter code');
        return false;
    }
    if(email != 'undefined' && email == ''){
        alert('Please enter billing address');
        return false;
    }
    $.ajax({
            url: '/customer/apply-promo-code',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'code': code,
                'email': email,
            },
            beforeSend: function() {
                $("#apply_promo").html('<i class="fas fa-spinner fa-spin"></i>');

            },
            success: function (response) {
                if(response.status=='success'){                    
                    toastr.success(response.message);
                    $("#apply_promo").html('Applied');
                    $('#discount').html('<th>Discount(-)</th><td>$ '+response.data.discount+'</td>')
                    $('#grand_total').html('$'+response.data.grandTotal);
                    $('.grandTotals').val(response.data.grandTotal);
                }
                if(response.status=='used'){                    
                    toastr.warning(response.message);
                    $("#apply_promo").html('Apply');
                    $('#discount').html('<th></th><td></td>');
                    // $('#grand_total').html('$'+response.data);
                }
                if(response.status=='expire'){                    
                    toastr.error(response.message);
                    $("#apply_promo").html('Apply');
                    $('#discount').html('<th></th><td></td>');
                    // $('#grand_total').html('$'+response.data);
                }
                if(response.status=='amount_alert'){                    
                    toastr.warning(response.message);
                    $("#apply_promo").html('Apply');
                    $('#discount').html('<th></th><td></td>');
                    // $('#grand_total').html('$'+response.data);
                }
            },
            error: function (error) {
                toastr.error('Failed');
                console.log(error)
            },
        });
});



/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
// autocomplete(document.getElementById("myInput"), source:function(terms,process){
//         var category_id = $('#search__categories option:selected').val();
//         return $.get(path, {terms:terms, category_id:category_id}, function(data){
//             return process(data);
//         });
//       });
var path='/autocomplete';
 $( "#myInput" ).autocomplete({
      source:function(terms,process){        
        var category_id = $('#search__categories option:selected').val();
        return $.get(path, {terms:terms, category_id:category_id}, function(data){
            // var array = $.map(data, function(value, index) {
            //     return [value.prod_name];
            // });
            return process(data);
        });
      }
    });
 $( "#myInput_mobile" ).autocomplete({
      source:function(terms,process){        
        var category_id = $('#search__categories option:selected').val();
        return $.get(path, {terms:terms, category_id:category_id}, function(data){
            // var array = $.map(data, function(value, index) {
            //     return [value.prod_name];
            // });
            return process(data);
        });
      }
    });