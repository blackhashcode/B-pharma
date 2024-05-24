<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['customer_logged_in']) || $_SESSION['customer_logged_in'] !== true) {
    header("Location: CustomerLogin.php");
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinepharmacy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['medicine_id'])) {
    $medicine_id = intval($_POST['medicine_id']);
    $customer_id = $_SESSION['customer_id'];

    // Remove item from cart
    $sql_remove_cart = "DELETE FROM cart WHERE CustomerID = ? AND MedID = ?";
    $stmt_remove_cart = $conn->prepare($sql_remove_cart);
    $stmt_remove_cart->bind_param("ii", $customer_id, $medicine_id);

    if ($stmt_remove_cart->execute()) {
        header("Location: CustomerDashboard.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
