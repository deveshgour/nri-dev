   

    <style>.fullscreen-container {

  display: none;

  position: fixed;

  top: 0;

  bottom: 0;

  left: 0;

  right: 0;

   

   text-align:center;

  background: rgba(90, 90, 90, 0.5);

  z-index: 9999;

}

.popdiv h1 {

	padding-top: 250px;

}



</style>

   <div class="l_c_h">

        <div class="c_h">

            <div class="left_c">

                  <div class="left right_c left_icons">

                         <a href="#" class="mini" style="font-size:23px;">+</a>

                  </div>

                  <div class="left center_icons"><!--center_icons-->

                       Ask Me!

                  </div><!--end center_icons-->        	

              </div>

              <div class="right right_c" style="width:35px;">

                <a href="#" class="logout" title="End chat" name="" style="display:none;"><img src="chat/logout.png"></a>        	

              </div>

              <div class="clear"></div>

          </div>

          <div class="chat_container" style="display: none;">

        

    

        <div class="chat_message" style="display: none;">

          <input type="hidden" class="my_user" value="">

                </div>

          <div class="chat_text_area" style="display:none;">

                <textarea name="messag_send" class="messag_send" id="messag_send" placeholder="Enter Your Message and press CTRL"></textarea>

              </div>

            <div class="chat_entry">

                   <form name="chat_form" class="chat_form has-validation-callback" id="chat_form" onsubmit="return false;">

                    <p>

                        <input type="text" data-validation="required" name="your_name" id="user_chat" class="user_chat" placeholder="Enter Your Name">

                        <input type="hidden" name="id" class="id" value="4919738359">

                        <input type="hidden" name="web" class="web" value="webaddress/">

                    </p>

                    <p>

                        <input type="text" data-validation="email" name="email_id" id="email_chat" class="email_chat" placeholder="Enter Your Email">

                    </p>

                    <p>

                        <input type="text" data-validation="number" name="mobile_number" id="number_chat" class="number_chat" placeholder="Enter Your Number">

                    </p>

                    <p style="text-align:left;">

                        <input type="submit" name="chat_submit" class="chat_submit" id="chat_submit" value="Start Chat">

                    </p>

                  </form>

              </div>

          </div>

      </div>

 <!-- <button type="button" class="btn askMe">Ask </br> me</button> -->

 <div class="fullscreen-container">

  <div id="popdiv" class="popdiv">

    <h1>

      Email sent successfully

    </h1>

   

  </div> </div>

 <!--<div class="modal fade" id="loadermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->

 <div class="modal fade vertical-center col-md-12 col-md-offset-5 tetttee" id="loadermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

		    <div class="modal-header">

                <button type="button" class="close" 

                   data-dismiss="modal">

                       <span aria-hidden="true">&times;</span>

                       <span class="sr-only">Close</span>

                </button>

           

            </div>

            <div class="modal-body"> 

			<center>

                <img style="height:50px;width:20px;" src="<?php echo base_url().'images/loaderimg.gif'; ?>" />

			</center>

			</div>

        </div>

    </div>

</div>



<!--------------------------------mood modal------------------------------------- -->

				

				 <div class="modal" tabindex="-1" role="dialog" id="moodModal">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">Mood</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <?php echo $smiley_table; ?>

                </div>

                <!--<div class="modal-footer">

                    <button type="button" class="btn btn-primary">Post</button>

                </div>-->

            </div>

        </div>

    </div>

				

				

				

				

				

				

				

				<!---------------------------------------------------------------------------------- -->

				

				<!--------------------------------social share modal------------------------------------- -->

				

				 <div class="modal" tabindex="-1" role="dialog" id="soacialModal">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

               

                <div class="modal-body">

				<p>facebook</p>

<a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?href='+encodeURIComponent(location.href),'facebook-share-dialog','width=626,height=436');return false;"><img src="<?php echo base_url(); ?>images/facebook.png" ></a>





                </div>

                

            </div>

        </div>

    </div>

				

				

				

				

				

				

				

				<!---------------------------------------------------------------------------------- -->



    <script src="<?php echo base_url() ?>js/jquery-3.6.0.min.js"></script>

	

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="<?php echo base_url() ?>js/popper.min.js"></script>

    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>

	<script src="<?php echo base_url(); ?>js/jquery.validate.js"></script>

    <script>

        $('.chatIcon').on('click', function () {

            $('.rightContent').addClass('openChat');

        });

        $('.closeChat').on('click', function () {

            $('.rightContent').removeClass('openChat');

        })



       function moodModal() {

            $('#moodModal').modal('show');

			

        }



        function eventModal() {

            $('#eventModal').modal('show');

        }

        

        function soacialModal() {

            $('#soacialModal').modal('show');

        }





        function creategroupModal() {

            $('#creategroupModal').modal('show');

        }



        function interestingFactsModal() {

            $('#interestingFactsModal').modal('show');

        }



        function loginModal() {

            $('#loginModal').modal('show');



            $('#signupModal').modal('hide');

        }



        function signupModal() {

            $('#signupModal').modal('show');

        }



    </script>



    <script>

        $(function () {

            $(".c_h").click(function (e) {

                if ($(".chat_container").is(":visible")) {

                    $(".c_h .right_c .mini").text("+")

                } else {

                    $(".c_h .right_c .mini").text("-")

                }

                $(".chat_container").slideToggle("slow");

                return false

            });

        });

    </script>

	

	<script>

	/* post upload and ajax scroll pagination */

	$(document).ready(function (e) 

  {

	$(window).scroll(function()

	{

		scrollMore();

	});

	$("#newuploadimage").on('submit',(function(e) 

	{ 

	    $("#loadermodal").modal('show');

		e.preventDefault();

		

		$("#message").empty();

		$('#loading').show();

		$.ajax

		({

			url: "<?php echo base_url(); ?>Userdashboard/postUpload",

			type: "POST",             

			data: new FormData(this), 

			dataType: "json",

			contentType: false,       

			cache: false,             

			processData:false,        

			success: function(data)   

			{

				

			  if(data.code == 100){

				  $("#loadermodal").modal('hide');

				window.location.reload();

			  }else{

				  

				  $("#loadermodal").modal('hide');

				  alert(data.message);

				  window.location.reload();

			  } 

			}

	    });

	}));

	

	$("#visituploadimage").on('submit',(function(e) 

	{ 

	    $("#loadermodal").modal('show');

		e.preventDefault();

		

		$("#message").empty();

		$('#loading').show();

		$.ajax

		({

			url: "<?php echo base_url(); ?>Recent_visit/postUpload",

			type: "POST",             

			data: new FormData(this), 

			dataType: "json",

			contentType: false,       

			cache: false,             

			processData:false,        

			success: function(data)   

			{

				

			  if(data.code == 100){

				  $("#loadermodal").modal('hide');

				window.location.reload();

			  }else{

				  

				  $("#loadermodal").modal('hide');

				  alert(data.message);

				  window.location.reload();

			  } 

			}

	    });

	}));

	

	$("#eventuploadimage").on('submit',(function(e) 

	{ 

	    $("#loadermodal").modal('show');

		e.preventDefault();

		

		$("#message").empty();

		$('#loading').show();

		$.ajax

		({

			url: "<?php echo base_url(); ?>Event/postUpload",

			type: "POST",             

			data: new FormData(this), 

			dataType: "json",

			contentType: false,       

			cache: false,             

			processData:false,        

			success: function(data)   

			{

				

			  if(data.code == 100){

				  $("#loadermodal").modal('hide');

				window.location.reload();

			  }else{

				  

				  $("#loadermodal").modal('hide');

				  alert(data.message);

				  window.location.reload();

			  } 

			}

	    });

	}));

	

  });

  

  function scrollMore()

