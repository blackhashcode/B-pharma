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

// Retrieve available medicines
$search_query = "";
if (isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $search_query = "WHERE m.MedicineName LIKE '%$search%'";
}

$sql = "SELECT m.MedID, m.MedicineName, m.Price FROM medicine m $search_query";
$result = $conn->query($sql);
$medicines = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $medicines[] = $row;
    }
}

// Retrieve cart items for the customer
$cart_items = [];
if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];
    $sql_cart = "SELECT c.CartID, c.MedID, m.MedicineName, m.Price FROM cart c JOIN medicine m ON c.MedID = m.MedID WHERE c.CustomerID = ?";
    $stmt = $conn->prepare($sql_cart);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $result_cart = $stmt->get_result();

    if ($result_cart->num_rows > 0) {
        while ($row = $result_cart->fetch_assoc()) {
            $cart_items[] = $row;
        }
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
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
        .btn-logout {
            margin-top: 10px;
        }
        .table-cart {
            margin-top: 20px;
        }
        .btn-checkout {
            margin-top: 10px;
        }
        .form-search {
            margin-bottom: 20px;
        }
        .side-cart {
            position: fixed;
            top: 80px;
            right: 20px;
            width: 300px;
            background-color: #ffffff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        .side-cart-title {
            margin-bottom: 10px;
        }
        .side-cart-items {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Customer Dashboard</h2>
        <p class="text-right">Welcome, <?php echo htmlspecialchars($customer_email); ?>!</p>

        <!-- Logout Button -->
        <form action="CustomerLogout.php" method="post" class="text-right">
            <button type="submit" class="btn btn-danger btn-logout">Logout</button>
        </form>

        <div class="row">
            <div class="col-md-8">
                <!-- Medicines List -->
                <h3 class="mt-4 mb-3">Available Medicines</h3>
                <!-- Search Form -->
                <form class="form-inline form-search mb-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search by Medicine Name" aria-label="Search" name="search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Medicine ID</th>
                            <th>Medicine Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($medicines as $medicine): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($medicine['MedID']); ?></td>
                                <td><?php echo htmlspecialchars($medicine['MedicineName']); ?></td>
                                <td><?php echo htmlspecialchars($medicine['Price']); ?></td>
                                <td>
                                    <form method="post" action="AddToCart.php">
                                        <input type="hidden" name="medicine_id" value="<?php echo htmlspecialchars($medicine['MedID']); ?>">
                                        <button type="submit" class="btn btn-success">Add to Cart</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <!-- Shopping Cart on the Side -->
                <div class="side-cart">
                    <h3 class="side-cart-title">Shopping Cart</h3>
                    <?php if (!empty($cart_items)): ?>
                        <div class="side-cart-items">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Medicine ID</th>
                                        <th>Medicine Name</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cart_items as $item): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($item['MedID']); ?></td>
                                            <td><?php echo htmlspecialchars($item['MedicineName']); ?></td>
                                            <td><?php echo htmlspecialchars($item['Price']); ?></td>
                                            <td>
                                                <form method="post" action="RemoveFromCart.php">
                                                    <input type="hidden" name="cart_id" value="<?php echo htmlspecialchars($item['CartID']); ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <form method="post" action="Checkout.php" class="text-right">
                            <button type="submit" class="btn btn-primary btn-checkout">Checkout</button>
                        </form>
                    <?php else: ?>
                        <p>Your cart is empty.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
