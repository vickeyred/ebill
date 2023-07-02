<?php
session_start();
include("connection.php");
include("functions.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>ABOUT US</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="after.css">
<style>
.container img{
	border-radius:3000px;
	 width: 30%;
  height: auto;
}
.example-div {
  background-image: url("shopwp.jpg");
  background-size: cover;
  height: 100vh;
  width: 100vw;
  backdrop-filter: blur(5px);
}
ul {
  list-style: none; /* Remove default bullet points */
  padding: 0; /* Remove default padding */
  margin: 0; /* Remove default margin */
}

ul li {
  padding: 10px; /* Add padding to list items for better readability */
  margin-bottom: 5px; /* Add margin between list items */
 /* Set background color for list items */
}
/* Hide the modal by default */
/* Hide the message by default */
.popup{
  display: none;
  position: fixed;
  top: 50%;
  right: 0;
  transform: translateX(-50%);
  padding: 10px;
  backdrop-filter: blur(5px);
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Show the message when the button is hovered */
.show-message:hover + .message {
  display: block;
}
.popup:target {
  display: none;
}
.popup1{
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translateX(-50%);
  padding: 10px;
  backdrop-filter: blur(5px);
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0,0,0,0.2);
  z-index:2;
}

/* Show the message when the button is hovered */
.show-message:hover + .message {
  display: block;
}

body {
  background-image: url('aboutimg1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}


</style>
</head>
<script>
$(document).ready(function() {
  $('.image').click(function() {
    $('.popup').show();
  });
  $('.popup').click(function() {
    $(this).hide(); 
  });
});
$(document).ready(function() {
  $('.image1').click(function() {
    $('.popup1').show();
  });
  $('.popup1').click(function() {
    $(this).hide(); 
  });
});
</script>
<body>
<div class="example-div">


<h2 align="center"><span style="color:brown;">ELECTIRICITY BILL</span></h2>
<marquee direction="right">
PRESS COUNTACT US TO KNOW THE HELPLINE PROVIDED BY US
</marquee>
<nav>
<label class="logo">BILL</label>
<ul>
<li><a  href="index.php"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
<li><a href="bill_status.php"><span class="glyphicon glyphicon-cog"></span> BILL</a></li>
<li><a class="active" href="about.php"><span class="glyphicon glyphicon-globe"></span> ABOUT US</a></li>
</ul><br><br>
</nav><br>

<div class="loginbox"><h3><span style="color:cyan;font-weight:500;">This </span><span style="color:white;">webpage has been developed by two of the below men and is named after their first letters of their respective names</span><br><br><center>Click their images to know about them!!!</center></h3>
</div><br><br>
<div class="about">
<div class="container">

<img class="image" src="Hari.jpg" align="left" style="margin-left:200px;">
<div class="popup"><h1><span style="color:red">H</span><span style="color:black">ariharan</span></h1><p><span style="color:white;">He is a student of Sri Shakthi Institute of Engineering and technology practicing 2 year in BE CSE</span></p>
</div>
<br>
<img class="image1" src="Vickey.jpg" align="right" style="margin-right:200px;"><div class="popup1"><h1><span style="color:red">A</span><span style="color:white">lagu Vigneshan </span><span style="color:red">#D</span><span style="color:white">io</span></h1><p><span style="color:white;">He is a student of Sri Shakthi Institute of Engineering and technology practicing 2 year in BE CSE</span></p></div>
</div>
</div>
</div>
</body>
</html>
