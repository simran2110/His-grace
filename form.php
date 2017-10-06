<?php
$name = isset($_POST['name']) 
 ? $_POST['name'] 
 : NULL;
 $email = isset($_POST['email'])
   ? $_POST['email']
  : NULL;
 $phone = isset($_POST['phone'])
          ? $_POST['phone'] 
          : NULL;
   // var_dump($_POST);
    if( isset( $name,$phone,$email) )
    {
        echo $name."<br>";
        echo $email."<br>";
        echo $phone;
        $con = new PDO("mysql:host=192.168.2.187;dbname=Extra", "xlpat", "patzee");
        
            $insert = $con->prepare("INSERT INTO testtable (name, email, phone) VALUES (:name, :email, :phone)");
            $insert->bindParam(':name',$name);
            $insert->bindParam(':email',$email);
            $insert->bindParam(':phone',$phone);
            $insert->execute();
        return;
    }
    ?><!DOCTYPE HTML>
<html>
<title>Submit Form without Page Refresh - PHP/jQuery - TecAdmin.net</title>
<head>
<meta charset="utf-8">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
   function SubmitFormData() 
   {
       document.getElementById("fetchrow").innerHTML=  "<b>   Name : <br> Email :<br>  Phone :</b> ";

        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();

        $.post("./hello.php", 
                { name: name, email: email, phone: phone },
                function(data) 
                {
	                $('#results').html(data);
	                $('#myForm')[0].reset();
                }); 
    }
    /*$(document).ready(function() 
    {
        $("#submit").click(function() {
            var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            if (name == '' || email == '' || phone == '') 
            {
                alert("Insertion Failed Some Fields are Blank....!!");
            } 
            else 
            {
// Returns successful data submission message when the entered information is stored in database.
                $.post("refreshform.php", {
                    name1: name,
                    email1: email,
                    phone1:phone},
                    function(data) 
                    {
                        alert(data);
                        $('#form')[0].reset(); // To reset form fields
                    });
            }
        });
    });*/

	
function checkusername()
{		
    var elem = document.getElementById("name");
    if(elem.value === '')
    {
        alert("Please enter username");
        elem.focus();
        return false;
    }
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp))
    {
		return true;
	}
    else
    {
			alert("Only Alphabets allowed");
			document.getElementById("name").focus();
			//return false;
			
	}
}
	
	function checkphone()
	{
		var elem = document.getElementById("phone");
        if(elem.value === '')
        {
            alert("Please enter phone number");
            elem.focus();
            return false;
        }
        var numericExpression = /^[0-9]+$/;
		if(elem.value.match(numericExpression)){
		return true;
		}else{
			document.getElementById("phone").focus();
			alert("please enter the valid phone no (only numeric allowed)");
			return false;
			
		}
	}
	function checkemail()
	{
        var elem = document.getElementById("email");
        if(elem.value === '')
        {
            alert("Please enter email id");
            elem.focus();
            return false;
        }
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		if(elem.value.match(emailExp)){
			return true;
		}else{
			alert("please enter valid email id");
			elem.focus();
			return false;
		}
	}
</script>

</body>
<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
          
<div class="panel panel-info" >
    <div class="panel-heading">
        <div class="panel-title">Register</div>
        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Welcome To ttc</a></div>
    </div>     

    <div style="padding-top:30px" class="panel-body" >
        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
    <form id="myForm" method="post">
        <div class="form-group">
            <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="name" type="text" class="form-control" name="name" value="" placeholder="username" onblur="checkusername()">                                        
            </div>
            <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input id="email" type="text" class="form-control" name="email" value="" placeholder="email" onblur="checkemail()">                                        
            </div>
            <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input id="phone" type="text" class="form-control" name="phone" value="" placeholder="phone" onblur="checkphone()">                                        
            </div>
            <input type="button" id="submitFormData" class="btn btn-success" onclick="SubmitFormData()" value="Submit" />

    </form>
    </div>
</div>

</div>
<div class="row" >
    <div class="col-sm-2 col-md-1">
    </div>
    <div class="col-sm-3 col-md-5" id="fetchrow" style="background-color:lightgray; color:black; font-size : 18px; ">
   </div>
   <div id="results" class="col-sm-6 col-md-5" style="background-color:lightcyan; color:black; font-size : 18px; font-style : italic;" >
    
   </div>
   <div class="col-sm-1 col-md-1">
   </div>
</div>

</body>
</html>


