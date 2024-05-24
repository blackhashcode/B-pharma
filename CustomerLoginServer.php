<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinepharmacy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customer WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['PasswordHash'])) {
            $_SESSION['customer_logged_in'] = true;
            $_SESSION['customer_email'] = $email;
            $_SESSION['customer_id'] = $row['UserID'];
            header("Location: CustomerDashboard.php");
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Customer not found.";
    }

    $stmt->close();
}

$conn->close();
?>
