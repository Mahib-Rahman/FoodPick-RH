<?php
// Database connection settings
$dbHost = 'localhost';
$dbUser = 'admin';
$dbPass = 'admin';
$dbName = 'foodbank';

// Create a database connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Handle form submissions for adding new items
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_item'])) {
    $name = $_POST['name'];
    $size = $_POST['size'];
    $best_before_date = $_POST['best_before_date'];

    $sql = "INSERT INTO dispatch_central (name, size, best_before_date) VALUES ('$name', '$size', '$best_before_date')";
    if ($conn->query($sql) === TRUE) {
        echo "Item added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Retrieve and display items from the dispatch_central table
$sql = "SELECT * FROM dispatch_central";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Dispatch Central Items</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Size</th><th>Best Before Date</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['size'] . "</td>";
        echo "<td>" . $row['best_before_date'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No items found.";
}
?>

<!-- HTML form for adding items -->
<h2>Add New Item</h2>
<form method="POST" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>
    <label for="size">Size:</label>
    <input type="text" name="size"><br>
    <label for="best_before_date">Best Before Date:</label>
    <input type="date" name="best_before_date"><br>
    <input type="submit" name="add_item" value="Add Item">
</form>
