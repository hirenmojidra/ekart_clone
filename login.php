<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Replace with your database information
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "flipkart";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT username, password FROM authentication WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($dbUsername, $hashedPassword);

    if ($stmt->num_rows == 1 && password_verify($password,$hashedPassword)) {
        $_SESSION['username'] = $username;
        header("Location: home.html"); // Redirect to a welcome page after successful login
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>
