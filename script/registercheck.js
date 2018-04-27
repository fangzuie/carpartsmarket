$(document).ready(function(){

	$("#txtUsername,#txtEmail").change(function(){

			$("#sUsername").empty();
			$("#sEmail").empty();

			$.ajax({
				url: "returnCustomer1.php" ,
				type: "POST",
				data: 'sUsername=' +$("#txtUsername").val()+'&eMail='+$("#txtEmail").val()
			})
			.success(function(result) {

					var obj = jQuery.parseJSON(result);

					if(obj != '')
					{
						  $.each(obj, function(key, inval) {

								   if($("#txtUsername").val() == inval["user_name"])
								  {
									   $("#sUsername").html(" <font color='red'>รหัสลูกค้านี้มีอยู่แล้ว</font>");
								  }

								   if($("#txtEmail").val() == inval["user_email"])
								  {
									   $("#sEmail").html(" <font color='red'>อีเมล์นี้มีอยู่แล้ว</font>");
								  }

						  });
					}

			});

		});
	});
