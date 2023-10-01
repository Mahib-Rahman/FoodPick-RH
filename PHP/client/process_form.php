<?php
// Database connection settings (as shown earlier)
$dbHost = '143.110.221.216';
$dbUser = 'foodbank';
$dbPass = 'Team2Bank';
$dbName = 'foodbank';

// Create a database connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    // Cast the "zone" input to an integer
    $zone = (int)$_POST['zone'];
    
    // Insert data into the appointment_form table
    $sql = "INSERT INTO appointment_form (name, date, time, email, phone, zone) VALUES ('$name', '$date', '$time', '$email', '$phone', '$zone')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit(); // Terminate the script to prevent further execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
