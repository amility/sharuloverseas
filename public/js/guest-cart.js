// $(function() {
// 	$('.addcart').click(function(event){
// 	  	event.preventDefault();
//       	let countTotal = $(".productcount").val();
//       	let productId  = $(".productId").val();
//       	let _token   = $('meta[name="csrf-token"]').attr('content');

//       	$.ajax({
// 	        url: "/add-to-cart-guest-js",
// 	        type:"POST",
// 	        data:{
// 	          productId:productId,
// 	          quantity:	countTotal,
// 	          _token: _token
// 	        },
// 	        success:function(response){
// 	          if(response) {
// 	          	$('.cart-count').text(response.cartCount);
// 	            $('.success').html('<div class="alert alert-success">'+response.message+'</div>');
// 	          }
// 	        },
//     	});
// 	});
// });