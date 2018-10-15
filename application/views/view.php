<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script>
$(document).ready(function(){
	$("#example").validate();
    $("#submit").click(function(){
		event.preventDefault();
		var name= $("#InputName").val();
		var dob= $("#InputDOB").val();
		var email= $("#InputEmail").val();
		var color= $("#Color").val();
		$.ajax({
            type:"post",
            url: "index.php/Welcome/receive/",
            data:{ 
				name:name,
				dob:dob,
				email:email,
				color:color
			},
            success:function(response)
            {
            	$("#message").html(response);
            },
            error: function() 
            {
                $("#message").html("<p>I didn't quite get the data, can we try again later?</p>");
            }
        });
    });
});
</script>

</head>
<body>

<div class="container">
	<div id="body">
	<form id="example">
		<div class="form-group">
			<label for="InputName">Name</label>
			<input id="InputName"  type="text" class="form-control"  aria-describedby="nameHelp" placeholder="Enter Name" minlength="2" required>
		</div>
		<div class="form-group">
			<label for="InputDOB">Date of Birth</label>
			<input id="InputDOB"  type="date" class="form-control"  aria-describedby="dobHelp" placeholder="MM/DD/YYYY" required>
		</div>		
		<div class="form-group">
			<label for="InputEmail">Email</label>
			<input id="InputEmail" type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email" required>
		</div>

		<div class="form-group">
			<label for="Select">Favorite Color</label>
			<select class="form-control" id="Color">
			<option>Red</option>
			<option>Blue</option>
			<option>Green</option>
			<option>White</option>
			<option>Magenta</option>
			</select>
		</div>
		<button type="button" id="submit" class="btn btn-primary">Submit</button>
	</form>
	<br />
	<h1>Message:</h1>
	<div id="message"></div>
	</div>
</div>
</body>
</html>