<?php
include("connection.php");

$id = $_GET["id"];
$query = "DELETE FROM users WHERE id='$id'";
$result = mysqli_query($con, $query);

if ($result) {
    echo "User deleted successfully.";
} else {
    echo "Error deleting user.";
}

mysqli_close($con);
?>
