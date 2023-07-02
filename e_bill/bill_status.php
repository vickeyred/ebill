<?php
session_start();

include("connection.php");
include("functions.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = intval($_SESSION['user_id']);


$query = "SELECT * FROM bills WHERE user_id=$user_id";
$result = mysqli_query($con, $query);

$bill = array();

while ($row = mysqli_fetch_assoc($result)) {
    $bill[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bill Status</title>
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
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #01579b;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Bills</h2>
    <?php if (count($bill) > 0) { ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Month</th>
                <th>Year</th>
                <th>Units</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
            <?php foreach ($bill as $b) { ?>
                <tr>
                    <td><?php echo $b['id']; ?></td>
                    <td><?php echo $b['month']; ?></td>
                    <td><?php echo $b['year']; ?></td>
                    <td><?php echo $b['units']; ?></td>
                    <td><?php echo $b['amount']; ?></td>
                    <td><?php echo $b['status']; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>No bills found for this user.</p>
    <?php } ?>
</body>
</html>
