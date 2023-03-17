<style>
    .textName_back
,.textNameTwo_back
,.textNameThree_back
,.clipArtRemove_back
,.uploadRemove_back
,.colorRemove_back
,.fontRemove_back{
      display:none;
   }
   .clip_im_back{
      display: none; 
   position: absolute;
    top: 0px;
    margin: 38px 100px auto;
    left: 0;
    text-align: center;
   }
   .clip_text_back{
      position: absolute;
    top: 50px;
    font-size: 21px;
    left: 0;
    text-align: center;
    z-index: 1000000000;
   }
   .clip_im1_back{
   display: none; 
   position: relative;
   top: -210px;
   right: -22px;
   width: 250%;
   }
   .output_back{
      display: none; 
   position: absolute;
    top: 0px;
    
    margin: 38px 100px auto;
    left: 0;
    text-align: center;
   }
   .clip_im2_back{
   display: none; 
   position: relative;
   top: -160px;
   right: 14px;
   width: 200%;
   }
   .clip_im3_back{
   display: none; 
   position: relative;
   top: -150px;
   right: -160px;
   width: 200%;
   }
</style>
<style>
      .resizable-div_back {
         width: 40px;
         height: 40px;
         text-align: center;
         /* padding: 20px; */
         border: 2px dotted grey;
         background:white;
      }
      .resizable-div1_back {
         width: 40px;
         height: 40px;
         text-align: center;
         /* padding: 20px; */
         border: 2px dotted grey;
         background:white;
      }
      .ui-wrapper {
         overflow: inherit!important;
         
      }

</style>

