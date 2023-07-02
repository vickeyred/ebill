<?php
session_start();

include("connection.php");
include("admin_functions.php");

$admin_data=check_login($con);

if(isset($_POST['update_user'])){
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $user_name = mysqli_real_escape_string($con, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($con, $_POST['user_password']);
    $user_address = mysqli_real_escape_string($con, $_POST['user_address']);

    $query = "UPDATE users SET user_name='$user_name', user_email='$user_email', user_password='$user_password', user_address='$user_address' WHERE user_id='$user_id'";
    mysqli_query($con, $query);

    $_SESSION['success_msg'] = "User details have been updated successfully";
    header("location: admin_dashboard.php");
    exit();
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>ELECTRICITY BILL - Edit User</title>
</head>
<body>
    <header>
        <h1>ELECTRICITY BILL - Edit User</h1>
        <p>Welcome, <?php echo $admin_data['admin_name']; ?> (Admin ID: <?php echo $admin_data['admin_id']; ?>)</p>
    </header>
    <div class="container">
        <?php if(isset($_SESSION['error_msg'])): ?>
            <div><?php echo $_SESSION['error_msg']; ?></div>
            <?php unset($_SESSION['error_msg']); ?>
        <?php endif; ?>
        <form method="post" action="edit_user.php">
            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
            <label for="user_name">Name</label>
            <input type="text" name="user_name" value="<?php echo $user['user_name']; ?>">
            <label for="user_email">Email</label>
            <input type="email" name="user_email" value="<?php echo $user['user_email']; ?>">
            <label for="user_password">Password</label>
            <input type="password" name="user_password" value="<?php echo $user['user_password']; ?>">
            <label for="user_address">Address</label>
            <input type="text" name="user_address" value="<?php echo $user['user_address']; ?>">
            <input type="submit" name="update_user" value="Update User">
        </form>
    </div>
</body>
</html>
