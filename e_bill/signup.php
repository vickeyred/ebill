<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['password'];
    $user_address = $_POST['user_address'];

    if (!empty($user_name) && !empty($user_password) && !is_numeric($user_name) && !check_email_exists($con, $user_email)) {
        $user_id = random_num(20);
        $query = "INSERT INTO users (user_id,user_name,user_email,user_password,user_address) VALUES ('$user_id','$user_name','$user_email','$user_password','$user_address')";
        mysqli_query($con, $query);
        header("Location: login.php");
        die();
    } else {
        $error = "Enter valid information";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign up</title>
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
        input[type=text], input[type=password], input[type=email] {
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
        .login {
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
    <h1>Sign up</h1>
    <form method="post">
        <input type="text" name="user_name" placeholder="Username"><br>
        <input type="email" name="user_email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="text" name="user_address" placeholder="Address"><br>
        <?php
            if(isset($error)){
                echo '<div class="error">'.$error.'</div>';
            }
        ?>
        <button type="submit">Sign up</button>
    </form>
    <div class="login">
        Already have an account? <a href="login.php">Log in</a>
    </div>
</body>
</html>
