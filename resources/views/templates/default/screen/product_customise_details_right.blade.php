<style>
    .textName_right
,.textNameTwo_right
,.textNameThree_right
,.clipArtRemove_right
,.uploadRemove_right
,.colorRemove_right
,.fontRemove_right{
      display:none;
   }
   .clip_im_right{
      display: none; 
   position: absolute;
    top: 0px;
    margin: 38px 100px auto;
    left: 0;
    text-align: center;
   }
   .clip_text_right{
      position: absolute;
    top: 50px;
    font-size: 21px;
    left: 0;
    text-align: center;
    z-index: 1000000000;
   }
   .clip_im1_right{
   display: none; 
   position: relative;
   top: -210px;
   right: -22px;
   width: 250%;
   }
   .output_right{
      display: none; 
   position: absolute;
    top: 0px;
    
    margin: 38px 100px auto;
    left: 0;
    text-align: center;
   }
   .clip_im2_right{
   display: none; 
   position: relative;
   top: -160px;
   right: 14px;
   width: 200%;
   }
   .clip_im3_right{
   display: none; 
   position: relative;
   top: -150px;
   right: -160px;
   width: 200%;
   }
</style>
<style>
      .resizable-div_right {
         width: 40px;
         height: 40px;
         text-align: center;
         /* padding: 20px; */
         border: 2px dotted grey;
         background:white;
      }
      .resizable-div1_right {
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


<div id="menu3"  class="container-fluid tab-pane ">
                     <br>
                     <div id="Front" class="tabcontent">
                        <div class="container-fluid">
                           <div class="row">
                              <div class="col-md-6">
                                    <div class="row">
                                       <!-- // -->
                                       <div class="col-md-12 mms_right">
                                           <div class="">
                                                <img class=" w-100"
                                                 src="{{Asset($productImageLists->image)}}"
                                                 alt="Girl in a jacket">
                                                <div class="column clip_text ">
                                                   <p class="title_one_right" style="position:relative; cursor:move;"></p>
                                                   
                                                   <p class="title_two_right" style="position:relative;cursor:move;"></p>
                                                  
                                                   <p class="title_three_right" style="position:relative;cursor:move;"></p>
                                                </div>
                                                 <div class="column clip_im_right " width="160px"> 
                                                      <img class="resizable-div_right" 
                                                      src="" alt="Snow" id="clipImage_right" style="width:80px; cursor:move;"> 
                                                   </div>
                                                <div class="column output_right" width="160px"> 
                                                      <img id="output_right" class="resizable-div1_right " style="width:80px;cursor:move;" />
                                                </div>
                                               
                                           </div>
                                            
                                        </div>
                                    <!-- // -->
                                        <div class="col-md-12 mt-4">
                                            <div class="">
                                                <H5>Add Features : -</H5>
                                                <span class="text_one_right"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm textName_right'>Remove</button>
                                                <br>
                                                <span class="text_two_right"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm textNameTwo_right'>Remove</button>
                                              
                                                <br>
                                                <span class="text_three_right"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm textNameThree_right'>Remove</button>
                                              
                                                <br>
                                                <span class="color_one_right"></span>
                                                <span class="color_price_right"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm colorRemove_right'>Remove</button>
                                                <br>
                                                <span class="font_one_right"></span>
                                                <span class="font_price_right"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm fontRemove_right'>Remove</button>
                                              
                                                <br>
                                                <span class="clip_art_right"></span>
                                                <span class="clip_art_price_right"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm clipArtRemove_right'>Remove</button>
                                              
                                                <br>
                                                <span class="upload_image_right"></span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <button class='btn btn-primary btn-sm uploadRemove_right'>Remove</button>
                                              
                                                

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
                                                      type="text" id="text_title_right" maxlength="15">
                                                   <p>15 character(s) left</p>
                                                         <!-- Top
                                                         <input type="text" class="text_top_right form-control" name="top"> -->

                                                      </div>
                                                      <!-- <div class="col-md-3">
                                                         Bottom
                                                         <input type="text" class="text_bottom_right form-control" name="bottom">

                                                      </div>
                                                      <div class="col-md-2">
                                                         Left
                                                         <input type="text" class="text_right_right form-control" name="left">
                                                      </div>
                                                      <div class="col-md-2">
                                                         Right
                                                         <input type="text" class="text_right_right form-control" name="right">
                                                      </div> -->
                                                      <div class="col-md-2">
                                                         Size
                                                         <input type="text" placeholder="20" class="text_size_right form-control" name="size">
                                                      </div>
                                                      <div class="col-md-3">
                                                         Rotate
                                                            <input type="number" class="textOne_rotate_right form-control"  placeholder="0" name="width">
                                                         </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                                                                         <div class="row">
                                                      <div class="col-md-7">
                                                      <span>
                                                   Text Line Two </span>
                                                   <input class="form-control" name="name"
                                                      type="text" id="text_title_two_right" maxlength="15">

                                                         <!-- Top
                                                         <input type="text" class="text_top1_right form-control" name="top"> -->

                                                      </div>
                                                      <!-- <div class="col-md-3">
                                                         Bottom
                                                         <input type="text" class="text_bottom1_right form-control" name="bottom">

                                                      </div>
                                                      <div class="col-md-2">
                                                         Left
                                                         <input type="text" class="text_right1_right form-control" name="left">
                                                      </div>
                                                      <div class="col-md-2">
                                                         Right
                                                         <input type="text" class="text_right1_right form-control" name="right">
                                                      </div> -->
                                                      <div class="col-md-2">
                                                         Size
                                                         <input type="text" placeholder="20" class="text_size1_right form-control" name="size">
                                                      </div>
                                                      <div class="col-md-3">
                                                         Rotate
                                                            <input type="number" class="textTwo_rotate_right form-control"  placeholder="0" name="width">
                                                         </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="row">
                                                         <div class="col-md-7">
                                                         <span>
                                                   Text Line Three </span>
                                                   <input class="form-control" name="name"
                                                      type="text" id="text_title_three_right" maxlength="15">
           
                                                            <!-- Top
                                                            <input type="text" class="text_top2_right form-control" name="top"> -->

                                                         </div>
                                                         <!-- <div class="col-md-3">
                                                            Bottom
                                                            <input type="text" class="text_bottom2_right form-control" name="bottom">

                                                         </div>
                                                         <div class="col-md-2">
                                                            Left
                                                            <input type="text" class="text_right2_right form-control" name="left">
                                                         </div>
                                                         <div class="col-md-2">
                                                            Right
                                                            <input type="text" class="text_right2_right form-control" name="right">
                                                         </div> -->
                                                         <div class="col-md-2">
                                                         Size
                                                            <input type="text" placeholder="20" class="text_size2_right form-control" name="size">
                                                         </div>
                                                         <div class="col-md-3">
                                                         Rotate
                                                            <input type="number" class="textThree_rotate_right form-control"  placeholder="0" name="width">
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
                                                <div class="form-group text_font_right">
                                                    <span>
                                                        Font
                                                   </span>
                                                   <select name="font_id" id="font_id_right"
                                                      class="form-control font_r_right"
                                                      onchange="myFunctionFontRight(this.value)"
                                                      >
                                                      <option value="">Select Font
                                                      </option>
                                                      @foreach($text as $key=>$textData)
                                                      <option
                                                      id="font_pr_right{{$textData->text_id}}"
                                                       price="{{$textData->price}}"
                                                       name="{{$textData->doc}}"
                                                       fname="{{$textData->name}}"
                                                       value="{{$textData->text_id}}"
                                                      >{{$textData->name}}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                                <div class="form-group text_color_right">
                                                    <span>Color</span>
                                                   <select name="font_id" class="form-control color_r_right" onchange="myFunctionColor_right(this.value)">
                                                      <option value="" price="">Select Color
                                                      </option>
                                                      @foreach($color as $key=>$colorData)
                                                      <option id="clr_pr_right{{$colorData->color_id}}" price="{{$colorData->price}}" name="{{$colorData->name}}"
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
                                                      alt="Snow" id="clipName_right{{$clipData->clip_id}}" clip_name="{{$clipData->name}}" onclick="myFunction_right(this.src,{{$clipData->clip_id}},{{$clipData->price}},this.clip_name)"> 
                                                </div>
                                                @endforeach
                                             </div>
                                                </div>
                                                <div class="col-md-12">
                                                   <div class="row">
                                                         <!-- <div class="col-md-2">
                                                            Top
                                                            <input type="text" class="clip_top_right form-control" name="top">

                                                         </div>
                                                         <div class="col-md-3">
                                                            Bottom
                                                            <input type="text" class="clip_bottom_right form-control" name="bottom">

                                                         </div>
                                                         <div class="col-md-2">
                                                            Left
                                                            <input type="text" class="clip_right_right form-control" name="left">
                                                         </div>
                                                         <div class="col-md-2">
                                                            Right
                                                            <input type="text" class="clip_right_right form-control" name="right">
                                                         </div> -->
                                                         <div class="col-md-2">
                                                         Width
                                                            <input type="text" placeholder="120" class="clip_width_right form-control" name="width">
                                                         </div>
                                                         <div class="col-md-4">
                                                         Rotate
                                                            <input type="number" class="clip_rotate_right form-control"  placeholder="0" name="width">
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
                                                         <input type="file" accept="image/*" class="uploadImg_right" onchange="loadFile_right(event)">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="row">
                                                         <!-- <div class="col-md-2">
                                                            Top
                                                            <input type="text" class="upload_top_right form-control" name="top">

                                                         </div>
                                                         <div class="col-md-3">
                                                            Bottom
                                                            <input type="text" class="upload_bottom_right form-control" name="bottom">

                                                         </div>
                                                         <div class="col-md-2">
                                                            Left
                                                            <input type="text" class="upload_right_right form-control" name="left">
                                                         </div>
                                                         <div class="col-md-2">
                                                            Right
                                                            <input type="text" class="upload_right_right form-control" name="right">
                                                         </div> -->
                                                         <div class="col-md-2">
                                                         Width
                                                            <input type="text" placeholder="120" class="upload_width_right form-control" name="width">
                                                         </div>
                                                         <div class="col-md-4">
                                                         Rotate
                                                            <input type="number" class="upload_rotate_right form-control"  placeholder="0" name="width">
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
   function myFunction_right(id,name,price,names) {
       $('.clip_im_right').show();
       $('#clipImage_right').attr("src",id);
      //  $('#clipImage').attr("src",clip_name);
      var clpName = $('#clipName_right'+name).attr("clip_name");
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price_right').text(clip_actual_price);
       $('.clip_art_right').html("Clip Art Name : - " + clpName);
       $('.clip_art_price_right').html(" , Clip Art Price : - " + price);
       $('.clipArtRemove_right').show();
       $('div#slider_right1').show();
       $('.resizable-div_right').css({"border":"2px dotted grey","background":"white"});
         $('.ui-icon').css("display","block");
      }
      $('.clipArtRemove_right').click(function(){
         $('.clip_art_right,.clip_art_price_right').empty();
         $('#clipImage_right,.clip_im_right').hide();
         $('.clipArtRemove_right').hide();
      })


   function myFunction1_right(id,name,price) {
       $('.clip_im1').show();
       $('#clipImage1').attr("src",id);
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price').text(clip_actual_price);
   }
   function myFunction2_right(id,name,price) {
       $('.clip_im2').show();
       $('#clipImage2').attr("src",id);
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price').text(clip_actual_price);
   }
   function myFunction3_right(id,name,price) {
       $('.clip_im3').show();
       $('#clipImage3').attr("src",id);
       var actual_price = parseInt($('.c_pric').text());
       var clip_actual_price = actual_price+price;
       $('.c_price').text(clip_actual_price);
   }
//    color hide and show
   function myFunctionText_right(text) {
    if(text == '1')
    {
        $('.text_font_right').show();
        $('.text_color_right').hide();

    }
    else if(text == '2')
    {
        $('.text_color_right').show();
        $('.text_font_right').hide();

    }
      
   }
//    text
   $('#text_title_right').keyup("on",function(){
       var text = $(this).val();
       $('.title_one_right').text(text);
       $('.title_one_right').show();
       $('.text_one_right').html("Text First : - " + text );
       $('.textName_right').show();
       $('.text_one_right').show();
   })
   $('.textName_right').click(function(){
      $('.text_one_right,.title_one_right').hide();
      $('#text_title_right').val('');
      $('.textName_right').hide();

   })

   $('#text_title_two_right').keyup("on",function(){
       var text = $(this).val();
       $('.title_two_right').text(text);
       $('.title_two_right').show();
       $('.text_two_right').show();

       $('.text_two_right').html("Text Second : - " + text);
       $('.textNameTwo_right').show();

   })
   $('.textNameTwo_right').click(function(){
      $('.text_two_right,.title_two_right').hide();
      $('#text_title_two_right').val('');
      $('.textNameTwo_right').hide();

   })

   $('#text_title_three_right').keyup("on",function(){
       var text = $(this).val();
       $('.title_three_right').show();
       $('.text_three_right').show();
       $('.title_three_right').text(text);
       $('.text_three_right').html("Text Third : - " + text);
       $('.textNameThree_right').show();

   })
   $('.textNameThree_right').click(function(){
      $('.text_three_right,.title_three_right').hide();
      $('#text_title_three_right').val('');
      $('.textNameThree_right').hide();

   })
   function myFunctionColor_right(id)
   {
     var color = $('#clr_pr_right'+id).attr('name')
     var price = $('#clr_pr_right'+id).attr('price')
   //   var colr = "color:"+color;
     $('.title_one_right').css("color",color);
     $('.title_two_right').css("color",color);
     $('.title_three_right').css("color",color);
     $('.color_one_right').html("Color Name : - " + color);
     $('.color_price_right').html(", Color Price : - " + price);
     $('.colorRemove_right').show();
     $('.color_one_right').show();
     $('.color_price_right').show();
   }
   $('.colorRemove_right').click(function(){
      $('.title_one_right').css("color","inherit");
     $('.title_two_right').css("color","inherit");
     $('.title_three_right').css("color","inherit"); 
          $('.color_r_right').val('');
      $('.colorRemove_right,.color_one_right,.color_price_right').hide();

   })

   // text line one
   $('.text_size_right').keyup("on",function(){
       var size = $(this).val();
       var size = size+"px";
      //  $('.title_one').attr("style",size);
       $('.title_one_right').css("font-size", size);

   })
   $('.text_right_right').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
      
       $('.title_one_right').css("right", right);

   })
   $('.text_right_right').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.title_one_right').css("left", left);

   })
   $('.text_top_right').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.title_one_right').css("top", top);

   })
   $('.text_bottom_right').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.title_one_right').css("bottom", bottom);

   })

   //
   $('.text_size1_right').keyup("on",function(){
       var size = $(this).val();
       var size = size+"px";
       $('.title_two_right').css("font-size", size);

   })
   $('.text_right1_right').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('.title_two_right').css("right", right);

   })
   $('.text_right1_right').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.title_two_right').css("left", left);

   })
   $('.text_top1_right').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.title_two_right').css("top", top);

   })
   $('.text_bottom1_right').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.title_two_right').css("bottom", bottom);

   })

   //
   $('.text_size2_right').keyup("on",function(){
       var size = $(this).val();
       var size = size+"px";
       $('.title_three_right').css("font-size", size);

   })
   $('.text_right2_right').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('.title_three_right').css("right", right);

   })
   $('.text_right2_right').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.title_three_right').css("left", left);

   })
   $('.text_top2_right').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.title_three_right').css("top", top);

   })
   $('.text_bottom2_right').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.title_three_right').css("bottom", bottom);

   })
   //
   $('.clip_width_right').keyup("on",function(){
       var width = $(this).val();
       var width = width+"px";
         // alert(width);
       $('#clipImage_right').css("cssText", "width: "+width+" !important;");
      $('#clipImage_right').css("display","block");
   })
   $('.clip_right_right').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('#clipImage_right').css("right",right);

   })
   $('.clip_right_right').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('#clipImage_right').css("left", left);

   })
   $('.clip_top_right').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('#clipImage_right').css("top", top);

   })
   $('.clip_bottom_right').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('#clipImage_right').css("bottom", bottom);

   })
   //upload
   $('.upload_width_right').keyup("on",function(){
       var width = $(this).val();
       var width = width+"px";
         // alert(width);
       $('.output_right').css("cssText", "width: "+width+" !important;");
      $('.output_right').css("display","block");
   })
   $('.upload_right_right').keyup("on",function(){
       var right = $(this).val();
       var right = right+"px";
       $('.output_right').css("right",right);

   })
   $('.upload_right_right').keyup("on",function(){
       var left = $(this).val();
       var left = left+"px";
      
       $('.output_right').css("left", left);

   })
   $('.upload_top_right').keyup("on",function(){
       var top = $(this).val();
       var top = top+"px";
      
       $('.output_right').css("top", top);

   })
   $('.upload_bottom_right').keyup("on",function(){
       var bottom = $(this).val();
       var bottom = bottom+"px";
      
       $('.output_right').css("bottom", bottom);

   })
