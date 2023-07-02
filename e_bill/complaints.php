<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "Vickey@100%";
$dbname = "e_bill";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if(isset($_POST['submit'])) {
    // Get form data
    $user_id = $_POST['user_id'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];

    // Insert data into complaints table
    $sql = "INSERT INTO complaints (user_id, subject, description) VALUES ('$user_id', '$subject', '$description')";
    if(mysqli_query($conn, $sql)) {
        echo "Complaint registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Register Complaint - eBill</title>
    <style>
        body {
            background-color: #e3f2fd;
            font-family: Arial, sans-serif;
            color: #444;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #999;
        }
        h1 {
            margin-top: 0;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }
        input[type="text"], textarea {
            padding: 10px;
            border-radius: 5px;
            border: bold;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            background-color: #007acc;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }
        input[type="submit"]:hover {
            background-color: #00558b;
        }
        a {
            color: #007acc;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Register Complaint</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label>User ID:</label>
            <input type="text" name="user_id" required>
            <label>Subject:</label>
            <input type="text" name="subject" required>
            <label>Description:</label>
            <textarea name="description" required></textarea>
            <input type="submit" name="submit" value="Submit">
        </form>
        <p>Go to home page? <a href="index.php">Home page</a></p>
    </div>
</body>
</html>
