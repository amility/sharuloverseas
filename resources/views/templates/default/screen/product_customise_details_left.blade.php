<style>
    .textName_left
,.textNameTwo_left
,.textNameThree_left
,.clipArtRemove_left
,.uploadRemove_left
,.colorRemove_left
,.fontRemove_left{
      display:none;
   }
   .clip_im_left{
      display: none; 
   position: absolute;
    top: 0px;
    margin: 38px 100px auto;
    left: 0;
    text-align: center;
   }
   .clip_text_left{
      position: absolute;
    top: 50px;
    font-size: 21px;
    left: 0;
    text-align: center;
    z-index: 1000000000;
   }
   .clip_im1_left{
   display: none; 
   position: relative;
   top: -210px;
   right: -22px;
   width: 250%;
   }
   .output_left{
      display: none; 
   position: absolute;
    top: 0px;
    
    margin: 38px 100px auto;
    left: 0;
    text-align: center;
   }
   .clip_im2_left{
   display: none; 
   position: relative;
   top: -160px;
   right: 14px;
   width: 200%;
   }
   .clip_im3_left{
   display: none; 
   position: relative;
   top: -150px;
   right: -160px;
   width: 200%;
   }
</style>
<style>
      .resizable-div_left {
         width: 40px;
         height: 40px;
         text-align: center;
         /* padding: 20px; */
         border: 2px dotted grey;
         background:white;
      }
      .resizable-div1_left{
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

<div id="menu2"  class="container-fluid tab-pane ">
                     <br>
                     <div id="Front" class="tabcontent">
                        <div class="container-fluid">
                           <div class="row">
                              <div class="col-md-6">
                                    <div class="row">

                                       <!-- // -->
                                       <div class="col-md-12 mms_left">
                                           <div class="">
                                                <img class=" w-100"
                                                 src="{{Asset($productImageLists->image)}}"
                                                 alt="Girl in a jacket">
                                                <div class="column clip_text ">
                                                   <p class="title_one_left" style="position:relative; cursor:move;"></p>
                                                   
                                                   <p class="title_two_left" style="position:relative;cursor:move;"></p>
                                                  
                                                   <p class="title_three_left" style="position:relative;cursor:move;"></p>
                                                </div>
                                                 <div class="column clip_im_left " width="160px"> 
                                                      <img class="resizable-div_left " 
                                                      src="" alt="Snow" id="clipImage_left" style="width:80px; cursor:move;"> 
                                                   </div>
                                                <div class="column output_left" width="160px"> 
                                                      <img id="output_left" class="resizable-div1_left " style="width:80px;cursor:move;" />
                                                </div>
                                               
                                           </div>
                                            
                                        </div>
                                    <!-- // -->

                                        
                                        <div class="col-md-12 mt-4">
                                            <div class="">
                                                <H5>Add Features : -</H5>
                                                <span class="text_one_left"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm textName_left'>Remove</button>
                                                <br>
                                                <span class="text_two_left"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm textNameTwo_left'>Remove</button>
                                              
                                                <br>
                                                <span class="text_three_left"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm textNameThree_left'>Remove</button>
                                              
                                                <br>
                                                <span class="color_one_left"></span>
                                                <span class="color_price_left"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm colorRemove_left'>Remove</button>
                                              
                                                
                                                <br>
                                                <span class="font_one_left"></span>
                                                <span class="font_price_left"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm fontRemove_left'>Remove</button>
                                              
                                                <br>
                                                <span class="clip_art_left"></span>
                                                <span class="clip_art_price_left"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm clipArtRemove_left'>Remove</button>
                                              
                                                <br>
                                                <span class="upload_image_left"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm uploadRemove_left'>Remove</button>
                                              
                                                

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
                                                      type="text" id="text_title_left" maxlength="15">
                                                   <p>15 character(s) left</p>
                                                         <!-- Top
                                                         <input type="text" class="text_top_left form-control" name="top"> -->

                                                      </div>
                                                      <!-- <div class="col-md-3">
                                                         Bottom
                                                         <input type="text" class="text_bottom_left form-control" name="bottom">

                                                      </div>
                                                      <div class="col-md-2">
                                                         Left
                                                         <input type="text" class="text_left_left form-control" name="left">
                                                      </div>
                                                      <div class="col-md-2">
                                                         Right
                                                         <input type="text" class="text_right_left form-control" name="right">
                                                      </div> -->
                                                      <div class="col-md-2">
                                                         Size
                                                         <input type="text" placeholder="20" class="text_size_left form-control" name="size">
                                                      </div>
                                                      <div class="col-md-3">
                                                         Rotate
                                                            <input type="number" class="textOne_rotate_left form-control"  placeholder="0" name="width">
                                                         </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                    
                                                      <div class="row">
                                                      <div class="col-md-7">
                                                      <span>
                                                   Text Line Two </span>
                                                   <input class="form-control" name="name"
                                                      type="text" id="text_title_two_left" maxlength="15">
                                                         <!-- Top
                                                         <input type="text" class="text_top1_left form-control" name="top"> -->

                                                      </div>
                                                      <!-- <div class="col-md-3">
                                                         Bottom
                                                         <input type="text" class="text_bottom1_left form-control" name="bottom">

                                                      </div>
                                                      <div class="col-md-2">
                                                         Left
                                                         <input type="text" class="text_left1_left form-control" name="left">
                                                      </div>
                                                      <div class="col-md-2">
                                                         Right
                                                         <input type="text" class="text_right1_left form-control" name="right">
                                                      </div> -->
                                                      <div class="col-md-2">
                                                         Size
                                                         <input type="text" placeholder="20" class="text_size1_left form-control" name="size">
                                                      </div>
                                                      <div class="col-md-3">
                                                         Rotate
                                                            <input type="number" class="textTwo_rotate_left form-control"  placeholder="0" name="width">
                                                         </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   
                                                      <div class="row">
                                                         <div class="col-md-7">
                                                            <!-- Top
                                                            <input type="text" class="text_top2_left form-control" name="top"> -->
                                                            <span>
                                                   Text Line Three </span>
                                                   <input class="form-control" name="name"
                                                      type="text" id="text_title_three_left" maxlength="15">
                                                         </div>
                                                         <!-- <div class="col-md-3">
                                                            Bottom
                                                            <input type="text" class="text_bottom2_left form-control" name="bottom">

                                                         </div>
                                                         <div class="col-md-2">
                                                            Left
                                                            <input type="text" class="text_left2_left form-control" name="left">
                                                         </div>
                                                         <div class="col-md-2">
                                                            Right
                                                            <input type="text" class="text_right2_left form-control" name="right">
                                                         </div> -->
                                                         <div class="col-md-2">
                                                         Size
                                                            <input type="text" placeholder="20" class="text_size2_left form-control" name="size">
                                                         </div>
                                                         <div class="col-md-3">
                                                         Rotate
                                                            <input type="number" class="textThree_rotate_left form-control"  placeholder="0" name="width">
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
                                                <div class="form-group text_font_left">
                                                    <span>
                                                        Font
                                                   </span>
                                                   <select name="font_id" id="font_id_left"
                                                      class="form-control font_r_left" 
                                                      onchange="myFunctionFontLeft(this.value)"
                                                      >
                                                      <option value="">Select Font
                                                      </option>
                                                      @foreach($text as $key=>$textData)
                                                      <option 
                                                      id="font_pr_left{{$textData->text_id}}"
                                                       price="{{$textData->price}}"
                                                       name="{{$textData->doc}}"
                                                       fname="{{$textData->name}}"
                                                       value="{{$textData->text_id}}"
                                                      >{{$textData->name}}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                                <div class="form-group text_color_left">
                                                    <span>Color</span>
                                                   <select name="font_id" class="form-control color_r_left" onchange="myFunctionColor_left(this.value)">
                                                      <option value="" price="">Select Color
                                                      </option>
                                                      @foreach($color as $key=>$colorData)
                                                      <option id="clr_pr_left{{$colorData->color_id}}" price="{{$colorData->price}}" name="{{$colorData->name}}"
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
                                                      alt="Snow" id="clipName_left{{$clipData->clip_id}}" clip_name="{{$clipData->name}}" onclick="myFunction_left(this.src,{{$clipData->clip_id}},{{$clipData->price}},this.clip_name)"> 
                                                </div>
                                                @endforeach
                                             </div>
                                                </div>
                                                <div class="col-md-12">
                                                   <div class="row">
                                                         <!-- <div class="col-md-2">
                                                            Top
                                                            <input type="text" class="clip_top_left form-control" name="top">

                                                         </div>
                                                         <div class="col-md-3">
                                                            Bottom
                                                            <input type="text" class="clip_bottom_left form-control" name="bottom">

                                                         </div>
                                                         <div class="col-md-2">
                                                            Left
                                                            <input type="text" class="clip_left_left form-control" name="left">
                                                         </div>
                                                         <div class="col-md-2">
                                                            Right
                                                            <input type="text" class="clip_right_left form-control" name="right">
                                                         </div> -->
                                                         <div class="col-md-2">
                                                         Width
                                                            <input type="text" placeholder="120" class="clip_width_left form-control" name="width">
                                                         </div>
                                                         <div class="col-md-4">
                                                         Rotate
                                                            <input type="number" class="clip_rotate_left form-control"  placeholder="0" name="width">
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
                                                         <input type="file" accept="image/*" class="uploadImg_left" onchange="loadFile_left(event)">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="row">
                                                         <!-- <div class="col-md-2">
                                                            Top
                                                            <input type="text" class="upload_top_left form-control" name="top">

                                                         </div>
                                                         <div class="col-md-3">
                                                            Bottom
                                                            <input type="text" class="upload_bottom_left form-control" name="bottom">

                                                         </div>
                                                         <div class="col-md-2">
                                                            Left
                                                            <input type="text" class="upload_left_left form-control" name="left">
                                                         </div>
                                                         <div class="col-md-2">
                                                            Right
                                                            <input type="text" class="upload_right_left form-control" name="right">
                                                         </div> -->
                                                         <div class="col-md-2">
                                                         Width
                                                            <input type="text" placeholder="120" class="upload_width_left form-control" name="width">
                                                         </div>
                                                         <div class="col-md-4">
                                                         Rotate
                                                            <input type="number" class="upload_rotate_left form-control"  placeholder="0" name="width">
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
   function myFunction_left(id,name,price,names) {
       $('.clip_im_left').show();
       $('#clipImage_left').attr("src",id);
      //  $('#clipImage').attr("src",clip_name);
      var clpName = $('#clipName_left'+name).attr("clip_name");
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price_left').text(clip_actual_price);
       $('.clip_art_left').html("Clip Art Name : - " + clpName);
       $('.clip_art_price_left').html(" , Clip Art Price : - " + price);
       $('.clipArtRemove_left').show();
       $('div#slider_left1').show();
       $('.resizable-div_left').css({"border":"2px dotted grey","background":"white"});
         $('.ui-icon').css("display","block");

      }
      $('.clipArtRemove_left').click(function(){
         $('.clip_art_left,.clip_art_price_left').empty();
         $('#clipImage_left,.clip_im_left').hide();
         $('.clipArtRemove_left').hide();
      })


   function myFunction1_left(id,name,price) {
       $('.clip_im1').show();
       $('#clipImage1').attr("src",id);
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price').text(clip_actual_price);
   }
   function myFunction2_left(id,name,price) {
       $('.clip_im2').show();
       $('#clipImage2').attr("src",id);
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price').text(clip_actual_price);
   }
   function myFunction3_left(id,name,price) {
       $('.clip_im3').show();
       $('#clipImage3').attr("src",id);
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price').text(clip_actual_price);
   }
//    color hide and show
   function myFunctionText_left(text) {
    if(text == '1')
    {
        $('.text_font_left').show();
        $('.text_color_left').hide();

    }
    else if(text == '2')
    {
        $('.text_color_left').show();
        $('.text_font_left').hide();

    }
      
   }
//    text
   $('#text_title_left').keyup("on",function(){
       var text = $(this).val();
       $('.title_one_left').text(text);
       $('.title_one_left').show();
       $('.text_one_left').html("Text First : - " + text );
       $('.textName_left').show();
       $('.text_one_left').show();
   })
   $('.textName_left').click(function(){
      $('.text_one_left,.title_one_left').hide();
      $('#text_title_left').val('');
      $('.textName_left').hide();

   })

   $('#text_title_two_left').keyup("on",function(){
       var text = $(this).val();
       $('.title_two_left').text(text);
       $('.title_two_left').show();
       $('.text_two_left').show();

       $('.text_two_left').html("Text Second : - " + text);
       $('.textNameTwo_left').show();

   })
   $('.textNameTwo_left').click(function(){
      $('.text_two_left,.title_two_left').hide();
      $('#text_title_two_left').val('');
      $('.textNameTwo_left').hide();

   })

   $('#text_title_three_left').keyup("on",function(){
       var text = $(this).val();
       $('.title_three_left').show();
       $('.text_three_left').show();
       $('.title_three_left').text(text);
       $('.text_three_left').html("Text Third : - " + text);
       $('.textNameThree_left').show();

   })
   $('.textNameThree_left').click(function(){
      $('.text_three_left,.title_three_left').hide();
      $('#text_title_three_left').val('');
      $('.textNameThree_left').hide();

   })
   function myFunctionColor_left(id)
   {
     var color = $('#clr_pr_left'+id).attr('name')
     var price = $('#clr_pr_left'+id).attr('price')
   //   var colr = "color:"+color;
     $('.title_one_left').css("color",color);
     $('.title_two_left').css("color",color);
     $('.title_three_left').css("color",color);
     $('.color_one_left').html("Color Name : - " + color);
     $('.color_price_left').html(", Color Price : - " + price);
     $('.colorRemove_left').show();
     $('.color_one_left').show();
     $('.color_price_left').show();
   }
   $('.colorRemove_left').click(function(){
      $('.title_one_left').css("color","inherit");
     $('.title_two_left').css("color","inherit");
     $('.title_three_left').css("color","inherit"); 
          $('.color_r_left').val('');
      $('.colorRemove_left,.color_one_left,.color_price_left').hide();

   })

   // text line one
   $('.text_size_left').keyup("on",function(){
       var size = $(this).val();
       var size = size+"px";
      //  $('.title_one').attr("style",size);
       $('.title_one_left').css("font-size", size);

   })
   $('.text_right_left').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
      
       $('.title_one_left').css("right", right);

   })
   $('.text_left_left').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.title_one_left').css("left", left);

   })
   $('.text_top_left').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.title_one_left').css("top", top);

   })
   $('.text_bottom_left').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.title_one_left').css("bottom", bottom);

   })

   //
   $('.text_size1_left').keyup("on",function(){
       var size = $(this).val();
       var size = size+"px";
       $('.title_two_left').css("font-size", size);

   })
   $('.text_right1_left').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('.title_two_left').css("right", right);

   })
   $('.text_left1_left').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.title_two_left').css("left", left);

   })
   $('.text_top1_left').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.title_two_left').css("top", top);

   })
   $('.text_bottom1_left').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.title_two_left').css("bottom", bottom);

   })

   //
   $('.text_size2_left').keyup("on",function(){
       var size = $(this).val();
       var size = size+"px";
       $('.title_three_left').css("font-size", size);

   })
   $('.text_right2_left').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('.title_three_left').css("right", right);

   })
   $('.text_left2_left').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.title_three_left').css("left", left);

   })
   $('.text_top2_left').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.title_three_left').css("top", top);

   })
   $('.text_bottom2_left').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.title_three_left').css("bottom", bottom);

   })
   //
   $('.clip_width_left').keyup("on",function(){
       var width = $(this).val();
       var width = width+"px";
         // alert(width);
       $('#clipImage_left').css("cssText", "width: "+width+" !important;");
      $('#clipImage_left').css("display","block");
   })
   $('.clip_right_left').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('#clipImage_left').css("right",right);

   })
   $('.clip_left_left').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('#clipImage_left').css("left", left);

   })
   $('.clip_top_left').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('#clipImage_left').css("top", top);

   })
   $('.clip_bottom_left').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('#clipImage_left').css("bottom", bottom);

   })
   //upload
   $('.upload_width_left').keyup("on",function(){
       var width = $(this).val();
       var width = width+"px";
         // alert(width);
       $('.output_left').css("cssText", "width: "+width+" !important;");
      $('.output_left').css("display","block");
   })
   $('.upload_right_left').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('.output_left').css("right",right);

   })
   $('.upload_left_left').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.output_left').css("left", left);

   })
   $('.upload_top_left').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.output_left').css("top", top);

   })
   $('.upload_bottom_left').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.output_left').css("bottom", bottom);

   })