{ 

  if($(window).scrollTop() == ($(document).height() - $(window).height()))

  {

	$(window).unbind("scroll");

	var records = '<?php echo $count_total;?>';

	

	var offset = $('[id^="myData_"]').length;

	

	  if(records != offset)

	  { 

		$('#main-post-sec').append('<img id="loader_img" style="width:50px" src="<?php echo base_url(); ?>images/ajax-loader.gif" />');

		<?php if($this->uri->segment(1) == "home"){ ?>

		loadMoreData(offset);

		<?php }elseif($this->uri->segment(1) == "myprofile"){ ?>

		loadMoremyData(offset);

		<?php }elseif($this->uri->segment(1) == "major_missing"){ ?>

		loadMoremissingData(offset);

		<?php }elseif($this->uri->segment(1) == "recent_visit"){ ?>

         loadMorevisitData(offset);

        <?php }elseif($this->uri->segment(1) == "event"){  ?>

		loadMoreeventData(offset);

		<?php }elseif($this->uri->segment(1) == "gov_detail"){  ?>

		loadMoregovData(offset);

		<?php } ?>

	  }

  } 

}



  function loadMoreData(offset)

  {	

	$.ajax({

		type: 'post',

		async:false,

		url: '<?php echo base_url(); ?>Userdashboard/get_offset/',

		data: 'offset='+offset,

		success: function(data)

		{		

			$("#loaderImg").empty();

			$("#loaderImg").hide();

			$('#main-post-sec').append(data);

			$('#loader_img').remove();

		},

		error: function(data)

		{

		  alert("ajax error occured…"+data);

		}

	}).done(function()

	{	

	    

		$(window).bind("scroll",function()

		{

		

		   scrollMore();	

	    });

	});

}



function loadMorevisitData(offset)

  {	

	$.ajax({

		type: 'post',

		async:false,

		url: '<?php echo base_url(); ?>Recent_visit/get_offset/',

		data: 'offset='+offset,

		success: function(data)

		{		

			$("#loaderImg").empty();

			$("#loaderImg").hide();

			$('#main-post-sec').append(data);

			$('#loader_img').remove();

		},

		error: function(data)

		{

		  alert("ajax error occured…"+data);

		}

	}).done(function()

	{	

	    

		$(window).bind("scroll",function()

		{

		

		   scrollMore();	

	    });

	});

}



 function loadMoregovData(offset)

  {	

	$.ajax({

		type: 'post',

		async:false,

		url: '<?php echo base_url(); ?>Userprofile/get_govoffset/',

		data: 'offset='+offset,

		success: function(data)

		{		

			$("#loaderImg").empty();

			$("#loaderImg").hide();

			$('#main-post-sec').append(data);

			$('#loader_img').remove();

		},

		error: function(data)

		{

		  alert("ajax error occured…"+data);

		}

	}).done(function()

	{	

	    

		$(window).bind("scroll",function()

		{

		

		   scrollMore();	

	    });

	});

}



 function loadMoremyData(offset)

  {	

	$.ajax({

		type: 'post',

		async:false,

		url: '<?php echo base_url(); ?>Userprofile/get_offset/',

		data: 'offset='+offset,

		success: function(data)

		{		

			$("#loaderImg").empty();

			$("#loaderImg").hide();

			$('#main-post-sec').append(data);

			$('#loader_img').remove();

		},

		error: function(data)

		{

		  alert("ajax error occured…"+data);

		}

	}).done(function()

	{	

	    

		$(window).bind("scroll",function()

		{

		

		   scrollMore();	

	    });

	});

}



function loadMoreeventData(offset)

  {	

	$.ajax({

		type: 'post',

		async:false,

		url: '<?php echo base_url(); ?>Event/get_offset/',

		data: 'offset='+offset,

		success: function(data)

		{		

			$("#loaderImg").empty();

			$("#loaderImg").hide();

			$('#main-post-sec').append(data);

			$('#loader_img').remove();

		},

		error: function(data)

		{

		  alert("ajax error occured…"+data);

		}

	}).done(function()

	{	

	    

		$(window).bind("scroll",function()

		{

		

		   scrollMore();	

	    });

	});

}

	</script>

	



<script>

    $(function () {

        $("#datepicker1").datepicker({

            changeMonth: true,

            changeYear: true,

            yearRange: '-100:+0',

			dateFormat: 'yy-mm-dd'

        });

    });

</script>

<script>



/* validation for profile */

	$(document).ready(function() {

  $("#myprofile").validate({

    rules: {

            firstname: {

                required: true

            },

            lastname: {

                required: true

            },

			email: {

                required: true,

				email: true

            },

			gender: {

				required: true,

			},

			dob: {

            required: true,

            

            

        },

		contact_number: {

			required: true,

			numericOnly:true

		},

		permanent_country: {

			required: true,

			

		},

		permanent_address: {

			required: true,

			

		},

		local_country: {

			required: true,

			

		},

		local_address: {

			required: true,

			

		}

    },

    messages: {

             firstname: {

                required: "Firstname field is required",

            },

			lastname: {

                required: "Lastname field is required",

            },

			email: {

                required: "Email field is required",

				

            },

			gender: {

                required: "Gender field is required",

            },

			dob: {

                required: "DOB field is required",

				

            },

			contact_number: {

                required: "Contact number field is required",

				

            },

			permanent_country: {

                required: "permanent country  field is required",

				

            },

			permanent_address: {

                required: "permanent address  field is required",

				

            },

			local_country: {

                required: "local country  field is required",

				

            },

			local_address: {

                required: "local address field is required",

				

            },

    },

    errorElement: "span",

        errorPlacement: function(error, element) {

                error.appendTo(element.parent());

        }



  });

});



$.validator.addMethod('numericOnly', function (value) {

       return /^[0-9]+$/.test(value);

}, 'Please only enter numeric values (0-9)');







/*  read image for profile page */

function readURL(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();



                reader.onload = function (e) {

                    $('#blah')

                        .attr('src', e.target.result);

                        

                };



                reader.readAsDataURL(input.files[0]);

            }

        }

		

		