<div id="menu1"  class="container-fluid tab-pane ">
                     <br>
                     <div id="Front" class="tabcontent">
                        <div class="container-fluid">
                           <div class="row">
                              <div class="col-md-6">
                                    <div class="row">

                                    <!-- // -->
                                       <div class="col-md-12 mms_back">
                                           <div class="">
                                                <img class=" w-100"
                                                 src="{{Asset($productImageLists->image)}}"
                                                 alt="Girl in a jacket">
                                                <div class="column clip_text ">
                                                   <p class="title_one_back" style="position:relative; cursor:move;"></p>
                                                   
                                                   <p class="title_two_back" style="position:relative;cursor:move;"></p>
                                                  
                                                   <p class="title_three_back" style="position:relative;cursor:move;"></p>
                                                </div>
                                                 <div class="column clip_im_back " width="160px"> 
                                                      <img class="resizable-div_back " 
                                                      src="" alt="Snow" id="clipImage_back" style="width:80px; cursor:move;"> 
                                                   </div>
                                                <div class="column output_back" width="160px"> 
                                                      <img id="output_back" class="resizable-div1_back " style="width:80px;cursor:move;" />
                                                </div>
                                               
                                           </div>
                                            
                                        </div>
                                    <!-- // -->

                                       
                                        <div class="col-md-12 mt-4">
                                            <div class="">
                                                <H5>Add Features : -</H5>
                                                <span class="text_one_back"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm textName_back'>Remove</button>
                                                <br>
                                                <span class="text_two_back"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm textNameTwo_back'>Remove</button>
                                              
                                                <br>
                                                <span class="text_three_back"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm textNameThree_back'>Remove</button>
                                              
                                                <br>
                                                <span class="color_one_back"></span>
                                                <span class="color_price_back"></span>
                                                <span class="color_prices_back d-none"></span>

                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm colorRemove_back'>Remove</button>
                                                <br>
                                                <span class="font_one_back"></span>
                                                <span class="font_price_back"></span>
                                                <span class="font_prices_back d-none"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm fontRemove_back'>Remove</button>
                                              
                                                <br>

                                                <span class="clip_art_back"></span>
                                                <span class="clip_art_price_back"></span>
                                                <span class="clip_art_prices_back d-none"></span>
                                                
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm clipArtRemove_back'>Remove</button>
                                              
                                                <br>
                                                <span class="upload_image_back"></span>
                                                <span class="upload_images_back"></span>

                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm uploadRemove_back'>Remove</button>
                                              
                                                

                                            </div>
                                        </div>
                                    </div>
                              </div>
                              <div class="col-md-6">

                                 <div id="accordion">
                                    <div class="card">
                                       <div class="card-header" data-toggle="collapse"
                                          data-target="#collapseOne" aria-expanded="true">
                                          <span><a class="card-link" data-toggle="collapse"
                                             href="#collapseOne">
                                          Text
                                          </a></span>
                                          <span class="accicon"><i
                                             class="fas fa-angle-down rotate-icon"></i></span>
                                       </div>
                                       <div id="collapseOne" class="collapse show"
                                          data-parent="#accordion">
                                          <div class="card-body">
                                             <div class="accordion-body">
                                                
                                                <div class="form-group">
                                                   
                                                   <div class="row">
                                                      <div class="col-md-7">
                                                      <span>
                                                   Text Line One </span>
                                                   <input class="form-control" name="name"
                                                      type="text" id="text_title_back" maxlength="15">
                                                   <p>15 character(s) left</p>
                                                         <!-- Top
                                                         <input type="text" class="text_top_back form-control" name="top"> -->

                                                      </div>
                                                      
                                                      <!-- <div class="col-md-3">
                                                         Bottom
                                                         <input type="text" class="text_bottom_back form-control" name="bottom">

                                                      </div>
                                                      <div class="col-md-2">
                                                         Left
                                                         <input type="text" class="text_left_back form-control" name="left">
                                                      </div>
                                                      <div class="col-md-2">
                                                         Right
                                                         <input type="text" class="text_right_back form-control" name="right">
                                                      </div> -->
                                                      <div class="col-md-2">
                                                         Size
                                                         <input type="text" class="text_size_back form-control" placeholder="20" name="size">
                                                      </div>
                                                      <div class="col-md-3">
                                                         Rotate
                                                            <input type="number" class="textOne_rotate_back form-control"  placeholder="0" name="width">
                                                         </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                    
                                                      <div class="row">
                                                      <div class="col-md-7">
                                                      <span>
                                                   Text Line Two </span>
                                                   <input class="form-control" name="name"
                                                      type="text" id="text_title_two_back" maxlength="15">
                                                         <!-- Top
                                                         <input type="text" class="text_top1_back form-control" name="top"> -->

                                                      </div>
                                                      <!-- <div class="col-md-3">
                                                         Bottom
                                                         <input type="text" class="text_bottom1_back form-control" name="bottom">

                                                      </div>
                                                      <div class="col-md-2">
                                                         Left
                                                         <input type="text" class="text_left1_back form-control" name="left">
                                                      </div>
                                                      <div class="col-md-2">
                                                         Right
                                                         <input type="text" class="text_right1_back form-control" name="right">
                                                      </div> -->
                                                      <div class="col-md-2">
                                                         Size
                                                         <input type="text" placeholder="20" class="text_size1_back form-control" name="size">
                                                      </div>
                                                      <div class="col-md-3">
                                                         Rotate
                                                            <input type="number" class="textTwo_rotate_back form-control"  placeholder="0" name="width">
                                                         </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   
                                                      <div class="row">
                                                         <div class="col-md-7">
                                                         <span>
                                                   Text Line Three </span>
                                                   <input class="form-control" name="name"
                                                      type="text" id="text_title_three_back" maxlength="15">
                                                            <!-- Top
                                                            <input type="text" class="text_top2_back form-control" name="top"> -->

                                                         </div>
                                                         <!-- <div class="col-md-3">
                                                            Bottom
                                                            <input type="text" class="text_bottom2_back form-control" name="bottom">

                                                         </div>
                                                         <div class="col-md-2">
                                                            Left
                                                            <input type="text" class="text_left2_back form-control" name="left">
                                                         </div>
                                                         <div class="col-md-2">
                                                            Right
                                                            <input type="text" class="text_right2_back form-control" name="right">
                                                         </div> -->
                                                         <div class="col-md-2">
                                                         Size
                                                            <input type="text" placeholder="20" class="text_size2_back form-control" name="size">
                                                         </div>
                                                         <div class="col-md-3">
                                                         Rotate
                                                            <input type="number" class="textThree_rotate_back form-control"  placeholder="0" name="width">
                                                         </div>
                                                      </div>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label for="">Choose Text Font / Color</label>
                                                    <select name="text_choose" id="" class="form-control" onchange="myFunctionText(this.value)">
                                                        <option value="">Select</option>
                                                        <option value="1">Font</option>
                                                        <option value="2">Color</option>
                                                    </select>
                                                   
                                                </div> -->
                                                <div class="form-group text_font_back">
                                                    <span>
                                                        Font
                                                   </span>
                                                   <select name="font_id" id="font_id_back"
                                                      class="form-control font_r_back" onchange="myFunctionFontBack(this.value)">
                                                      <option value="">Select Font
                                                      </option>
                                                      @foreach($text as $key=>$textData)
                                                      <option 
                                                      id="font_pr_back{{$textData->text_id}}"
                                                       price="{{$textData->price}}"
                                                       name="{{$textData->doc}}"
                                                       fname="{{$textData->name}}"
                                                       value="{{$textData->text_id}}"
                                                      >{{$textData->name}}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                                <div class="form-group text_color_back">
                                                    <span>Color</span>
                                                   <select name="font_id" class="form-control color_r_back" onchange="myFunctionColor_back(this.value)">
                                                      <option value="" price="">Select Color
                                                      </option>
                                                      @foreach($color as $key=>$colorData)
                                                      <option id="clr_pr_back{{$colorData->color_id}}" price="{{$colorData->price}}" name="{{$colorData->name}}"
                                                       value="{{$colorData->color_id}}">{{$colorData->name}}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="card">
                                       <div class="card-header" data-toggle="collapse"
                                          data-target="#collapseTwo" aria-expanded="true">
                                          <span><a class="collapsed card-link"
                                             data-toggle="collapse" href="#collapseTwo">
                                          Clip Arts
                                          </a></span>
                                          <span class="accicon"><i
                                             class="fas fa-angle-down rotate-icon"></i></span>
                                       </div>
                                       <div id="collapseTwo" class="collapse "
                                          data-parent="#accordion">
                                          <div class="card-body">
                                             <div class="row">
                                                <div class="col-md-12">
                                                <div class="accordion-body">
                                                <h6>Please choose one design:</h6>
                                                @foreach($clipArt as $key=>$clipData)
                                                <div class="column">
                                                   <img class="w-25 float-left"
                                                      src="{{$clipData->image}}"
                                                      alt="Snow" id="clipName_back{{$clipData->clip_id}}" clip_name="{{$clipData->name}}" onclick="myFunction_back(this.src,{{$clipData->clip_id}},{{$clipData->price}},this.clip_name)"> 
                                                </div>
                                                @endforeach
                                             </div>
                                                </div>
                                                <div class="col-md-12">
                                                   <div class="row">
                                                         <!-- <div class="col-md-2">
                                                            Top
                                                            <input type="text" class="clip_top_back form-control" name="top">

                                                         </div>
                                                         <div class="col-md-3">
                                                            Bottom
                                                            <input type="text" class="clip_bottom_back form-control" name="bottom">

                                                         </div>
                                                         <div class="col-md-2">
                                                            Left
                                                            <input type="text" class="clip_left_back form-control" name="left">
                                                         </div>
                                                         <div class="col-md-2">
                                                            Right
                                                            <input type="text" class="clip_right_back form-control" name="right">
                                                         </div> -->
                                                         <div class="col-md-2">
                                                         Width
                                                            <input type="text" placeholder="120" class="clip_width_back form-control" name="width">
                                                         </div>
                                                         <div class="col-md-4">
                                                         Rotate
                                                            <input type="number" class="clip_rotate_back form-control"  placeholder="0" name="width">
                                                         </div>
                                                   </div>
                                                </div>
                                             </div>
                                            
                                             
                                          </div>
                                       </div>
                                    </div>
                                    <div class="card">
                                       <div class="card-header" data-toggle="collapse"
                                          data-target="#collapseThree" aria-expanded="true">
                                         
                                          <span><a class="collapsed card-link"
                                             data-toggle="collapse" href="#collapseThree">
                                          Upload images
                                          </a></span>
                                          <span class="accicon"><i
                                             class="fas fa-angle-down rotate-icon"></i></span>
                                       </div>
                                       <div id="collapseThree" class="collapse"
                                          data-parent="#accordion">
                                         <div class="row">
                                             <div class="col-md-12">
                                                <div class="card-body">
                                                   <div class="accordion-body">
                                                      <div class="form-group">
                                                         <label for="image_path"
                                                            class="textfont">Upload Your Own
                                                         designs :</label>
                                                         <input type="file" accept="image/*" class="uploadImg_back" onchange="loadFile_back(event)">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="row">
                                                         <!-- <div class="col-md-2">
                                                            Top
                                                            <input type="text" class="upload_top_back form-control" name="top">

                                                         </div>
                                                         <div class="col-md-3">
                                                            Bottom
                                                            <input type="text" class="upload_bottom_back form-control" name="bottom">

                                                         </div>
                                                         <div class="col-md-2">
                                                            Left
                                                            <input type="text" class="upload_left_back form-control" name="left">
                                                         </div>
                                                         <div class="col-md-2">
                                                            Right
                                                            <input type="text" class="upload_right_back form-control" name="right">
                                                         </div> -->
                                                         <div class="col-md-2">
                                                         Width
                                                            <input type="text" placeholder="120" class="upload_width_back form-control" name="width">
                                                         </div>
                                                         <div class="col-md-4">
                                                         Rotate
                                                            <input type="number" class="upload_rotate_back form-control"  placeholder="0" name="width">
                                                         </div>
                                                   </div>
                                                </div>
                                             </div>
                                         </div>
                                       </div>
                                      
                                    </div>
                                  
                                 </div>
                                 <div class="ml-3 my-3 text-right">
                                    <button type="button" class="btn responsive-content cancel"
                                       onclick="closeForm()">Skip
                                    & Save With Front</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @push('scripts')
                  <script>
   function myFunction_back(id,name,price,names) {
       $('.clip_im_back').show();
       $('#clipImage_back').attr("src",id);
      //  $('#clipImage').attr("src",clip_name);
      var clpName = $('#clipName_back'+name).attr("clip_name");
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price_back').text(clip_actual_price);
       $('.clip_art_back').html("Clip Art Name : - " + clpName);
       $('.clip_art_price_back').html(" , Clip Art Price : - " + price);
       $('.clipArtRemove_back').show();
       $('div#slider_back1').show();

       $('.resizable-div_back').css({"border":"2px dotted grey","background":"white"});
         $('.ui-icon').css("display","block");

         $('.clip_art_prices_back').html(price);
         myFunctionClip_back(price)
      }
      $('.clipArtRemove_back').click(function(){
         $('.clip_art_back,.clip_art_price_back').empty();
         $('#clipImage_back,.clip_im_back').hide();
         $('.clipArtRemove_back').hide();
         // p_amount
         var price = 0;
         $('.clip_art_prices_back').html('');
         myFunctionClipRemove_back(price)
         // p_amount

      })


      // p_amount
      function myFunctionClip_back(price) {
       var actual_price = parseFloat($('.c_pric').text());

         var font_pri = parseFloat($('.font_prices').text());
         var color_pri = parseFloat($('.color_prices').text());
         var upload_pri = parseFloat($('.upload_images').text());
         var clip_pri = parseFloat($('.clip_art_prices').text());

         var color_pri_back = parseFloat($('.color_prices_back').text());
            var font_prices_back = parseFloat($('.font_prices_back').text());
            var upload_images_back = parseFloat($('.upload_images_back').text());
            if(upload_images_back)
            {
               var upload_images_backs = upload_images_back;
            }
            else
            {
               var upload_images_backs = 0;
            }
            if(font_prices_back)
            {
               var font_prices_backs = font_prices_back;
            }
            else
            {
               var font_prices_backs = 0;
            }
           
           

         //
            if(clip_pri)
            {
               var clip_pris = clip_pri;
            }
            else
            {
               var clip_pris = 0;
            }
            if(color_pri_back)
            {
               var color_pri_backs = color_pri_back;
            }
            else
            {
               var color_pri_backs = 0;
            }
            if(font_pri)
            {
               var font_pris = font_pri;
            }
            else
            {
               var font_pris = 0;
            }
            if(color_pri)
            {
               var color_pris = color_pri;
            }
            else
            {
               var color_pris = 0;
            }
            if(upload_pri)
            {
               var upload_pris = upload_pri;
            }
            else
            {
               var upload_pris = 0;
            }
       var clip_actual_price = parseFloat(price);
       var aap = clip_actual_price+actual_price+font_pris
       +color_pris+upload_pris+color_pri_backs
       +clip_pris+upload_images_backs+font_prices_backs;
       $('.c_price').text(aap);
       $('.p_amount').val(aap);
   }
   function myFunctionClipRemove_back(price) {
         var actual_price = parseFloat($('.c_pric').text());

         var font_pri = parseFloat($('.font_prices').text());
         var color_pri = parseFloat($('.color_prices').text());
         var upload_pri = parseFloat($('.upload_images').text());
         var clip_pri = parseFloat($('.clip_art_prices').text());

         var color_pri_back = parseFloat($('.color_prices_back').text());
         var font_prices_back = parseFloat($('.font_prices_back').text());
         var upload_images_back = parseFloat($('.upload_images_back').text());
            if(upload_images_back)
            {
               var upload_images_backs = upload_images_back;
            }
            else
            {
               var upload_images_backs = 0;
            }
            if(font_prices_back)
            {
               var font_prices_backs = font_prices_back;
            }
            else
            {
               var font_prices_backs = 0;
            }
           

         if(clip_pri)
            {
               var clip_pris = clip_pri;
            }
            else
            {
               var clip_pris = 0;
            }
            if(color_pri_back)
            {
               var color_pri_backs = color_pri_back;
            }
            else
            {
               var color_pri_backs = 0;
            }
            if(font_pri)
            {
               var font_pris = font_pri;
            }
            else
            {
               var font_pris = 0;
            }
            if(color_pri)
            {
               var color_pris = color_pri;
            }
            else
            {
               var color_pris = 0;
            }
            if(upload_pri)
            {
               var upload_pris = upload_pri;
            }
            else
            {
               var upload_pris = 0;
            }
       var clip_actual_price = parseFloat(price);
       var aap = clip_actual_price+actual_price+font_pris
       +color_pris+upload_pris+color_pri_backs
       +clip_pris+upload_images_backs+font_prices_backs;
       $('.c_price').text(aap);
   }
   // end p_amount