</script>
<script>
  var loadFile_left = function(event) {
    var output = document.getElementById('output_left');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
      $('.output_left').show();
      $('.upload_image_left').html("Upload Image Price : -" + 100);
      $('.uploadRemove_left').show();
      $('.resizable-div1_left').css({"border":"2px dotted grey","background":"white"});
         $('.ui-icon').css("display","block");
    }
  };
  $('.uploadRemove_left').click(function(){
         $('.upload_image_left').empty();
         $('.output_left').hide();
         $('.uploadImg_left').val('');

         $('.uploadRemove_left').hide();
      });
      $(".title_one_left").draggable();
$(".title_two_left").draggable();
$(".title_three_left").draggable();
// $("#clipImage_left").draggable();
// $(".output_left").draggable();
</script>

<script>
    $('.textOne_rotate_left').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotateOne_left(rotationAngle);
   })
      function rotateOne_left(rotationAngle) {
	   $('.title_one_left').css('-webkit-transform', 'rotate(' + rotationAngle + 'deg)');
   }
   $('.textTwo_rotate_left').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotateTwo_left(rotationAngle);
   })
      function rotateTwo_left(rotationAngle) {
	   $('.title_two_left').css('-webkit-transform', 'rotate(' + rotationAngle + 'deg)');
   }
   $('.textThree_rotate_left').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotateThree_left(rotationAngle);
   })
      function rotateThree_left(rotationAngle) {
	   $('.title_three_left').css('-webkit-transform', 'rotate(' + rotationAngle + 'deg)');
   }
   
      $('.clip_rotate_left').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotate_left(rotationAngle);

      
   })
      function rotate_left(rotationAngle) {
	   $('#clipImage_left').css('transform', 'rotate(' + rotationAngle + 'deg)');
   }
   $('.upload_rotate_left').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotateIpload_left(rotationAngle);

      
   })
      function rotateIpload_left(rotationAngle) {
	   $('.output_left').css('transform', 'rotate(' + rotationAngle + 'deg)');
   }
