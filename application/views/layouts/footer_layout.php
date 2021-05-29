 <!-- <button type="button" class="btn askMe">Ask </br> me</button> -->

 

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



        function feedsModal() {

            $('#feedsModal').modal('show')

        }



        function mejorMisingModal() {

            $('#mejorMisingModal').modal('show');

        }



        function myRecentVisitModal() {

            $('#myRecentVisitModal').modal('show');

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

		<?php }else{ ?>

		loadMoremyData(offset);

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

 

  $(document).on('keyup','#post_comment', function(e){

   var postcomment = $("#post_comment").val();

    if(postcomment != ''){

		$('#postVal').prop('disabled', false);

	}else{

		$('#postVal').prop('disabled', true);

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

	

	//$(document).on('click','[class^=trashcomment-]',function(e){

		$(document).on('click','.trashcomment',function(){

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


	$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 30) {
        $("body").addClass("darkHeader");
    }
	else{
		$("body").removeClass("darkHeader");
	}
	});

	</script>

</body>



</html>