/* like post */



 $(document).on('click','.like_post',function(){

	 $(this).append('<img id="loading_img" style="width:20px" src="<?php echo base_url(); ?>images/url-loader.gif" />');

	 var like = $(this);

     var postid = $(this).attr('data-postid');

	 var status = $(this).attr('data-status');

	 var ltype = $(this).attr('data-type');

	 var author = $(this).attr('data-author');

	$.ajax 

		({

			url: "<?php echo base_url(); ?>like",

			type: "POST",             

			data: "post=" + postid + "&ltype=" + ltype + "&status=" + status + "&author=" + author, 

			dataType: "json",

			success: function(response)   

			{ 

			

               $("#loading_img").remove();				

			   if(response.success){

				   like.css('color','#009688');

				    $("#likecountbox-"+postid).show();

					   $("#likecountbox-"+postid).find('span').text(response.like+ " people like this");

				   if(response.like == 0){

					   $("#likecountbox-"+postid).hide();

				   }else{

					   $("#likecountbox-"+postid).show();

					   $("#likecountbox-"+postid).find('a').text(response.like+ " people");

				   }

				   

				   /*if(response.type == 1){

					   $("#dislike-"+postid).css('color','#7f7f7f');

				   }else{

					   $("#like-"+postid).css('color','#7f7f7f');

				   }*/

			   }else{

				    $("a").removeAttr("style");

					$("#likecountbox-"+postid).show();

					//$("#likecountbox-"+postid).hide();

					   $("#likecountbox-"+postid).find('span').text(response.like+ " people like this");

			   }

			    

			}

	    });

 });	

 

  $(document).on('keyup','.newpostcomment', function(e){

	 var comment_id = $(this).attr('data-cmtid');

   var postcomment = $(".post_comment_"+comment_id).val();

    if(postcomment != ''){

		$('.postVal_'+comment_id).prop('disabled', false);

	}else{

		$('.postVal_'+comment_id).prop('disabled', true);

	}

}); 



$(document).on('submit','[id^="cmtform-"]', function(e){ 

	    var pid = $(this).attr('data-postid');

		var uid = $(this).attr('data-userid');

		//alert('test');

		//$("#loadermodal").modal('show');

        e.preventDefault();

        var formData = new FormData(this);



        $.ajax({

            type:'POST',

            url: "<?php echo base_url().'Userdashboard/addcomment'; ?>",

            data:formData,

            cache:false,

			dataType:'json',

            contentType: false,

            processData: false,

            success:function(data){ 

			 $('.post_comment-'+pid).val('');

			//$("#loadermodal").modal('hide');

				 $('.commentshow-'+pid).html(data.list);

				

				 $('.totalcmt'+pid).html(data.totalcommentcount);

			    

            }

        });

    }); 

	

		$(document).on('click','.moreimage',function(){

		var offset = $(this).attr('data-page');

		

		var postid = $(this).attr('data-postid');

		//$(this).remove();

		$(this).parent().parent().remove();

			$.post("<?php echo base_url().'Userdashboard/get_comments'; ?>",  

			{offset: offset, postid: postid },

					function(response){ 

						  if(response.success){

							 

							  $(".sds"+postid).append(response.list);

						  }

			}, "json");

	});

	

	$(document).on('click','[class^=trashcomments]',function(e){

		//$(document).on('click','.trashcomment',function(){

		  var postid = $(this).attr('data-postid');

		  var commentid = $(this).attr('data-commentid'); 

		  if(confirm("Are you sure you want to delete this comment?")){

     		$.ajax 

		({

			url: "<?php echo base_url(); ?>Userdashboard/delete_comment",

			type: "POST",             

			data: "comment_id=" + commentid + "&postid=" + postid,

            dataType: "json", 			

			success: function(){

				

				}

			});

			window.location.reload();

		  //  $(this).parents('.newflex'+commentid).animate({ backgroundColor: "#fbc7c7" }, "fast")

		//	.animate({ opacity: "hide" }, "slow");

			}

			return false;

		});

		

		

	

	$(document).on('click','[class^=postdel]',function(e){		

		 var postid = $(this).attr('data-postid'); 

		 

		  if(confirm("Are you sure you want to delete this post?")){

     		$.ajax 

		({

			url: "<?php echo base_url(); ?>Userdashboard/post_delete",

			type: "POST",             

			data: "post_id=" + postid,

            dataType: "json", 			

			success: function(){

				

				}

			});

			window.location.reload();

		  //  $(this).parents('.newflex'+commentid).animate({ backgroundColor: "#fbc7c7" }, "fast")

		//	.animate({ opacity: "hide" }, "slow");

			}

			return false;

	});

	

	$("#friend_search").keyup(function(){

  var name = $('#friend_search').val();

       

       if (name == "") {

           

           $("#display").html("");

       }

       

       else {

          

           $.ajax({

               

               type: "POST",

               

               url: "<?php echo base_url(); ?>search_friends",

               

               data: {

                  

                   search: name

               },

              

               success: function(html) {

                   

                   $("#display").html(html);

               }

		   });

	   }



});





/* friend request section */

$(document).on('click','.adfriend',function(){

		var userid = $(this).attr('data-userid');

	

		$.post("<?php echo base_url().'friendRequest'; ?>",  

		{ userid: userid },

				function(response){

					if(response.success == true){

				$(".display_msg").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">x</button>'+response.message+'</div>');

					$(".hideshow").html('<a class="request_delete btn btn-primary" data-userid="'+userid+'"  href="javascript:void(0);">Request Sent</a>');

					}else{

				$(".display_msg").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">x</button>'+response.message+'</div>');		

					}

					 

		}, "json");

	});

	

	$(document).on('click','.request_delete',function(){

		var userid = $(this).attr('data-userid');

	

		$.post("<?php echo base_url().'deleteRequest'; ?>",  

		{ userid: userid },

				function(response){

					if(response.success == true){

				$(".display_msg").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">x</button>'+response.message+'</div>');

					$(".hideshow").html('<a class="adfriend btn btn-primary" data-userid="'+userid+'" href="javascript:void(0);">Add Friend</a>');

					}else{

				$(".display_msg").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">x</button>'+response.message+'</div>');		

					}

					 

		}, "json");

	});

	

	

	$(document).on('click','.requestfriend_delete',function(){

		var userid = $(this).attr('data-userid');

	

		$.post("<?php echo base_url().'Userprofile/deletefriendRequest'; ?>",  

		{ userid: userid },

				function(response){

					if(response.success == true){

				$(".display_msg").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">x</button>'+response.message+'</div>');

				window.location.reload();

				}

					 

		}, "json");

	});

	

	$(document).on('click','.accept_request',function(){

		

			$( this ).before( '<i class="fa fa-spinner fa-pulse"></i>' );

			var listid = $(this).attr("data-listid");

			var frnd_id = $(this).attr("data-frndid");

			$.post("<?php echo base_url().'Userprofile/respondRequest'; ?>",  

			{ listid: listid, frnd_id: frnd_id },

					function(response){

						 if(response.success){

							 $(".display_msg").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">x</button>'+response.message+'</div>');

							 window.location.reload();

							// $("#frnd_list").load(location.href + " #frnd_list_sub");

						 }

			}, "json");

		});

	

		/* -----major missing----- */	

	$(document).ready(function (e) 

  {

	$(window).scroll(function()

	{

		scrollMoremajor();

	});

	$("#majoruploadimage").on('submit',(function(e) 

	{ 

	    $("#loadermodal").modal('show');

		e.preventDefault();

		

		$("#message").empty();

		$('#loading').show();

		$.ajax

		({

			url: "<?php echo base_url(); ?>Major_missing/postUpload",

			type: "POST",             

			data: new FormData(this), 

			dataType: "json",

			contentType: false,       

			cache: false,             

			processData:false,        

			success: function(data)   

			{

				

			  if(data.code == 100){

				  $("#loadermodal").modal('hide');

				window.location.reload();

			  }else{

				  

				  $("#loadermodal").modal('hide');

				  alert(data.message);

				  window.location.reload();

			  } 

			}

	    });

	}));

	

  });

  

  function scrollMoremajor()

