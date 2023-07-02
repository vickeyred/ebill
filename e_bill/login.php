<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    if (!empty($user_name) && !empty($user_password) && !is_numeric($user_name)) {
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);
		if($result){
			if($result && mysqli_num_rows($result)>0){
			    $user_data=mysqli_fetch_assoc($result);
			    if($user_data['user_password'] === $user_password){
				    $_SESSION['user_id'] = $user_data['user_id'];
					header("Location: index.php");
                    die();
				}	
		    }
		}
        echo "Wrong user name or  password";		
    } 
	else {
        echo "Enter valid information";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
	<style>
		body {
			background-color: #e3f2fd;
			font-family: Arial, sans-serif;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
			color: #01579b;
		}
		form {
			background-color: #fff;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0px 0px 10px #aaa;
			width: 300px;
			margin: 0 auto;
			margin-top: 50px;
		}
		input[type=text], input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		button {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
		}
		button:hover {
			background-color: #45a049;
		}
		.error {
			color: red;
			font-size: 14px;
			margin-top: 10px;
			text-align: center;
		}
		.signup {
			margin-top: 20px;
			text-align: center;
		}
		a {
			color: #01579b;
			text-decoration: none;
			font-weight: bold;
		}
		a:hover {
			text-decoration: underline;
		}
	</style>
</head>
<body>
	<h1>Login</h1>
	<form method="post">
		<input type="text" name="user_name" placeholder="Username"><br>
		<input type="password" name="user_password" placeholder="Password"><br>
		<?php
			if(isset($error)){
				echo '<div class="error">'.$error.'</div>';
			}
		?>
		<button type="submit">Login</button>
	</form>
	<div class="signup">
		Don't have an account? <a href="signup.php">Sign up</a>
	</div>
</body>
</html>

