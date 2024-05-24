<?php
session_start();

if (!isset($_SESSION['customer_logged_in']) || $_SESSION['customer_logged_in'] !== true) {
    header("Location: CustomerLogin.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinepharmacy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$customer_id = $_SESSION['customer_id'];

// Step 1: Insert into `orders` table
$total_price = 0;
$sql_cart = "SELECT c.MedID, m.Price FROM cart c JOIN medicine m ON c.MedID = m.MedID WHERE c.CustomerID = ?";
$stmt_cart = $conn->prepare($sql_cart);
$stmt_cart->bind_param("i", $customer_id);
$stmt_cart->execute();
$result_cart = $stmt_cart->get_result();

if ($result_cart->num_rows > 0) {
    // Calculate total price
    while ($row = $result_cart->fetch_assoc()) {
        $total_price += $row['Price'];
    }

    // Insert order into `orders` table
    $sql_insert_order = "INSERT INTO orders (CustomerID, TotalPrice, OrderDate) VALUES (?, ?, NOW())";
    $stmt_insert_order = $conn->prepare($sql_insert_order);
    $stmt_insert_order->bind_param("id", $customer_id, $total_price);
    if ($stmt_insert_order->execute()) {
        // Get the newly inserted OrderID
        $order_id = $stmt_insert_order->insert_id;

        // Step 2: Insert into `order_details` table
        $stmt_cart->data_seek(0); // reset result set to start
        while ($row = $result_cart->fetch_assoc()) {
            $med_id = $row['MedID'];
            $price = $row['Price'];

            $sql_insert_details = "INSERT INTO order_details (OrderID, MedID, Price) VALUES (?, ?, ?)";
            $stmt_insert_details = $conn->prepare($sql_insert_details);
            $stmt_insert_details->bind_param("iid", $order_id, $med_id, $price);
            if (!$stmt_insert_details->execute()) {
                echo "Error inserting order details: " . $stmt_insert_details->error;
            }
            $stmt_insert_details->close();
        }

        // Step 3: Clear the cart
        $sql_clear_cart = "DELETE FROM cart WHERE CustomerID = ?";
        $stmt_clear_cart = $conn->prepare($sql_clear_cart);
        $stmt_clear_cart->bind_param("i", $customer_id);
        $stmt_clear_cart->execute();
        $stmt_clear_cart->close();
    } else {
        echo "Error inserting order: " . $stmt_insert_order->error;
    }

    $stmt_insert_order->close();
} else {
    echo "No items in the cart.";
}

$stmt_cart->close();
$conn->close();

header("Location: CheckoutSummary.php?order_id=" . $order_id);
exit;
?>
