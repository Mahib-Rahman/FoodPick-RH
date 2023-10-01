<!DOCTYPE html>
<html>
<head>
    <title>Food Bank Appointment Form</title>
</head>
<body>
    <h2>Appointment Form</h2>
    <form method="POST" action="process_form.php">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="date">Date:</label>
        <input type="date" name="date" required><br>
        <label for="time">Time:</label>
        <input type="time" name="time" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" required><br>
        <label for="zone">Zone:</label>
        <input type="number" name="zone" required step="1">

        <input type="submit" name="submit" value="Submit Appointment">
    </form>
</body>
</html>