//    text
   $('#text_title_back').keyup("on",function(){
       var text = $(this).val();
       $('.title_one_back').text(text);
       $('.title_one_back').show();
       $('.text_one_back').html("Text First : - " + text );
       $('.textName_back').show();
       $('.text_one_back').show();
   })
   $('.textName_back').click(function(){
      $('.text_one_back,.title_one_back').hide();
      $('#text_title_back').val('');
      $('.textName_back').hide();

   })

   $('#text_title_two_back').keyup("on",function(){
       var text = $(this).val();
       $('.title_two_back').text(text);
       $('.title_two_back').show();
       $('.text_two_back').show();

       $('.text_two_back').html("Text Second : - " + text);
       $('.textNameTwo_back').show();

   })
   $('.textNameTwo_back').click(function(){
      $('.text_two_back,.title_two_back').hide();
      $('#text_title_two_back').val('');
      $('.textNameTwo_back').hide();

   })

   $('#text_title_three_back').keyup("on",function(){
       var text = $(this).val();
       $('.title_three_back').show();
       $('.text_three_back').show();
       $('.title_three_back').text(text);
       $('.text_three_back').html("Text Third : - " + text);
       $('.textNameThree_back').show();

   })
   $('.textNameThree_back').click(function(){
      $('.text_three_back,.title_three_back').hide();
      $('#text_title_three_back').val('');
      $('.textNameThree_back').hide();

   })
   function myFunctionColor_back(id)
   {
     var color = $('#clr_pr_back'+id).attr('name')
     var price = $('#clr_pr_back'+id).attr('price')
   //   var colr = "color:"+color;
     $('.title_one_back').css("color",color);
     $('.title_two_back').css("color",color);
     $('.title_three_back').css("color",color);
     $('.color_one_back').html("Color Name : - " + color);
     $('.color_price_back').html(", Color Price : - " + price);
     $('.colorRemove_back').show();
     $('.color_one_back').show();
     $('.color_price_back').show();

     $('.color_prices_back').html(price);
     myFunctionCol_back(price)
   }
   $('.colorRemove_back').click(function(){
      $('.title_one_back').css("color","inherit");
     $('.title_two_back').css("color","inherit");
     $('.title_three_back').css("color","inherit"); 
          $('.color_r_back').val('');
      $('.colorRemove_back,.color_one_back,.color_price_back').hide();
      // p_amount
      $('.color_prices_back').html('');
            var price = 0;
            myFunctionColRemove_back(price)
            // end p_amount
   })
    // p_amount
    function myFunctionCol_back(price) {
         var actual_price = parseFloat($('.c_pric').text());

         var font_pri = parseFloat($('.font_prices').text());
         var clip_pri = parseFloat($('.clip_art_prices').text());
         var upload_pri = parseFloat($('.upload_images').text());
         var color_pri = parseFloat($('.color_prices').text());
         //
         //   var color_pri_back = parseFloat($('.color_prices_back').text());
            var clip_art_back = parseFloat($('.clip_art_prices_back').text());
            var font_prices_back = parseFloat($('.font_prices_back').text());
            var upload_images_back = parseFloat($('.upload_images_back').text());
            if(upload_images_back)
            {
               var upload_images_backs = upload_images_back;
            }
            else
            {
               var upload_images_backs = 0;
            }
            if(font_prices_back)
            {
               var font_prices_backs = font_prices_back;
            }
            else
            {
               var font_prices_backs = 0;
            }
            if(clip_art_back)
            {
               var clip_art_backs = clip_art_back;
            }
            else
            {
               var clip_art_backs = 0;
            }
           

         //
            if(font_pri)
            {
               var font_pris = font_pri;
            }
            else
            {
               var font_pris = 0;
            }
            if(clip_pri)
            {
               var clip_pris = clip_pri;
            }
            else
            {
               var clip_pris = 0;
            }
            if(upload_pri)
            {
               var upload_pris = upload_pri;
            }
            else
            {
               var upload_pris = 0;
            }
            if(color_pri)
            {
               var color_pris = color_pri;
            }
            else
            {
               var color_pris = 0;
            }
       var clip_actual_price = parseFloat(price);
       var aap = clip_actual_price+actual_price+font_pris
       +clip_pris+upload_pris+color_pris
       +upload_images_backs+font_prices_backs+clip_art_backs;
       $('.c_price').text(aap);
       $('.p_amount').val(aap);
   }
   function myFunctionColRemove_back(price) {
         var actual_price = parseFloat($('.c_pric').text());

         var font_pri = parseFloat($('.font_prices').text());
         var color_pri = parseFloat($('.color_prices').text());
         var clip_pri = parseFloat($('.clip_art_prices').text());
         var upload_pri = parseFloat($('.upload_images').text());
         //
            var clip_art_back = parseFloat($('.clip_art_prices_back').text());
            var font_prices_back = parseFloat($('.font_prices_back').text());
            var upload_images_back = parseFloat($('.upload_images_back').text());
            if(upload_images_back)
            {
               var upload_images_backs = upload_images_back;
            }
            else
            {
               var upload_images_backs = 0;
            }
            if(font_prices_back)
            {
               var font_prices_backs = font_prices_back;
            }
            else
            {
               var font_prices_backs = 0;
            }
            if(clip_art_back)
            {
               var clip_art_backs = clip_art_back;
            }
            else
            {
               var clip_art_backs = 0;
            }
           
         //

         if(color_pri)
            {
               var color_pris = color_pri;
            }
            else
            {
               var color_pris = 0;
            }
            if(font_pri)
            {
               var font_pris = font_pri;
            }
            else
            {
               var font_pris = 0;
            }
            if(clip_pri)
            {
               var clip_pris = clip_pri;
            }
            else
            {
               var clip_pris = 0;
            }
            if(upload_pri)
            {
               var upload_pris = upload_pri;
            }
            else
            {
               var upload_pris = 0;
            }
       var clip_actual_price = parseFloat(price);
       var aap = clip_actual_price+actual_price
       +font_pris+clip_pris+upload_pris+color_pris
       +upload_images_backs+font_prices_backs+clip_art_backs;
       $('.c_price').text(aap);
   }
   // end p_amount

   // text line one
   $('.text_size_back').keyup("on",function(){
       var size = $(this).val();
       var size = size+"px";
      //  $('.title_one').attr("style",size);
       $('.title_one_back').css("font-size", size);

   })
   $('.text_right_back').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
      
       $('.title_one_back').css("right", right);

   })
   $('.text_left_back').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.title_one_back').css("left", left);

   })
   $('.text_top_back').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.title_one_back').css("top", top);

   })
   $('.text_bottom_back').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.title_one_back').css("bottom", bottom);

   })

   //
   $('.text_size1_back').keyup("on",function(){
       var size = $(this).val();
       var size = size+"px";
       $('.title_two_back').css("font-size", size);

   })
   $('.text_right1_back').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('.title_two_back').css("right", right);

   })
   $('.text_left1_back').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.title_two_back').css("left", left);

   })
   $('.text_top1_back').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.title_two_back').css("top", top);

   })
   $('.text_bottom1_back').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.title_two_back').css("bottom", bottom);

   })

   //
   $('.text_size2_back').keyup("on",function(){
       var size = $(this).val();
       var size = size+"px";
       $('.title_three_back').css("font-size", size);

   })
   $('.text_right2_back').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('.title_three_back').css("right", right);

   })
   $('.text_left2_back').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.title_three_back').css("left", left);

   })
   $('.text_top2_back').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.title_three_back').css("top", top);

   })
   $('.text_bottom2_back').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.title_three_back').css("bottom", bottom);

   })
   //
   $('.clip_width_back').keyup("on",function(){
       var width = $(this).val();
       var width = width+"px";
         // alert(width);
       $('#clipImage_back').css("cssText", "width: "+width+" !important;");
      $('#clipImage_back').css("display","block");
   })
   $('.clip_right_back').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('#clipImage_back').css("right",right);

   })
   $('.clip_left_back').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('#clipImage_back').css("left", left);

   })
   $('.clip_top_back').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('#clipImage_back').css("top", top);

   })
   $('.clip_bottom_back').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('#clipImage_back').css("bottom", bottom);

   })
   //upload
   $('.upload_width_back').keyup("on",function(){
       var width = $(this).val();
       var width = width+"px";
         // alert(width);
       $('.output_back').css("cssText", "width: "+width+" !important;");
      $('.output_back').css("display","block");
   })
   $('.upload_right_back').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('.output_back').css("right",right);

   })
   $('.upload_left_back').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.output_back').css("left", left);

   })
   $('.upload_top_back').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.output_back').css("top", top);

   })
   $('.upload_bottom_back').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.output_back').css("bottom", bottom);

   })