{ 

  if($(window).scrollTop() == ($(document).height() - $(window).height()))

  {

	$(window).unbind("scroll");

	var records = '<?php echo $count_total;?>';

	

	var offset = $('[id^="myData_"]').length;

	

	  if(records != offset)

	  { 

		$('#main-post-sec').append('<img id="loader_img" style="width:50px" src="<?php echo base_url(); ?>images/ajax-loader.gif" />');

		

		loadMoremissingData(offset);

		

	  }

  } 

}



  function loadMoremissingData(offset)

  {	

	$.ajax({

		type: 'post',

		async:false,

		url: '<?php echo base_url(); ?>Major_missing/get_offset/',

		data: 'offset='+offset,

		success: function(data)

		{		

			$("#loaderImg").empty();

			$("#loaderImg").hide();

			$('#main-post-sec').append(data);

			$('#loader_img').remove();

		},

		error: function(data)

		{

		  alert("ajax error occured…"+data);

		}

	}).done(function()

	{	

	    

		$(window).bind("scroll",function()

		{

		

		   scrollMore();	

	    });

	});

}





/*  like major */



 $(document).on('click','.like_major',function(){

	 $(this).append('<img id="loading_img" style="width:20px" src="<?php echo base_url(); ?>images/url-loader.gif" />');

	 var like = $(this);

     var postid = $(this).attr('data-postid');

	 var status = $(this).attr('data-status');

	 var ltype = $(this).attr('data-type');

	 var author = $(this).attr('data-author');

	$.ajax 

		({

			url: "<?php echo base_url(); ?>Major_missing/like",

			type: "POST",             

			data: "post=" + postid + "&ltype=" + ltype + "&status=" + status + "&author=" + author, 

			dataType: "json",

			success: function(response)   

			{ 

			

               $("#loading_img").remove();				

			   if(response.success){

				   like.css('color','#009688');

				    $("#likecountbox-"+postid).show();

					   $("#likecountbox-"+postid).find('span').text(response.like+ " people like this");

				   if(response.like == 0){

					   $("#likecountbox-"+postid).hide();

				   }else{

					   $("#likecountbox-"+postid).show();

					   $("#likecountbox-"+postid).find('a').text(response.like+ " people");

				   }

				   

				   /*if(response.type == 1){

					   $("#dislike-"+postid).css('color','#7f7f7f');

				   }else{

					   $("#like-"+postid).css('color','#7f7f7f');

				   }*/

			   }else{

				    $("a").removeAttr("style");

					$("#likecountbox-"+postid).show();

					//$("#likecountbox-"+postid).hide();

					   $("#likecountbox-"+postid).find('span').text(response.like+ " people like this");

			   }

			    

			}

	    });

 });



$(document).on('click','[class^=majordel]',function(e){		

		 var postid = $(this).attr('data-postid'); 

		 

		  if(confirm("Are you sure you want to delete this major missing?")){

     		$.ajax 

		({

			url: "<?php echo base_url(); ?>Major_missing/post_delete",

			type: "POST",             

			data: "post_id=" + postid,

            dataType: "json", 			

			success: function(){

				

				}

			});

			window.location.reload();

		  //  $(this).parents('.newflex'+commentid).animate({ backgroundColor: "#fbc7c7" }, "fast")

		//	.animate({ opacity: "hide" }, "slow");

			}

			return false;

	}); 

	

	$(document).on('submit','[id^="cmtmajorform-"]', function(e){ 

	    var pid = $(this).attr('data-postid');

		var uid = $(this).attr('data-userid');

		//alert('test');

		//$("#loadermodal").modal('show');

		var postComment = $("#post_comment").val();

		

        e.preventDefault();

        var formData = new FormData(this);

     

        $.ajax({

            type:'POST',

            url: "<?php echo base_url().'Major_missing/addcomment'; ?>",

            data:formData,

            cache:false,

			dataType:'json',

            contentType: false,

            processData: false,

            success:function(data){ 

			 $('.post_comment-'+pid).val('');

			//$("#loadermodal").modal('hide');

				 $('.commentshow-'+pid).html(data.list);

				

				 $('.totalcmt'+pid).html(data.totalcommentcount);

			    

            }

        });



    }); 

	

			$(document).on('click','.moremajorimage',function(){

		var offset = $(this).attr('data-page');

		

		var postid = $(this).attr('data-postid');

		//$(this).remove();

		$(this).parent().parent().remove();

			$.post("<?php echo base_url().'Major_missing/get_comments'; ?>",  

			{offset: offset, postid: postid },

					function(response){ 

						  if(response.success){

							 

							  $(".sds"+postid).append(response.list);

						  }

			}, "json");

	});

	

 	$(document).on('click','.trashmajorcomment',function(){

		  var postid = $(this).attr('data-postid');

		  var commentid = $(this).attr('data-commentid'); 

		  if(confirm("Are you sure you want to delete this comment?")){

     		$.ajax 

		({

			url: "<?php echo base_url(); ?>Major_missing/delete_comment",

			type: "POST",             

			data: "comment_id=" + commentid + "&postid=" + postid,

            dataType: "json", 			

			success: function(){

				

				}

			});

			window.location.reload();

		  //  $(this).parents('.newflex'+commentid).animate({ backgroundColor: "#fbc7c7" }, "fast")

		//	.animate({ opacity: "hide" }, "slow");

			}

			return false;

		});

		

		/*  like visit */



 $(document).on('click','.like_visit',function(){

	 $(this).append('<img id="loading_img" style="width:20px" src="<?php echo base_url(); ?>images/url-loader.gif" />');

	 var like = $(this);

     var postid = $(this).attr('data-postid');

	 var status = $(this).attr('data-status');

	 var ltype = $(this).attr('data-type');

	 var author = $(this).attr('data-author');

	$.ajax 

		({

			url: "<?php echo base_url(); ?>Recent_visit/like",

			type: "POST",             

			data: "post=" + postid + "&ltype=" + ltype + "&status=" + status + "&author=" + author, 

			dataType: "json",

			success: function(response)   

			{ 

			

               $("#loading_img").remove();				

			   if(response.success){

				   like.css('color','#009688');

				    $("#likecountbox-"+postid).show();

					   $("#likecountbox-"+postid).find('span').text(response.like+ " people like this");

				   if(response.like == 0){

					   $("#likecountbox-"+postid).hide();

				   }else{

					   $("#likecountbox-"+postid).show();

					   $("#likecountbox-"+postid).find('a').text(response.like+ " people");

				   }

				   

				   /*if(response.type == 1){

					   $("#dislike-"+postid).css('color','#7f7f7f');

				   }else{

					   $("#like-"+postid).css('color','#7f7f7f');

				   }*/

			   }else{

				    $("a").removeAttr("style");

					$("#likecountbox-"+postid).show();

					//$("#likecountbox-"+postid).hide();

					   $("#likecountbox-"+postid).find('span').text(response.like+ " people like this");

			   }

			    

			}

	    });

 });



