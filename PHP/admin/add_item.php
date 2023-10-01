<?php
// Database connection settings
$dbHost = '143.110.221.216';
$dbUser = 'foodbank';
$dbPass = 'Team2Bank';
$dbName = 'foodbank';

// Create a database connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Initialize variables for alert message and redirection URL
$alertMessage = "";
$redirectUrl = "../index.html"; // Change this to the desired URL

// Handle form submissions for adding or updating items
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $count = (int)$_POST['count'];
    $best_before_date = $_POST['best_before_date'];

    // Check if an item with the same name and best before date already exists
    $check_sql = "SELECT * FROM dispatch_central WHERE name = '$name' AND best_before_date = '$best_before_date'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // If a matching item exists, update it
        $update_sql = "UPDATE dispatch_central SET count = '$count' WHERE name = '$name' AND best_before_date = '$best_before_date'";
        if ($conn->query($update_sql) === TRUE) {
            $alertMessage = "Item updated successfully!";
        } else {
            $alertMessage = "Error updating item: " . $conn->error;
        }
    } else {
        // If no matching item exists, insert a new one
        $insert_sql = "INSERT INTO dispatch_central (name, count, best_before_date) VALUES ('$name', '$count', '$best_before_date')";
        if ($conn->query($insert_sql) === TRUE) {
            $alertMessage = "Item added successfully!";
        } else {
            $alertMessage = "Error adding item: " . $conn->error;
        }
    }
}

// Retrieve and display items from the dispatch_central table
$sql = "SELECT * FROM dispatch_central";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Dispatch Central Items</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Count</th><th>Best Before Date</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['count'] . "</td>";
        echo "<td>" . $row['best_before_date'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No items found.";
}
?>

<!-- HTML form for adding or updating items -->
<h2>Add or Update Item</h2>
<form method="POST" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>
    <label for="count">Count:</label>
    <input type="number" name="count" required step="1"><br>
    <label for="best_before_date">Best Before Date:</label>
    <input type="date" name="best_before_date"><br>
    <input type="submit" name="submit" value="Submit">
</form>


<script>
    var alertMessage = "<?php echo $alertMessage; ?>";
    if (alertMessage !== "") {
        alert(alertMessage);
        window.location.href = "<?php echo $redirectUrl; ?>";
    }
</script>