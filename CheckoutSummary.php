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

$customer_email = $_SESSION['customer_email'];

// Fetch order details for the customer
$order_id = $_GET['order_id'];

$sql = "SELECT OrderID, TotalPrice FROM orders WHERE OrderID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $order = $result->fetch_assoc();
} else {
    echo "No order details found.";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Summary</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Checkout Summary</h2>
        <p class="text-right">Welcome, <?php echo htmlspecialchars($customer_email); ?>!</p>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Order ID</th>
                            <td><?php echo htmlspecialchars($order['OrderID']); ?></td>
                        </tr>
                        <tr>
                            <th>Total Amount</th>
                            <td>$ <?php echo number_format($order['TotalPrice'], 2); ?></td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-center">
                    <a href="CustomerDashboard.php" class="btn btn-primary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
