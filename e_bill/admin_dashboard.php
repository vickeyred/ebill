<?php
session_start();

include("connection.php");
include("admin_functions.php");

$admin_data=check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
    <title>ELECTRICITY BILL - Admin Dashboard</title>
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
        table {
            border-collapse: collapse;
            margin: 50px auto;
            width: 80%;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007acc;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .add-user {
            display: block;
            margin: 20px 0;
            text-align: right;
        }

        .add-user a {
            background-color: #007acc;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-user a:hover {
            background-color: #005c9d;
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
    <header>
        <h1>ELECTRICITY BILL - Admin Dashboard</h1>
        <p>Welcome, <?php echo $admin_data['admin_name']; ?> (Admin ID: <?php echo $admin_data['admin_id']; ?>)</p>
        <nav>
            <a href="admin_dashboard.php" style="color:white">Users</a>
            <a href="admin_complaints.php" style="color:white">Complaints</a>
			<a href="bill_generate.php" style="color:white">Add_Bill</a>
            <a href="admin_logout.php" class="logout-btn" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
        </nav>
    </header>
    <div class="container">
        <h2>Users</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>password</th>
                    <th>address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['user_id']."</td>";
                        echo "<td>".$row['user_name']."</td>";
                        echo "<td>".$row['user_email']."</td>";
                        echo "<td>".$row['user_password']."</td>";
                        echo "<td>".$row['user_address']."</td>";
                        echo "<td>";
                        echo "<a href='edit_user.php?id=".$row['id']."'>Edit    </a>";
                        echo "<a href='javascript:void(0)' onclick='deleteUser(".$row['id'].")'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
	<script>
		function deleteUser(id) {
				if (confirm("Are you sure you want to delete this user?")) {
						var xhr = new XMLHttpRequest();
						xhr.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
								location.reload();
						}
				};
				xhr.open("GET", "delete_user_ajax.php?id=" + id, true);
				xhr.send();
			}
		}
    </script>
</body>
</html>