</script>
<script>
  var loadFile_right = function(event) {
    var output = document.getElementById('output_right');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
      $('.output_right').show();
      $('.upload_image_right').html("Upload Image Price : -" + 100);
      $('.uploadRemove_right').show();
      $('.resizable-div1_right').css({"border":"2px dotted grey","background":"white"});
         $('.ui-icon').css("display","block");
    }
  };
  $('.uploadRemove_right').click(function(){
         $('.upload_image_right').empty();
         $('.output_right').hide();
         $('.uploadImg_right').val('');

         $('.uploadRemove_right').hide();
      })
      $(".title_one_right").draggable();
$(".title_two_right").draggable();
$(".title_three_right").draggable();
// $("#clipImage_right").draggable();
// $(".output_right").draggable();
</script>
<script>
    $('.textOne_rotate_right').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotateOne_right(rotationAngle);
   })
      function rotateOne_right(rotationAngle) {
	   $('.title_one_right').css('-webkit-transform', 'rotate(' + rotationAngle + 'deg)');
   }
   $('.textTwo_rotate_right').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotateTwo_right(rotationAngle);
   })
      function rotateTwo_right(rotationAngle) {
	   $('.title_two_right').css('-webkit-transform', 'rotate(' + rotationAngle + 'deg)');
   }
   $('.textThree_rotate_right').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotateThree_right(rotationAngle);
   })
      function rotateThree_right(rotationAngle) {
	   $('.title_three_right').css('-webkit-transform', 'rotate(' + rotationAngle + 'deg)');
   }
   
      $('.clip_rotate_right').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotate_right(rotationAngle);

      
   })
      function rotate_right(rotationAngle) {
	   $('#clipImage_right').css('transform', 'rotate(' + rotationAngle + 'deg)');
   }
   $('.upload_rotate_right').on("keyup click",function(){
       var rotationAngle = $(this).val();
      rotateIpload_right(rotationAngle);

      
   })
      function rotateIpload_right(rotationAngle) {
	   $('.output_right').css('transform', 'rotate(' + rotationAngle + 'deg)');
   }