</script>
<script>
  $(function() {
      $( ".resizable-div_left" ).resizable();
      $("#clipImage_left").draggable();
      $(".output_left").draggable();

  });
  $(function() {
      $( ".resizable-div1_left" ).resizable();
      $("#clipImage_left").draggable();
      $(".output_left").draggable();

  });
  </script>
  <script>
    $(".mms_left").mouseleave(function(){
      $('.resizable-div_left').css({"border":"0px","background":"inherit"});
      $('.resizable-div1_left').css({"border":"0px","background":"inherit"});

      $('.ui-icon').css("display","none");
    });
   
</script>
<script>
   //font file
   function myFunctionFontLeft(id)
   {
     
     var font_name = $('#font_pr_left'+id).attr('name');
     var price = $('#font_pr_left'+id).attr('price');
     var name = $('#font_pr_left'+id).attr('fname');
     $(".title_one_left").append('<style type="text/css">@font-face {font-family: '+name+';src: url("../../fontFile/'+font_name+'");}</style>');
     $(".title_one_left").css("font-family",name);

     $('.title_two_left').append('<style type="text/css">@font-face {font-family: '+name+';src: url("../../fontFile/'+font_name+'");}</style>');
     $('.title_two_left').css("font-family",name);
     $('.title_three_left').append('<style type="text/css">@font-face {font-family: '+name+';src: url("../../fontFile/'+font_name+'");}</style>');
     $('.title_three_left').css("font-family",name);
     $('.font_one_left').html("Font Name : - " + font_name);
     $('.font_price_left').html(", Font Price : - " + price);
     $('.fontRemove_left').show();
     $('.font_one_left').show();
     $('.font_price_left').show();
     $(this).unbind("change");

   }

   $('.fontRemove_left').click(function(){
      $('.font_r_left').val('');
      var name = "";
      $(".title_one_left").css("font-family",name);
      $('.title_two_left').css("font-family",name);
      $('.title_three_left').css("font-family",name);
      $('.fontRemove_left,.font_one_left,.font_price_left').hide();
   })

  
   //End font file
  </script>
                  @endpush