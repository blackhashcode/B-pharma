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

    // Add item to cart
    $sql_add_cart = "INSERT INTO cart (CustomerID, MedID) VALUES (?, ?)";
    $stmt_add_cart = $conn->prepare($sql_add_cart);
    $stmt_add_cart->bind_param("ii", $customer_id, $medicine_id);

    if ($stmt_add_cart->execute()) {
        header("Location: CustomerDashboard.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
