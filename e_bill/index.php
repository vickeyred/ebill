<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>ELECTRICITY BILL</title>
    <style>
           body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            color: #444;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007acc;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin-top: 50px;
            text-align: center;
        }

        p {
            font-size: 18px;
            line-height: 1.5;
            margin: 20px 50px;
            text-align: justify;
        }

        a {
            color: #007acc;
        }

        a:hover {
            text-decoration: none;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        li a {
            display: block;
            padding: 8px;
            background-color: #dddddd;
            float: left;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #000000;
            padding: 10px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            margin-right: 20px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .icon-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 20px;
            margin-top: 50px;
        }

        .icon-grid a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 150px;
            height: 150px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .icon-grid a:hover {
            background-color: #f0f0f0;
        }

        .icon-grid i {
            font-size: 50px;
            margin-right: 10px;
        }
		body {
			background-image: url('slide1.jpg');
			background-repeat: no-repeat;
			background-size: cover;
		}
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByTagName("body");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.backgroundImage = "url('aboutimg" + (slideIndex + 1) + ".jpg')";
    slides[i].style.backgroundRepeat = "no-repeat";
    slides[i].style.backgroundSize = "cover";
  }
  slideIndex++;
  if (slideIndex > 2) {
    slideIndex = 0;
  }
  setTimeout(showSlides, 3000); // Change image every 3 seconds
}

    </script>
</head>
<body>
    <header>
        <h1>ELECTRICITY BILL</h1>
        <p>Welcome, <?php echo $user_data['user_name']; ?> (User ID: <?php echo $user_data['id']; ?>)</p>
        <nav>
            <a href="index.php" style="color:white">Home</a>
            <a href="about.php" style="color:white">About</a>
            <a href="logout.php" style="color:white">LOGOUT</a>
        </nav>
    </header>
    <div class="container">
        <h2>Choose an option:</h2>
        <div class="icon-grid">
            <a href="index.php" data-section="pay_bill">
                <i class="fa fa-money"></i>
                <span>Home Page</span>
            </a>
            <a href="bill_status.php" data-section="view_history">
                <i class="fa fa-history"></i>
                <span>Bill Status</span>
            </a>
            <a href="complaints.php" data-section="update_profile">
                <i class="fa fa-user"></i>
                <span>Complaints</span>
            </a>
            <a href="admin_login.php" data-section="change_password">
                <i class="fa fa-lock"></i>
                <span>Admin Login</span>
            </a>
        </div>
    </div>
</body>
</html>