</script>
<script>
    var loadFile_back = function(event) {
    var output = document.getElementById('output_back');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
      $('.output_back').show();
      $('.upload_image_back').html("Upload Image Price : -" + 100);
      $('.uploadRemove_back').show();
      $('.resizable-div1_back').css({"border":"2px dotted grey","background":"white"});
         $('.ui-icon').css("display","block");

         //p_amount
         $('.upload_images_back').html("100");
         var price = 100;
         myFunctionUpload_back(price)
         //end p_amount
    }
  };
  $('.uploadRemove_back').click(function(){
         $('.upload_image_back').empty();
         $('.output_back').hide();
         $('.uploadImg_back').val('');
         $('.uploadRemove_back').hide();
          //p_amount
          $('.upload_images_back').html('');
         var price = 0;
         myFunctionUploadRemove_back(price)

         // end p_amount
      })

// p_amount
         function myFunctionUpload_back(price) {
            var actual_price = parseFloat($('.c_pric').text());

            var color_pri = parseFloat($('.color_prices').text());
            var font_pri = parseFloat($('.font_prices').text());
            var upload_pri = parseFloat($('.upload_images').text());
            var clip_pri = parseFloat($('.clip_art_prices').text());

            var color_pri_back = parseFloat($('.color_prices_back').text());
            var clip_art_back = parseFloat($('.clip_art_prices_back').text());
            var font_prices_back = parseFloat($('.font_prices_back').text());

            if(font_prices_back)
            {
               var font_prices_backs = font_prices_back;
            }
            else
            {
               var font_prices_backs = 0;
            }
             if(clip_art_back)
            {
               var clip_art_backs = clip_art_back;
            }
            else
            {
               var clip_art_backs = 0;
            }
            if(color_pri_back)
            {
               var color_pri_backs = color_pri_back;
            }
            else
            {
               var color_pri_backs = 0;
            }
//
            if(upload_pri)
            {
               var upload_pris = upload_pri;
            }
            else
            {
               var upload_pris = 0;
            }
            if(color_pri)
            {
               var color_pris = color_pri;
            }
            else
            {
               var color_pris = 0;
            }
            if(clip_pri)
            {
               var clip_pris = clip_pri;
            }
            else
            {
               var clip_pris = 0;
            }
            if(font_pri)
            {
               var font_pris = font_pri;
            }
            else
            {
               var font_pris = 0;
            }
            var clip_actual_price = parseFloat(price);
            var aap = clip_actual_price+actual_price+color_pris
            +clip_pris+font_pris+color_pri_backs
            +clip_art_backs+font_prices_backs+upload_pris;
            $('.c_price').text(aap);
            $('.p_amount').val(aap);
         }
         function myFunctionUploadRemove_back(price) {
            var actual_price = parseFloat($('.c_pric').text());

            var color_pri = parseFloat($('.color_prices').text());
            var clip_pri = parseFloat($('.clip_art_prices').text());
            var font_pri = parseFloat($('.font_prices').text());
            var upload_pri = parseFloat($('.upload_images').text());
            //
            var color_pri_back = parseFloat($('.color_prices_back').text());
            var clip_art_back = parseFloat($('.clip_art_prices_back').text());
            var font_prices_back = parseFloat($('.font_prices_back').text());
            if(font_prices_back)
            {
               var font_prices_backs = font_prices_back;
            }
            else
            {
               var font_prices_backs = 0;
            }
            if(clip_art_back)
            {
               var clip_art_backs = clip_art_back;
            }
            else
            {
               var clip_art_backs = 0;
            }
            if(color_pri_back)
            {
               var color_pri_backs = color_pri_back;
            }
            else
            {
               var color_pri_backs = 0;
            }
            //
            if(color_pri)
            {
               var color_pris = color_pri;
            }
            else
            {
               var color_pris = 0;
            }
            if(upload_pri)
            {
             var upload_pris = upload_pri;
            }
            else
            {
               var upload_pris = 0;
            }
            if(clip_pri)
            {
               var clip_pris = clip_pri;
            }
            else
            {
               var clip_pris = 0;
            }
            if(font_pri)
            {
               var font_pris = font_pri;
            }
            else
            {
               var font_pris = 0;
            }
            var clip_actual_price = parseFloat(price);
            var aap = clip_actual_price+actual_price+color_pris
            +clip_pris+font_pris+color_pri_backs
            +clip_art_backs+font_prices_backs+upload_pris;
            $('.c_price').text(aap);
         }
         // end p_amount


      $(".title_one_back").draggable();
