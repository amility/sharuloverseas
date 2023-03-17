@php
use App\Models\Products;
use App\Models\ProductImages;
@endphp
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
      <style>
         *{box-sizing: border-box;}
         body{
         font-family: 'Roboto', sans-serif;
         width: 100%;
         }
         .main-tble{
         background: #fff;
         width: 100%;
         }
         .dtls {
         display: flex;
         justify-content: center;
         align-items: center;
         width: 100%;
         }
         .innr-dtls{
         flex: 1;
         }
         
      </style>
   </head>
   <body>
      <div class="main-tble">
         <table style="width: 100%; max-width: 700px; margin: 0 auto; padding: 25px 10px; text-align: center; color: #3d464d; line-height: 10px;">
            <tbody>
               <tr>
                  <td align="center">
                     <h2 style="font-size: 35px;">Thank you</h2>
                     <h5 style="font-weight: 500; font-size: 18px;">Your order has been {{ $order['status']}} successfully. </h5>
                     <p style="background: #f0f0f0; width: 24vh; color: #3d464d; padding: 10px 10px;"><a href="{{ URL::to('/') }}" style="text-decoration: none; font-weight: 500;">Go To Homepage</a></p>
                  </td>
               </tr>
            </tbody>
         </table>
         <table style="width: 100%; max-width: 700px; margin: -25px auto; padding: 25px 10px; text-align: center; color: #3d464d; margin: 0 auto; line-height: 10px;">
            <tbody>
               <tr>
                  <td style="border-right: 1px dashed #e7e7e7; width: 25%;">
                     <p style="font-size: 1vw;">Order number:</p>
                     <p style="font-weight: 600; font-size: 1.1vw;">#{{$order['order']['order_no']}}</p>
                  </td>
                  <td style="border-right: 1px dashed #e7e7e7; width: 25%; ">
                     <p style="font-size: 1vw;">Created at:</p>
                     <p style="font-weight: 600; font-size: 1.1vw; line-height: 1.2;">@php $date = new DateTime($order['order']['order_date']); @endphp
            {{$date->format('F d, Y g:i A')}}</p>
                  </td>
                  <td style="border-right: 1px dashed #e7e7e7; width: 25%;">
                     <p style="font-size: 1vw;">Total:</p>
                     <p style="font-weight: 600; font-size: 1.1vw;">{{CurrencySymbol()}} {{number_format($order['order']['total_price'], 2, '.', ',')}}</p>
                  </td>
                  <td style=" width: 25%;">
                     <p style="font-size: 1vw;">Payment method:</p>
                     <p style="font-weight: 600; font-size: 1.1vw;">{{$order['transaction']['payment_method']}}</p>
                  </td>
               </tr>
            </tbody>
         </table>
         <table style="width: 100%; max-width: 700px; margin: 25px auto 0px; padding: 0px 0px; text-align: center; color: #3d464d; line-height: 10px; border:3px solid #eee; border-bottom: none;" cellspacing="0">
            <tbody>
               <tr>
                
                  <td align="left" style="padding: 15px 0px; border-bottom: 2px solid #eee; padding: 0px 10px;">PRODUCTS</td>
                  <td align="center"  style="padding: 15px 10px; border-bottom: 2px solid #eee;">QTY</td>
                  <td align="right"  style="padding: 15px 10px; border-bottom: 2px solid #eee;">TOTAL</td>
               </tr>
               @foreach($order['orderDetails'] as $orderData)
              @php
                  $productData = Products::where('id', $orderData['product_id'])->first();
                  $productImage = ProductImages::where('product_id', $orderData['product_id'])->first();
              @endphp
               <tr>
                
                  <td align="left" style="padding: 20px 10px; border-bottom:2px solid #eee; font-size: 1.2vw;"><a target="_blank" href="{{ URL::to('/product', $orderData['product_id']) }}">{{$productData['prod_name']}}</a>
                  </td>
                  <td align="center" style="border-bottom: 2px solid #eee; font-size: 1.2vw;">{{$orderData['quantity']}}</td>
                  <td align="right" style="border-bottom: 2px solid #eee; padding: 0px 10px; font-size: 1.2vw;">{{CurrencySymbol()}} {{$orderData['product_price']}}</td>
               </tr>
                @endforeach
            </tbody>
         </table>
         <table style="width: 100%; max-width: 700px; margin: 0px auto; padding: 25px 0px  0px 0px; text-align: center; color: #3d464d; line-height: 10px; border:3px solid #eee; border-top: none; " cellspacing="0" cellpadding="0">
            <tbody>
               <tr>
                  <td align="left" style="line-height: 35px; padding: 0px 10px; font-weight: 600;">Subtotal</td>
                  <td align="right" style="line-height: 35px; padding: 0px 10px; font-weight: 600;">@php $discount = 0; @endphp
                @if($order['order']['discount_price'])
                    @php $discount = $order['order']['discount_price']; @endphp
                @endif
                {{CurrencySymbol()}} {{number_format($order['order']['total_price']-$order['order']['shipping_price']+$discount, 2, '.', ',')}}</td>
               </tr>
               <tr>
                  <td align="left" style="line-height: 35px; padding: 0px 10px; font-weight: 600;" >Shipping</td>
                  <td align="right" style="line-height: 35px; padding: 0px 10px; font-weight: 600;">{{CurrencySymbol()}} {{$order['order']['shipping_price']}}</td>
               </tr>
               @if($order['order']['discount_price'])
               <tr>
                  <td align="left" style="line-height: 35px; padding: 0px 10px; font-weight: 600; border-bottom: 2px solid #eee;">Discount(-)</td>
                  <td align="right" style="line-height: 35px; padding: 0px 10px; font-weight: 600; border-bottom: 2px solid #eee;">{{CurrencySymbol()}} {{number_format($order['order']['discount_price'], 2, '.', ',')}}</td>
               </tr>
               @endif
               <tr>
                  <td align="left" style="line-height: 35px; padding: 10px 10px; font-size: 28px; font-weight: 600;">Total</td>
                  <td align="right" style="line-height: 35px; padding: 10px 10px; font-size: 28px; font-weight: 600;">{{CurrencySymbol()}} {{number_format($order['order']['total_price'], 2, '.', ',')}}</td>
               </tr>
            </tbody>
         </table>
         <table style="width: 100%; max-width: 700px; margin: 0px auto; padding: 25px 0px; text-align: center; color: #3d464d; line-height: 10px;" cellspacing="0" cellpadding="0">
            <tbody>
               <tr>
                  <td>
                     <div class="lst" style="display: flex;
                        justify-content: left;
                        width: 100%;
                        margin: 20px 0px;">
                         @if($order['shippingDetail'] != null)
                        <div class="innr-lst" style="margin-right: 8px; flex: 1;
                           text-align: left;
                           line-height: 22px;
                           border:2px solid #eee;
                           padding: 0px 10px;
                           position: relative;">
                           <p style="width: 160px; float: right; margin: 0; font-size: 13px; padding: 1px 10px; background-color: #eee;">Shipping Address</p>
                           <h4 style="margin-top: 40px;">{{$order['shippingDetail']['first_name'] ." ". $order['shippingDetail']['last_name']}}</h4>
                           <p>
                        @if($order['shippingDetail']['company_name'] != '')
                              <b>Company Name : </b> {{ $order['shippingDetail']['company_name'] }}, <br>
                        @endif

                        @if($order['shippingDetail']['appartment'] != '')
                             <b>Apartment Name : </b> {{ $order['shippingDetail']['appartment'] }}, <br>
                        @endif
                            <b>Block : </b> {{ $order['shippingDetail']['block'] }}, <b>House & Building : </b> {{ $order['shippingDetail']['house_building'] }}, <b>Street : </b> {{ $order['shippingDetail']['street_address'] }} <br>
                             <b>Area & Country : </b> {{ $order['shippingDetail']['town_city'] .", ". getCountryName($order['shippingDetail']['country']) ." ". $order['shippingDetail']['postcode_zip'] }}
                           </p>
                           <p><span style="font-size: 12px;">Phone Number<br></span>
                             {{ $order['shippingDetail']['phone'] }}
                           </p>
                           <p><span style="font-size: 12px;">Email Address<br></span>
                              {{ $order['shippingDetail']['email_address'] }}
                           </p>
                        </div>
                        @endif
                        @if($order['billingDetail'] != null)
                        <div class="innr-lst" style="margin-left: 8px; flex: 1;
                           text-align: left;
                           line-height: 22px;
                           border:2px solid #eee;
                           padding: 0px 10px;
                           position: relative;">
                           <p style="width: 160px; float: right; margin: 0; font-size: 13px; padding: 1px 10px; background-color: #eee;">Billing Address</p>
                           <h4 style="margin-top: 40px;">{{$order['billingDetail']['first_name'] ." ". $order['billingDetail']['last_name']}}</h4>
                           <p>
                          @if($order['billingDetail']['company_name'] != '')
                             <b>Company Name : </b> {{ $order['billingDetail']['company_name'] }}, <br>
                          @endif

                          @if($order['billingDetail']['appartment'] != '')
                            <b>Apartment Name : </b>  {{ $order['billingDetail']['appartment'] }}, <br>
                          @endif
                            <b>Block : </b> {{ $order['billingDetail']['block'] }}, <b>House & Building : </b> {{ $order['billingDetail']['house_building'] }}, <b>Street : </b> {{ $order['billingDetail']['street_address'] }} <br>
                            <b>Area & Country : </b>  {{ $order['billingDetail']['town_city'] .", ". getCountryName($order['billingDetail']['country']) ." ". $order['billingDetail']['postcode_zip'] }}
                           </p>
                           <p><span style="font-size: 12px;">Phone Number<br></span>
                              {{ $order['billingDetail']['phone'] }}
                           </p>
                           <p><span style="font-size: 12px;">Email Address<br></span>
                              {{ $order['billingDetail']['email_address'] }}
                           </p>
                        </div>
                         @endif
                     </div>
                  </td>
               </tr>
            </tbody>
         </table>
         <table style="width: 100%; max-width: 700px; margin: 0 auto; padding: 25px 10px; text-align: center; color: #3d464d; line-height: 10px;">
            <tbody>
               <tr>
                  <td align="center">
                      <div style="margin-top: 20px;">
                         <div align="left">
                             <p style="margin-top: 20px;">Best Regards,</p>
                             <p>Gun Team</p>
                         </div>
                     </div>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>     
   </body>
</html>