$(document).on('click','[class^=visitdel]',function(e){		

		 var postid = $(this).attr('data-postid'); 

		 

		  if(confirm("Are you sure you want to delete this recent visit?")){

     		$.ajax 

		({

			url: "<?php echo base_url(); ?>Recent_visit/post_delete",

			type: "POST",             

			data: "post_id=" + postid,

            dataType: "json", 			

			success: function(){

				

				}

			});

			window.location.reload();

		  //  $(this).parents('.newflex'+commentid).animate({ backgroundColor: "#fbc7c7" }, "fast")

		//	.animate({ opacity: "hide" }, "slow");

			}

			return false;

	}); 

	

	$(document).on('submit','[id^="cmtvisitform-"]', function(e){ 

	    var pid = $(this).attr('data-postid');

		var uid = $(this).attr('data-userid');

		//alert('test');

		//$("#loadermodal").modal('show');

		var postComment = $("#post_comment").val();

		

        e.preventDefault();

        var formData = new FormData(this);

     

        $.ajax({

            type:'POST',

            url: "<?php echo base_url().'Recent_visit/addcomment'; ?>",

            data:formData,

            cache:false,

			dataType:'json',

            contentType: false,

            processData: false,

            success:function(data){ 

			 $('.post_comment-'+pid).val('');

			//$("#loadermodal").modal('hide');

				 $('.commentshow-'+pid).html(data.list);

				

				 $('.totalcmt'+pid).html(data.totalcommentcount);

			    

            }

        });



    }); 

	

			$(document).on('click','.morevisitimage',function(){

		var offset = $(this).attr('data-page');

		

		var postid = $(this).attr('data-postid');

		//$(this).remove();

		$(this).parent().parent().remove();

			$.post("<?php echo base_url().'Recent_visit/get_comments'; ?>",  

			{offset: offset, postid: postid },

					function(response){ 

						  if(response.success){

							 

							  $(".sds"+postid).append(response.list);

						  }

			}, "json");

	});

	

 	$(document).on('click','.trashvisitcomment',function(){

		  var postid = $(this).attr('data-postid');

		  var commentid = $(this).attr('data-commentid'); 

		  if(confirm("Are you sure you want to delete this comment?")){

     		$.ajax 

		({

			url: "<?php echo base_url(); ?>Recent_visit/delete_comment",

			type: "POST",             

			data: "comment_id=" + commentid + "&postid=" + postid,

            dataType: "json", 			

			success: function(){

				

				}

			});

			window.location.reload();

		  //  $(this).parents('.newflex'+commentid).animate({ backgroundColor: "#fbc7c7" }, "fast")

		//	.animate({ opacity: "hide" }, "slow");

			}

			return false;

		});

		

		

		

		$(window).scroll(function() {    

    var scroll = $(window).scrollTop();



    if (scroll >= 30) {

        $("body").addClass("darkHeader");

    }

	else{

		$("body").removeClass("darkHeader");

	}

	});

	

	

			/*  like event */



 $(document).on('click','.like_event',function(){

	 $(this).append('<img id="loading_img" style="width:20px" src="<?php echo base_url(); ?>images/url-loader.gif" />');

	 var like = $(this);

     var postid = $(this).attr('data-postid');

	 var status = $(this).attr('data-status');

	 var ltype = $(this).attr('data-type');

	 var author = $(this).attr('data-author');

	$.ajax 

		({

			url: "<?php echo base_url(); ?>Event/like",

			type: "POST",             

			data: "post=" + postid + "&ltype=" + ltype + "&status=" + status + "&author=" + author, 

			dataType: "json",

			success: function(response)   

			{ 

			

               $("#loading_img").remove();				

			   if(response.success){

				   like.css('color','#009688');

				    $("#likecountbox-"+postid).show();

					   $("#likecountbox-"+postid).find('span').text(response.like+ " people like this");

				   if(response.like == 0){

					   $("#likecountbox-"+postid).hide();

				   }else{

					   $("#likecountbox-"+postid).show();

					   $("#likecountbox-"+postid).find('a').text(response.like+ " people");

				   }

				   

				   /*if(response.type == 1){

					   $("#dislike-"+postid).css('color','#7f7f7f');

				   }else{

					   $("#like-"+postid).css('color','#7f7f7f');

				   }*/

			   }else{

				    $("a").removeAttr("style");

					$("#likecountbox-"+postid).show();

					//$("#likecountbox-"+postid).hide();

					   $("#likecountbox-"+postid).find('span').text(response.like+ " people like this");

			   }

			    

			}

	    });

 });



