<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_data";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $agree = isset($_POST['agree']) ? 1 : 0;

    // SQL query to insert data
    $sql = "INSERT INTO users (firstname, email, dob, gender, agree) VALUES ('$firstname', '$email', '$dob', '$gender', $agree)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

