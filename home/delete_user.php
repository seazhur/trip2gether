<!-- This was written by Adidev Mohapatra 
This form is the for authorized users to delete any user
they chose and wipe them from the database. -->

<?php
session_start();

//connect to the database
$conn = new mysqli("localhost", "Cesar", "DX8317oZ]XFs0mMo", "trip2gether");
if (!$conn) { die("Connection failed: " . $conn->connect_error); }


// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Get the username of the user to delete from the request parameters
if (!isset($_POST['username'])) {
    echo "Error: Username parameter missing.";
    exit();
}
$username = $_POST['username'];

// Check if the user to delete exists in the database
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) === 0) {
    echo "Error: User not found.";
    exit();
}

// Delete the user from the database
$query = "DELETE FROM users WHERE username = '$username'";
if (mysqli_query($conn, $query)) {
    echo "User '$username' deleted successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Authorize User</title>
</head>
<body>
	<a href="authprofile.php">Go back to profile</a>
</body>
</html>