$(document).on('click','[class^=eventdel]',function(e){		

		 var postid = $(this).attr('data-postid'); 

		 

		  if(confirm("Are you sure you want to delete this recent visit?")){

     		$.ajax 

		({

			url: "<?php echo base_url(); ?>Event/post_delete",

			type: "POST",             

			data: "post_id=" + postid,

            dataType: "json", 			

			success: function(){

				

				}

			});

			window.location.reload();

		  //  $(this).parents('.newflex'+commentid).animate({ backgroundColor: "#fbc7c7" }, "fast")

		//	.animate({ opacity: "hide" }, "slow");

			}

			return false;

	}); 

	

	$(document).on('submit','[id^="cmteventform-"]', function(e){ 

	    var pid = $(this).attr('data-postid');

		var uid = $(this).attr('data-userid');

		//alert('test');

		//$("#loadermodal").modal('show');

		var postComment = $("#post_comment").val();

		

        e.preventDefault();

        var formData = new FormData(this);

     

        $.ajax({

            type:'POST',

            url: "<?php echo base_url().'Event/addcomment'; ?>",

            data:formData,

            cache:false,

			dataType:'json',

            contentType: false,

            processData: false,

            success:function(data){ 

			 $('.post_comment-'+pid).val('');

			//$("#loadermodal").modal('hide');

				 $('.commentshow-'+pid).html(data.list);

				

				 $('.totalcmt'+pid).html(data.totalcommentcount);

			    

            }

        });



    }); 

	

			$(document).on('click','.moreeventimage',function(){

		var offset = $(this).attr('data-page');

		

		var postid = $(this).attr('data-postid');

		//$(this).remove();

		$(this).parent().parent().remove();

			$.post("<?php echo base_url().'Event/get_comments'; ?>",  

			{offset: offset, postid: postid },

					function(response){ 

						  if(response.success){

							 

							  $(".sds"+postid).append(response.list);

						  }

			}, "json");

	});

	

 	$(document).on('click','.trasheventcomment',function(){

		  var postid = $(this).attr('data-postid');

		  var commentid = $(this).attr('data-commentid'); 

		  if(confirm("Are you sure you want to delete this comment?")){

     		$.ajax 

		({

			url: "<?php echo base_url(); ?>Event/delete_comment",

			type: "POST",             

			data: "comment_id=" + commentid + "&postid=" + postid,

            dataType: "json", 			

			success: function(){

				

				}

			});

			window.location.reload();

		  //  $(this).parents('.newflex'+commentid).animate({ backgroundColor: "#fbc7c7" }, "fast")

		//	.animate({ opacity: "hide" }, "slow");

			}

			return false;

		});

		

		$(document).on('click','.cancelfrnd',function(){		

		 var frndid = $(this).attr('data-userid'); 

		 

		  

     		$.ajax 

		({

			url: "<?php echo base_url(); ?>Event/cancelfrnd",

			type: "POST",             

			data: "post_id=" + frndid,

           // dataType: "json", 			

			success: function(){

				window.location.reload();

				}

			});

			//

		  //  $(this).parents('.newflex'+commentid).animate({ backgroundColor: "#fbc7c7" }, "fast")

		//	.animate({ opacity: "hide" }, "slow");

			

		

	}); 

	

	 $(document).on('click','.like_gov',function(){

	 $(this).append('<img id="loading_img" style="width:20px" src="<?php echo base_url(); ?>images/url-loader.gif" />');

	 var like = $(this);

     var postid = $(this).attr('data-postid');

	 var status = $(this).attr('data-status');

	 var ltype = $(this).attr('data-type');

	 var author = $(this).attr('data-author');

	$.ajax 

		({

			url: "<?php echo base_url(); ?>Userprofile/like_gov",

			type: "POST",             

			data: "post=" + postid + "&ltype=" + ltype + "&status=" + status + "&author=" + author, 

			dataType: "json",

			success: function(response)   

			{ 

			

               $("#loading_img").remove();				

			   if(response.success){

				   like.css('color','#009688');

				    $("#likecountbox-"+postid).show();

					   $("#likecountbox-"+postid).find('span').text(response.like+ " people like this");

				   if(response.like == 0){

					   $("#likecountbox-"+postid).hide();

				   }else{

					   $("#likecountbox-"+postid).show();

					   $("#likecountbox-"+postid).find('a').text(response.like+ " people");

				   }

				   

				   /*if(response.type == 1){

					   $("#dislike-"+postid).css('color','#7f7f7f');

				   }else{

					   $("#like-"+postid).css('color','#7f7f7f');

				   }*/

			   }else{

				    $("a").removeAttr("style");

					$("#likecountbox-"+postid).show();

					//$("#likecountbox-"+postid).hide();

					   $("#likecountbox-"+postid).find('span').text(response.like+ " people like this");

			   }

			    

			}

	    });

 });

 

 	$(document).on('submit','[id^="cmtgovform-"]', function(e){ 

	    var pid = $(this).attr('data-postid');

		var uid = $(this).attr('data-userid');

		//alert('test');

		//$("#loadermodal").modal('show');

		var postComment = $("#post_comment").val();

		

        e.preventDefault();

        var formData = new FormData(this);

     

        $.ajax({

            type:'POST',

            url: "<?php echo base_url().'Userprofile/addcommentgov'; ?>",

            data:formData,

            cache:false,

			dataType:'json',

            contentType: false,

            processData: false,

            success:function(data){ 

			 $('.post_comment-'+pid).val('');

			//$("#loadermodal").modal('hide');

				 $('.commentshow-'+pid).html(data.list);

				

				 $('.totalcmt'+pid).html(data.totalcommentcount);

			    

            }

        });



    }); 

	

	$(document).on('click','.moregovimage',function(){

		var offset = $(this).attr('data-page');

		

		var postid = $(this).attr('data-postid');

		//$(this).remove();

		$(this).parent().parent().remove();

			$.post("<?php echo base_url().'Userprofile/get_gov_comments'; ?>",  

			{offset: offset, postid: postid },

					function(response){ 

						  if(response.success){

							 

							  $(".sds"+postid).append(response.list);

						  }

			}, "json");

	});

	

	$(document).on('click','.trashgovcomment',function(){

		  var postid = $(this).attr('data-postid');

		  var commentid = $(this).attr('data-commentid'); 

		  if(confirm("Are you sure you want to delete this comment?")){

     		$.ajax 

		({

			url: "<?php echo base_url(); ?>Userprofile/delete_gov_comment",

			type: "POST",             

			data: "comment_id=" + commentid + "&postid=" + postid,

            dataType: "json", 			

			success: function(){

				

				}

			});

			window.location.reload();

		  //  $(this).parents('.newflex'+commentid).animate({ backgroundColor: "#fbc7c7" }, "fast")

		//	.animate({ opacity: "hide" }, "slow");

			}

			return false;

		});

		

		/*----------------------------like buzz------------------------------------*/



 $(document).on('click','.like_buzz',function(){

	 $(this).append('<img id="loading_img" style="width:20px" src="<?php echo base_url(); ?>images/url-loader.gif" />');

	 var like = $(this);

     var postid = $(this).attr('data-postid');

	 var status = $(this).attr('data-status');

	 var ltype = $(this).attr('data-type');

	 var author = $(this).attr('data-author');

	$.ajax 

		({

			url: "<?php echo base_url(); ?>Userprofile/like_buzz",

			type: "POST",             

			data: "post=" + postid + "&ltype=" + ltype + "&status=" + status + "&author=" + author, 

			dataType: "json",

			success: function(response)   

			{ 

			

               $("#loading_img").remove();				

			   if(response.success){

				   like.css('color','#009688');

				    $("#likecountbox-"+postid).show();

					   $("#likecountbox-"+postid).find('span').text(response.like+ " people like this");

				   if(response.like == 0){

					   $("#likecountbox-"+postid).hide();

				   }else{

					   $("#likecountbox-"+postid).show();

					   $("#likecountbox-"+postid).find('a').text(response.like+ " people");

				   }

				   

				   /*if(response.type == 1){

					   $("#dislike-"+postid).css('color','#7f7f7f');

				   }else{

					   $("#like-"+postid).css('color','#7f7f7f');

				   }*/

			   }else{

				    $("a").removeAttr("style");

					$("#likecountbox-"+postid).show();

					//$("#likecountbox-"+postid).hide();

					   $("#likecountbox-"+postid).find('span').text(response.like+ " people like this");

			   }

			    

			}

	    });

 });

 

 	$(document).on('submit','[id^="cmtbuzzform-"]', function(e){ 

	    var pid = $(this).attr('data-postid');

		var uid = $(this).attr('data-userid');

		//alert('test');

		//$("#loadermodal").modal('show');

		var postComment = $("#post_comment").val();

		

        e.preventDefault();

        var formData = new FormData(this);

     

        $.ajax({

            type:'POST',

            url: "<?php echo base_url().'Userprofile/addcommentbuzz'; ?>",

            data:formData,

            cache:false,

			dataType:'json',

            contentType: false,

            processData: false,

            success:function(data){ 

			 $('.post_comment-'+pid).val('');

			//$("#loadermodal").modal('hide');

				 $('.commentshow-'+pid).html(data.list);

				

				 $('.totalcmt'+pid).html(data.totalcommentcount);

			    

            }

        });



    }); 

	

	$(document).on('click','.morebuzzimage',function(){

		var offset = $(this).attr('data-page');

		

		var postid = $(this).attr('data-postid');

		//$(this).remove();

		$(this).parent().parent().remove();

			$.post("<?php echo base_url().'Userprofile/get_buzz_comments'; ?>",  

			{offset: offset, postid: postid },

					function(response){ 

						  if(response.success){

							 

							  $(".sds"+postid).append(response.list);

						  }

			}, "json");

	});

	

	$(document).on('click','.trashbuzzcomment',function(){

		  var postid = $(this).attr('data-postid');

		  var commentid = $(this).attr('data-commentid'); 

		  if(confirm("Are you sure you want to delete this comment?")){

     		$.ajax 

		({

			url: "<?php echo base_url(); ?>Userprofile/delete_buzz_comment",

			type: "POST",             

			data: "comment_id=" + commentid + "&postid=" + postid,

            dataType: "json", 			

			success: function(){

				

				}

			});

			window.location.reload();

		  //  $(this).parents('.newflex'+commentid).animate({ backgroundColor: "#fbc7c7" }, "fast")

		//	.animate({ opacity: "hide" }, "slow");

			}

			return false;

		});

		

		$(document).on('click','#editpost_submit',function(){ 

        var post_id = $(this).attr('data-post-id');      

	    var value = $('#edit_post_'+ post_id).val();

			$.ajax 

		({

			url: "<?php echo base_url(); ?>Userdashboard/change_post",

			type: "POST",             

			data: "value=" + value + "&post_id=" + post_id,

            dataType: "json", 			

			success: function(response)   

			{

				if(response.success)

				{

				   $('#edit_post_text_'+ post_id).text(value);

				   $("#editPost_"+ post_id).modal('hide');

				}

			}

	    });

	 

 });

 

 $(document).on('click','.replyshow',function(){  

 var comment_id = $(this).attr('data-commentid');



	$(".replyShownew_"+comment_id).toggle();

  });

  

  

   $(document).on('click','.replyCmt',function(){    

	var post_id = $(this).attr('data-post_id');

	var comment_id = $(this).attr('data-comment_id');

	var comment_user_id = $(this).attr('data-comment_user_id');

	var user_id = $(this).attr('data-user_id');

	var reply_val = $(".replycmtval_"+comment_id).val();

		$.ajax 

		({

			url: "<?php echo base_url(); ?>Userdashboard/add_reply_comment",

			type: "POST",             

			data: "post_id="+post_id+"&comment_id="+comment_id+"&comment_user_id="+comment_user_id+"&user_id="+user_id+"&reply_val="+reply_val,

            dataType: "json", 			

			success: function(response)   

			{

				if(response.success)

				{

				  $(".replycmtval_"+comment_id).val("");

				  

			//$("#loadermodal").modal('hide');

				 $('.replycommentshow-'+comment_id).html(response.list);

				

				

				}

			}

	    });

	

  });

  

   /* validation for profile */

	$(document).ready(function() {

  $("#creategroupimage").validate({

    rules: {

            group_title: {

                required: true

            },

           "groupmem[]": {

                required: true

            },

			

		},

    messages: {

             group_title: {

                required: "Title field is required",

            },

			"groupmem[]": {

                required: "Member field is required",

            },

			

    },

    errorElement: "span",

        errorPlacement: function(error, element) {

                error.appendTo(element.parent());

        }



  });

});