</script>
<script>
  $(function() {
      $( ".resizable-div_right" ).resizable();
      $("#clipImage_right").draggable();
      $(".output_right").draggable();

  });
  $(function() {
      $( ".resizable-div1_right" ).resizable();
      $("#clipImage_right").draggable();
      $(".output_right").draggable();

  });
  </script>
  <script>
    $(".mms_right").mouseleave(function(){
      $('.resizable-div_right').css({"border":"0px","background":"inherit"});
      $('.resizable-div1_right').css({"border":"0px","background":"inherit"});

      $('.ui-icon').css("display","none");
    });
   
</script>
<script>
//font file
   function myFunctionFontRight(id)
   {
     
     var font_name = $('#font_pr_right'+id).attr('name');
     var price = $('#font_pr_right'+id).attr('price');
     var name = $('#font_pr_right'+id).attr('fname');
     $(".title_one_right").append('<style type="text/css">@font-face {font-family: '+name+';src: url("../../fontFile/'+font_name+'");}</style>');
     $(".title_one_right").css("font-family",name);

     $('.title_two_right').append('<style type="text/css">@font-face {font-family: '+name+';src: url("../../fontFile/'+font_name+'");}</style>');
     $('.title_two_right').css("font-family",name);
     $('.title_three_right').append('<style type="text/css">@font-face {font-family: '+name+';src: url("../../fontFile/'+font_name+'");}</style>');
     $('.title_three_right').css("font-family",name);
     $('.font_one_right').html("Font Name : - " + font_name);
     $('.font_price_right').html(", Font Price : - " + price);
     $('.fontRemove_right').show();
     $('.font_one_right').show();
     $('.font_price_right').show();
     $(this).unbind("change");

   }

   $('.fontRemove_right').click(function(){
      $('.font_r_right').val('');
      var name = "";
      $(".title_one_right").css("font-family",name);
      $('.title_two_right').css("font-family",name);
      $('.title_three_right').css("font-family",name);
      $('.fontRemove_right,.font_one_right,.font_price_right').hide();
   })

  
   //End font file
  </script>
                  @endpush