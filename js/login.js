$(document).ready(function() {
  $("#signup").validate({
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
			password: {
				required: true,
			},
			confirmpassword: {
            required: true,
            
            equalTo: "#password"
        }
    },
    messages: {
             firstname: {
                required: "Name required",
            },
    },
    errorElement: "span",
        errorPlacement: function(error, element) {
                error.appendTo(element.parent());
        }

  });
});
