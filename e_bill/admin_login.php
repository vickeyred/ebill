<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $admin_name = $_POST['admin_name'];
    $password = $_POST['password'];

    if (!empty($admin_name) && !empty($password) && !is_numeric($admin_name)) {
        $query = "select * from admin where admin_name = '$admin_name' limit 1";
        $result = mysqli_query($con, $query);
		if($result){
			if($result && mysqli_num_rows($result)>0){
			    $admin_data=mysqli_fetch_assoc($result);
			    if($admin_data['password'] === $password){
				    $_SESSION['admin_id'] = $admin_data['admin_id'];
					header("Location: admin_dashboard.php");
                    die();
				}	
		    }
		}
        echo "Wrong admin name or  password";		
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
		<input type="text" name="admin_name" placeholder="Admin name"><br>
		<input type="password" name="password" placeholder="Password"><br>
		<?php
			if(isset($error)){
				echo '<div class="error">'.$error.'</div>';
			}
		?>
		<button type="submit">Login</button>
	</form>
</body>
</html>

