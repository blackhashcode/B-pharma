<?php
// Database connection parameters
$servername = "localhost"; // Change this if your MySQL server is on a different host
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "onlinepharmacy"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];

    // SQL query to insert user data into the database
    $sql = "INSERT INTO admin (Username, PasswordHash, FirstName, LastName, Email)
            VALUES ('$username', '$passwordHash', '$firstName', '$lastName', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful!";
        // Redirect to a login page or dashboard
        // header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
