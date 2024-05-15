<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost"; // Change this to your MySQL server hostname
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $database = "pipe"; // Change this to your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape user inputs for security
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $product = $conn->real_escape_string($_POST['product']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert user data into database
    $sql = "INSERT INTO user (name, email, phone, product, message) VALUES ('$name', '$email', '$phone', '$product', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo '<div id="error-message" style="color: green; margin-top: 10px; text-align: center;">';
        echo "Form submitted successfully!";
        echo '</div>';
    } else {
        echo '<div id="error-message" style="color: red; margin-top: 10px; text-align: center;">';
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo '</div>';
    }

    // Close connection
    $conn->close();
}
?>
