<?php
//Made By Jorge O Jara Cabrera...... 
   require "class.phpmailer.php";
//PHPMailer Object
$mail = new PHPMailer;

//From email address and name
$mail->From = "From@Mysidestreetcafe.com";
$mail->FromName = "SideStreetCafe";

//To address and name

//enable smpt
 // $mail->isSMPT();
//auth 
   $mail->Username ="mysidestreetcafe@gmail.com";
   $mail->Pasword = "lokita1212";
   $mail->SMTPAuth   = true;
// sets the prefix to the server
$mail->SMTPSecure = "tls";
// set the SMTP server
//$mail->Host = "smtp.example.com";
//Send HTML or Plain Text email
$mail->isHTML(true);
$mail->addEmbeddedImage('woo.png','woo');
$mail->Subject = "Update";
$mail->Body = "<!DOCTYPE html>
<html>
<head>
	<title>SideStreetCafe</title>
	 <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
  <style>
  	
  	.containers{
	margin-top:5%;
	height:auto;
	min-height:600px;
	width:100%;
	padding:0px;
	display:flex;
	justify-content: center;
}
.secondcontainer{
	height:auto;
	width:80%;
	text-align:center;
}
.image{
	height:300px;
	width:100%;
	min-width:100%;
}
.header{
	text-align:center;
	width:100%;
	height:auto;
}
.headercontent{
	font-size:50px;
}
.text{
	height:auto;
	width:100%;
	min-width:100%;
	text-align:center;
	font-size:30px;
}
#btn{
	margin-top:5%;
	margin-bottom:5%;
	width:400px;
	border-radius:5px;
}
@media(max-width:400px){
	.headercontent{
		font-size:40px;
	}
	.text{
		font-size:20px;
		display:flex;
		justify-content:center;
		width:100%;
	}
	#btn{
		width:200px;
	}
.secondcontainer{width:100%;}
	.textsecond{
	width:200px;
}
}
#btn {
    background-color: #d271dd;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
}

#btn:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
.textsecond{text-align:center;width:100%;}
body{
	margin:0px;
	padding:0px;
}
  </style>
</head>
<body>
   <div class='containers'>
   	<div class='secondcontainer'>
   	   <div class='image'>
   	   	<img style='height:300px; width:100%;' src='cid:woo'>
   	   </div>
   	   <hr>
   <div class='header'>
   	  <h1 class='headercontent'>Some good News</h1>
     </div>
    <div class='text'>
    	<div class='textsecond'>
    	<p class='textcontent'>This week only we are going to be having some really good deals in the SideStreetCafe, Find How Much you Can save.</p>
    </div>
       </div>
       <button id='btn' class='btn btn-info'>Check It Out</button>
    </div>
</div>
 </body>
</html>";

 $connect = new mysqli('198.57.247.181','chrisbouc4','p56uaQSUXf1D','chrisbou_clients');
 if(!$connect){
     echo "help connection error \....";
 }

  $know= "SELECT * FROM users";
   $rs = mysqli_query($connect,$know);
  if($rs == true){
     while($row = mysqli_fetch_assoc($rs)){
       $email = $row["email"];
       $name  = $row["name"];
       $lastname = $row["lastname"];
     echo $email;
     echo $name;
     echo $lastname;
     $mail->addAddress($email, $name . $lastname);
     $mail->addReplyTo("mysidestreetcafe@gmail.com", "Reply");
     $mail->send();
  }
}
?>