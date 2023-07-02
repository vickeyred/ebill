<?php
session_start();

include("connection.php");
include("admin_functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_POST['user_id'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $units = $_POST['units'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];

    if (!empty($user_id) && !empty($month) && !empty($year) && !empty($units) && !empty($amount) && !empty($status)) {
        $query = "INSERT INTO bills (user_id, month, year, units, amount, status) VALUES ('$user_id', '$month', '$year', '$units', '$amount', '$status')";
        $result = mysqli_query($con, $query);
        if ($result) {
            $success = "Bill added successfully!";
        } else {
            $error = "Failed to add bill";
        }
    } else {
        $error = "Please fill in all fields";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Bill</title>
	<style>
		body {
			background-color: #e3f2fd;
			font-family: Arial, sans-serif;
		}
		h2 {
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
		label {
			display: block;
			font-weight: bold;
			margin-bottom: 5px;
		}
		input[type=text], input[type=number] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
		}
		input[type=submit]:hover {
			background-color: #45a049;
		}
		.error {
			color: red;
			font-size: 14px;
			margin-top: 10px;
			text-align: center;
		}
		.success {
			color: green;
			font-size: 14px;
			margin-top: 10px;
			text-align: center;
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
		.logout-btn {
            background-color: #d9534f;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background-color: #c9302c;
        }
	</style>
</head>
<body>
	<h2>Add Bill</h2>
	<nav>
            <a href="admin_dashboard.php" style="color:white">Users</a>
            <a href="admin_complaints.php" style="color:white">Complaints</a>
			<a href="bill_generate.php" style="color:white">Add_Bill</a>
            <a href="admin_logout.php" class="logout-btn" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
    </nav>
	<form method="post" action="">
		<label>User ID:</label>
		<input type="text" name="user_id"><br><br>
		<label>Month:</label>
		<input type="number" name="month"><br><br>
		<label>Year:</label>
		<input type="number" name="year"><br><br>
		<label>Units:</label>
		<input type="number" name="units"><br><br>
		<label>Amount:</label>
		<input type="number" name="amount"><br><br>
		<label>Status:</label>
		<select name="status">
		<option value="paid">Paid</option>
		<option value="unpaid">Unpaid</option>
		</select><br><br>
		<input type="submit" value="Add Bill">
		<?php 
		if(isset($error)) 
		{ 
		?>
<div class="error"><?php echo $error; ?></div>
<?php } ?>
<?php if(isset($success)) { ?>
<div class="success"><?php echo $success; ?></div>
<?php } ?>
</form>

</body>
</html>