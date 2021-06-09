<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
       <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>-->	  <script src="<?php echo base_url() ?>js/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>admin_js/scripts.js"></script>
       
       
        
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>admin_assets/demo/datatables-demo.js"></script>
    </body>
</html>


	<script>
function goBack() {
  window.history.back();
}
</script><script> <!---------------------------------FOR CHAT------------------------------------ -->						/*$(document).on('click','#submitmsg', function(event){        		 		event.preventDefault();						var attachedFIle = $("#attachedFIle").val();			alert(attachedFIle);						var msg = $("#msg").val();					var friend_user_id = $("#friend_user_id").val();					var group_id = $("#group_id").val();								$.ajax 		({			url: "<?php echo base_url(); ?>Userdashboard/create_groupchat",			type: "POST",             			data: "msg="+msg+"&friend_user_id="+friend_user_id+"&group_id="+group_id,            			            dataType: "json", 			success: function(response)   			{				//alert('response');				$('.msg-wrap').html(response.list);if(response.success){						  $("#msg").val("");									}		}	    });				});	*/							$(document).ready(		 function() { setInterval(function(){	var actid = <?php echo $this->uri->segment('3'); ?>;	    $(".test"+actid).load(location.href + " #scrolldiv"+actid,function(){				$(".test"+actid).scrollTop($("#scrolldiv"+actid).scrollHeight);			});	}, 2000);});   $("#creategroupchat").on("submit", function(e){         e.preventDefault();        var formData = new FormData(this);		        $.ajax({          url  : "<?php echo base_url(); ?>Admin_support/create_chat",          type : "POST",          cache:false,          data :formData,          contentType : false, // you can also use multipart/form-data replace of false          processData: false,          success:function(response){           // $("#preview").show();           // $("#imageView").html(response);           // $("#image").val('');		   		   $('.msg-wrap').html(response.list);						  $("#msg").val("");						   $('#attachedFIle').val('');  									          }        });      });   $(document).on('click','[class^=chatIds]',function(e){var chatid = $(this).attr('data-img-id');// $('#modlcls_'+chatid).modal('show'); 		$.ajax 		({			url: "<?php echo base_url(); ?>Admin_support/chat_image_model",			type: "POST",             			data: "chatid="+chatid,            			            			success: function(data)   			{              $('.ajaxcls').html(data);      // Display Modal      $('.newimagemodal').modal('show');						    }	    });});$(document).on('click','.closechatimg', function(){$(".newimagemodal").removeClass("in");  $(".modal-backdrop").remove();  $(".newimagemodal").hide();});$(document).on('click','.closechatvideo', function(){$(".videoModal").removeClass("in");  $(".modal-backdrop").remove();  $(".videoModal").hide();}); $(document).on('click','[class^=chatvideoIds]',function(e){var chatid = $(this).attr('data-img-id');// $('#modlcls_'+chatid).modal('show'); 		$.ajax 		({			url: "<?php echo base_url(); ?>Admin_support/chat_video_model",			type: "POST",             			data: "chatid="+chatid,            			            			success: function(data)   			{              $('.ajaxvideo').html(data);      // Display Modal      $('.videoModal').modal('show');						    }	    });});</script>