$("#search_group").keyup(function(){ 

	var user_id = $(this).attr('data-user_id');

	var search_value = $(this).val();

	

		$.ajax 

		({

			url: "<?php echo base_url(); ?>Userdashboard/search_group",

			type: "POST",             

			data: "user_id="+user_id+"&search_value="+search_value,            			

			success: function(data)   

			{

				

				$('.groupsearchval').html(data);

				

			}

	    });

	

  });

  

  $(document).on('click','.smilyshow',function(){ 

    var smiley_id = $(this).attr('data-id');

    var image_name = $(this).attr('data-image');	

	$.ajax 

		({

			url: "<?php echo base_url(); ?>Userdashboard/addsmiley",

			type: "POST",             

			data: "smiley_id="+smiley_id+"&image_name="+image_name,            			

			success: function(data)   

			{

				

				window.location.reload();

				

			}

	    });

	

  });

  

      /* validation for ask me */

	$(document).ready(function() {

  $("#chat_form").validate({

    rules: {

            your_name: {

                required: true

            },

           email_id: {

                required: true,

				email: true

            },

			mobile_number: {

				required:true

			}

		},

    messages: {

             your_name: {

                required: "Name field is required",

            },

			email_id: {

                required: "Email field is required",

            },

			mobile_number: {

				required: "Mobile field is required",

			}

			

    },

    errorElement: "span",

        errorPlacement: function(error, element) {

                error.appendTo(element.parent());

        }



  });

});



function validateEmail($email) {

  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

  return emailReg.test( $email );

}





  $(document).on('click','.chat_submit',function(){ 

 

  var your_name = $("#user_chat").val();

    var email_id = $("#email_chat").val();

var mobile_number = $("#number_chat").val();	

 if(your_name != '' && email_id != '' && mobile_number != '' && validateEmail(email_id)){ 

	$.ajax 

		({

			url: "<?php echo base_url(); ?>Userdashboard/ask_me",

			type: "POST",             

			data: "your_name="+your_name+"&email_id="+email_id+"&mobile_number="+mobile_number,            			

			success: function(data)   

			{

				

				 $(".fullscreen-container").fadeTo(200, 1);

				

      setTimeout(function(){// wait for 5 secs(2)

           location.reload(); // then reload the page.(3)

      }, 1000); 

   

				

			}

		

	    });

 }

  });

  

   /* like post */



 $(document).on('click','.comment_like_post',function(){

	 $(this).append('<img id="loading_img" style="width:20px" src="<?php echo base_url(); ?>images/url-loader.gif" />');

	 var commentlike = $(this);

     var postid = $(this).attr('data-postid');

	 var commentid = $(this).attr('data-commentid');

	 

	 var author = $(this).attr('data-author');

	$.ajax 

		({

			url: "<?php echo base_url(); ?>Userdashboard/comment_like",

			type: "POST",             

			data: "postid=" + postid + "&commentid=" + commentid + "&userid=" + author, 

			dataType: "json",

			success: function(response)   

			{ 

			

               $("#loading_img").remove();				

			   if(response.success){

				   commentlike.css('color','#009688');

				    $("#likecommentcountbox-"+commentid).show();

				   if(response.commentlike == 0){

					   $("#likecommentcountbox-"+commentid).hide();

				   }else{

					   $("#likecommentcountbox-"+commentid).show();

					   $("#likecommentcountbox-"+commentid).find('span').text(response.commentlike);

				   }

				   

				 

			   }else{

				    $(".comment_like_post").removeAttr("style");

					$("#likecommentcountbox-"+commentid).show();

					   $("#likecommentcountbox-"+commentid).find('span').text(response.commentlike);

			   }

			    

			}

	    });

 });

 

  /* like post */



 $(document).on('click','.replycomment_like_post',function(){

	 $(this).append('<img id="loading_img" style="width:20px" src="<?php echo base_url(); ?>images/url-loader.gif" />');

	 var replycommentlike = $(this);

     var postid = $(this).attr('data-postid');

	 var commentid = $(this).attr('data-commentid');

	 var replycommentid = $(this).attr('data-replycommentid');

	$.ajax 

		({

			url: "<?php echo base_url(); ?>Userdashboard/replycomment_like",

			type: "POST",             

			data: "postid=" + postid + "&commentid=" + commentid + "&replycommentid=" + replycommentid, 

			dataType: "json",

			success: function(response)   

			{ 

			

               $("#loading_img").remove();				

			   if(response.success){

				   replycommentlike.css('color','#009688');

				    $("#likereplycommentcountbox-"+replycommentid).show();

				   if(response.replycommentlike == 0){

					   $("#likereplycommentcountbox-"+replycommentid).hide();

				   }else{

					   $("#likereplycommentcountbox-"+replycommentid).show();

					   $("#likereplycommentcountbox-"+replycommentid).find('span').text(response.replycommentlike);

				   }

				   

				 

			   }else{

				    $(".replycomment_like_post").removeAttr("style");

					$("#likereplycommentcountbox-"+replycommentid).show();

					   $("#likereplycommentcountbox-"+replycommentid).find('span').text(response.replycommentlike);

			   }

			    

			}

	    });

 });