$(".title_two_back").draggable();
$(".title_three_back").draggable();
// $("#clipImage_back").draggable();
// $(".output_back").draggable();
</script>
<script>
    $('.textOne_rotate_back').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotateOne_back(rotationAngle);
   })
      function rotateOne_back(rotationAngle) {
	   $('.title_one_back').css('-webkit-transform', 'rotate(' + rotationAngle + 'deg)');
   }
   $('.textTwo_rotate_back').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotateTwo_back(rotationAngle);
   })
      function rotateTwo_back(rotationAngle) {
	   $('.title_two_back').css('-webkit-transform', 'rotate(' + rotationAngle + 'deg)');
   }
   $('.textThree_rotate_back').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotateThree_back(rotationAngle);
   })
      function rotateThree_back(rotationAngle) {
	   $('.title_three_back').css('-webkit-transform', 'rotate(' + rotationAngle + 'deg)');
   }
   
      $('.clip_rotate_back').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotate_back(rotationAngle);

      
   })
      function rotate_back(rotationAngle) {
	   $('#clipImage_back').css('transform', 'rotate(' + rotationAngle + 'deg)');
   }
   $('.upload_rotate_back').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotateIpload_back(rotationAngle);

      
   })
      function rotateIpload_back(rotationAngle) {
	   $('.output_back').css('transform', 'rotate(' + rotationAngle + 'deg)');
   }
