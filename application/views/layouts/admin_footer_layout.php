<div id="layoutAuthentication_footer">
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="<?php echo base_url(); ?>js/jquery.validate.js"></script>
        <script src="<?php echo base_url(); ?>admin_js/scripts.js"></script>
    </body>
</html>

<script>
	$(document).ready(function() {
  $("#adminlogin").validate({
    rules: {
           
			email: {
                required: true,
				email: true
            },
			password: {
				required: true,
			},
			
    },
    messages: {
             
			email: {
                required: "Email field is required",
				
            },
			password: {
                required: "Password field is required",
            },
			
    },
    errorElement: "span",
        errorPlacement: function(error, element) {
                error.appendTo(element.parent());
        }

  });
});

	</script>
