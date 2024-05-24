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

    // SQL query to check admin credentials
    $sql = "SELECT * FROM admin WHERE Username = ?";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);

    // Execute query
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Admin found, check password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['PasswordHash'])) {
            // Password is correct, login successful
            session_start();

            // Store data in session variables
            $_SESSION["admin_logged_in"] = true;
            $_SESSION["admin_username"] = $username;

            // Redirect to admin dashboard or home page
            header("Location: AdminDashboard.php");
            exit();
        } else {
            // Incorrect password
            echo "Incorrect password.";
        }
    } else {
        // Admin not found
        echo "Admin not found.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