</script>
<script>
  $(function() {
      $( ".resizable-div_back" ).resizable();
      $("#clipImage_back").draggable();
      $(".output_back").draggable();

  });
  $(function() {
      $( ".resizable-div1_back" ).resizable();
      $("#clipImage_back").draggable();
      $(".output_back").draggable();

  });
  </script>
  <script>
    $(".mms_back").mouseleave(function(){
      $('.resizable-div_back').css({"border":"0px","background":"inherit"});
      $('.resizable-div1_back').css({"border":"0px","background":"inherit"});

      $('.ui-icon').css("display","none");
    });
  </script>
  <script>
   //font file
   function myFunctionFontBack(id)
   {
     
     var font_name = $('#font_pr_back'+id).attr('name');
     var price = $('#font_pr_back'+id).attr('price');
     var name = $('#font_pr_back'+id).attr('fname');
     $(".title_one_back").append('<style type="text/css">@font-face {font-family: '+name+';src: url("../../fontFile/'+font_name+'");}</style>');
     $(".title_one_back").css("font-family",name);

     $('.title_two_back').append('<style type="text/css">@font-face {font-family: '+name+';src: url("../../fontFile/'+font_name+'");}</style>');
     $('.title_two_back').css("font-family",name);
     $('.title_three_back').append('<style type="text/css">@font-face {font-family: '+name+';src: url("../../fontFile/'+font_name+'");}</style>');
     $('.title_three_back').css("font-family",name);
     $('.font_one_back').html("Font Name : - " + font_name);
     $('.font_price_back').html(", Font Price : - " + price);
     $('.fontRemove_back').show();
     $('.font_one_back').show();
     $('.font_price_back').show();
     $(this).unbind("change");

     $('.font_prices_back').html(price);
      myFunctionFon_back(price)

   }
   $('.fontRemove_back').click(function(){
      $('.font_r_back').val('');
      var name = "";
      $(".title_one_back").css("font-family",name);
      $('.title_two_back').css("font-family",name);
      $('.title_three_back').css("font-family",name);
      $('.fontRemove_back,.font_one_back,.font_price_back').hide();
        // p_amount
        $('.font_prices_back').html('');
      var price = 0;
      myFunctionFonRemove_back(price)
      // end p_amount
   })

   // p_amount
   function myFunctionFon_back(price) {
            var actual_price = parseFloat($('.c_pric').text());

            var color_pri = parseFloat($('.color_prices').text());
            var clip_pri = parseFloat($('.clip_art_prices').text());
            var upload_pri = parseFloat($('.upload_images').text());
            var font_pri = parseFloat($('.font_prices').text());
            // 
            var color_pri_back = parseFloat($('.color_prices_back').text());
            var clip_art_back = parseFloat($('.clip_art_prices_back').text());
            var upload_images_back = parseFloat($('.upload_images_back').text());
            if(upload_images_back)
            {
               var upload_images_backs = upload_images_back;
            }
            else
            {
               var upload_images_backs = 0;
            }
           
            if(clip_art_back)
            {
               var clip_art_backs = clip_art_back;
            }
            else
            {
               var clip_art_backs = 0;
            }
            if(color_pri_back)
            {
               var color_pri_backs = color_pri_back;
            }
            else
            {
               var color_pri_backs = 0;
            }
           
            //
            if(font_pri)
            {
               var font_pris = font_pri;
            }
            else
            {
               var font_pris = 0;
            }
            if(color_pri)
            {
               var color_pris = color_pri;
            }
            else
            {
               var color_pris = 0;
            }
            if(clip_pri)
            {
               var clip_pris = clip_pri;
            }
            else
            {
               var clip_pris = 0;
            }
            if(upload_pri)
            {
               var upload_pris = upload_pri;
            }
            else
            {
               var upload_pris = 0;
            }
            var clip_actual_price = parseFloat(price);
            var aap = clip_actual_price+actual_price+color_pris
            +clip_pris+upload_pris+color_pri_backs
            +clip_art_backs+font_pris;
            $('.c_price').text(aap);
            $('.p_amount').val(aap);
         }
         function myFunctionFonRemove_back(price) {
            var actual_price = parseFloat($('.c_pric').text());

            var color_pri = parseFloat($('.color_prices').text());
            var clip_pri = parseFloat($('.clip_art_prices').text());
            var upload_pri = parseFloat($('.upload_images').text());
            var font_pri = parseFloat($('.font_prices').text());
             // 
             var color_pri_back = parseFloat($('.color_prices_back').text());
            var clip_art_back = parseFloat($('.clip_art_prices_back').text());
            var upload_images_back = parseFloat($('.upload_images_back').text());
            if(upload_images_back)
            {
               var upload_images_backs = upload_images_back;
            }
            else
            {
               var upload_images_backs = 0;
            }
           
            if(clip_art_back)
            {
               var clip_art_backs = clip_art_back;
            }
            else
            {
               var clip_art_backs = 0;
            }
            if(color_pri_back)
            {
               var color_pri_backs = color_pri_back;
            }
            else
            {
               var color_pri_backs = 0;
            }
           
            //
            if(font_pri)
            {
               var font_pris = font_pri;
            }
            else
            {
               var font_pris = 0;
            }
            if(color_pri)
            {
               var color_pris = color_pri;
            }
            else
            {
               var color_pris = 0;
            }
            if(clip_pri)
            {
               var clip_pris = clip_pri;
            }
            else
            {
               var clip_pris = 0;
            }
            if(upload_pri)
            {
               var upload_pris = upload_pri;
            }
            else
            {
               var upload_pris = 0;
            }
            var clip_actual_price = parseFloat(price);
            var aap = clip_actual_price+actual_price+color_pris
            +clip_pris+upload_pris+color_pri_backs
            +clip_art_backs+font_pris;
            $('.c_price').text(aap);
         }
         // end p_amount


   //End font file
  </script>
                  @endpush