$(document).on('click','#editcomment_submit',function(){ 

        var comment_id = $(this).attr('data-comment-id');      

	    var value = $('#edit_comment_'+ comment_id).val();

			$.ajax 

		({

			url: "<?php echo base_url(); ?>Userdashboard/change_comment",

			type: "POST",             

			data: "value=" + value + "&comment_id=" + comment_id,

            dataType: "json", 			

			success: function(response)   

			{

				if(response.success)

				{

				   $('.edit_comment_text_'+ comment_id).text(value);

				   $("#editcomment_"+ comment_id).modal('hide');

				}

			}

	    });

	 

 });

 

 $(document).on('click','#editreplycomment_submit',function(){ 

        var reply_id = $(this).attr('data-reply-id');      

	    var value = $('#edit_replycomment_'+ reply_id).val();

			$.ajax 

		({

			url: "<?php echo base_url(); ?>Userdashboard/change_replycomment",

			type: "POST",             

			data: "value=" + value + "&reply_id=" + reply_id,

            dataType: "json", 			

			success: function(response)   

			{

				if(response.success)

				{

				   $('.edit_replycomment_text_'+ reply_id).text(value);

				   $("#editreplycomment_"+ reply_id).modal('hide');

				}

			}

	    });

	 

 });

 

 $(document).on('click','.trashreplycomment',function(){

		  var postid = $(this).attr('data-postid');

		  var commentid = $(this).attr('data-commentid'); 

		  var replycommentid = $(this).attr('data-replycommentid');

		  if(confirm("Are you sure you want to delete this comment?")){

     		$.ajax 

		({

			url: "<?php echo base_url(); ?>Userdashboard/delete_replycomment",

			type: "POST",             

			data: "comment_id=" + commentid + "&postid=" + postid+ "&replycommentid=" + replycommentid,

            dataType: "json", 			

			success: function(){

				

				}

			});

			window.location.reload();

		  //  $(this).parents('.newflex'+commentid).animate({ backgroundColor: "#fbc7c7" }, "fast")

		//	.animate({ opacity: "hide" }, "slow");

			}

			return false;

		});

		

		/*----------------------------like root------------------------------------*/



 $(document).on('click','.like_root',function(){

	 $(this).append('<img id="loading_img" style="width:20px" src="<?php echo base_url(); ?>images/url-loader.gif" />');

	 var like = $(this);

     var postid = $(this).attr('data-postid');

	 var status = $(this).attr('data-status');

	 var ltype = $(this).attr('data-type');

	 var author = $(this).attr('data-author');

	$.ajax 

		({

			url: "<?php echo base_url(); ?>Userprofile/like_root",

			type: "POST",             

			data: "post=" + postid + "&ltype=" + ltype + "&status=" + status + "&author=" + author, 

			dataType: "json",

			success: function(response)   

			{ 

			

               $("#loading_img").remove();				

			   if(response.success){

				   like.css('color','#009688');

				    $("#likecountbox-"+postid).show();

					   $("#likecountbox-"+postid).find('span').text(response.like+ " people like this");

				   if(response.like == 0){

					   $("#likecountbox-"+postid).hide();

				   }else{

					   $("#likecountbox-"+postid).show();

					   $("#likecountbox-"+postid).find('a').text(response.like+ " people");

				   }

				   

				   /*if(response.type == 1){

					   $("#dislike-"+postid).css('color','#7f7f7f');

				   }else{

					   $("#like-"+postid).css('color','#7f7f7f');

				   }*/

			   }else{

				    $("a").removeAttr("style");

					$("#likecountbox-"+postid).show();

					//$("#likecountbox-"+postid).hide();

					   $("#likecountbox-"+postid).find('span').text(response.like+ " people like this");

			   }

			    

			}

	    });

 });

 

 	$(document).on('submit','[id^="cmtrootform-"]', function(e){ 

	    var pid = $(this).attr('data-postid');

		var uid = $(this).attr('data-userid');

		//alert('test');

		//$("#loadermodal").modal('show');

		var postComment = $("#post_comment").val();

		

        e.preventDefault();

        var formData = new FormData(this);

     

        $.ajax({

            type:'POST',

            url: "<?php echo base_url().'Userprofile/addcommentroot'; ?>",

            data:formData,

            cache:false,

			dataType:'json',

            contentType: false,

            processData: false,

            success:function(data){ 

			 $('.post_comment-'+pid).val('');

			//$("#loadermodal").modal('hide');

				 $('.commentshow-'+pid).html(data.list);

				

				 $('.totalcmt'+pid).html(data.totalcommentcount);

			    

            }

        });



    }); 

	

	$(document).on('click','.morerootimage',function(){

		var offset = $(this).attr('data-page');

		

		var postid = $(this).attr('data-postid');

		//$(this).remove();

		$(this).parent().parent().remove();

			$.post("<?php echo base_url().'Userprofile/get_root_comments'; ?>",  

			{offset: offset, postid: postid },

					function(response){ 

						  if(response.success){

							 

							  $(".sds"+postid).append(response.list);

						  }

			}, "json");

	});

	

	$(document).on('click','.trashrootcomment',function(){

		  var postid = $(this).attr('data-postid');

		  var commentid = $(this).attr('data-commentid'); 

		  if(confirm("Are you sure you want to delete this comment?")){

     		$.ajax 

		({

			url: "<?php echo base_url(); ?>Userprofile/delete_root_comment",

			type: "POST",             

			data: "comment_id=" + commentid + "&postid=" + postid,

            dataType: "json", 			

			success: function(){

				

				}

			});

			window.location.reload();

		  //  $(this).parents('.newflex'+commentid).animate({ backgroundColor: "#fbc7c7" }, "fast")

		//	.animate({ opacity: "hide" }, "slow");

			}

			return false;

		});

	</script>

</body>



</html>