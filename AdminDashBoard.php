<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: LoginAdmin.php");
    exit;
}

// Admin details
$admin_username = $_SESSION['admin_username'];

// Logout process
if (isset($_POST['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header("Location: LoginAdmin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }
        .container {
            max-width: 800px; /* Adjust the maximum width as needed */
            margin: 50px auto;
            background-color: #fff; /* White background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); /* Soft shadow */
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-dark {
            margin-bottom: 20px;
        }
        .logout-form {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Admin Dashboard</h2>
        <p class="text-center">Welcome, <?php echo htmlspecialchars($admin_username); ?>!</p>
        <hr>

        <!-- Customer Removal Form -->
        <h3>Remove Customer</h3>
        <form method="post" action="remove_customer.php">
            <div class="form-group">
                <label for="customer_id">Customer ID:</label>
                <input type="text" class="form-control" id="customer_id" name="customer_id" required>
            </div>
            <button type="submit" class="btn btn-danger">Remove Customer</button>
        </form>
        <hr>

        <!-- Add Company Form -->
        <h3>Add Company</h3>
        <form method="post" action="add_company.php">
            <div class="form-group">
                <label for="company_name">Company Name:</label>
                <input type="text" class="form-control" id="company_name" name="company_name" required>
            </div>
            <div class="form-group">
                <label for="establish_date">Establish Date:</label>
                <input type="date" class="form-control" id="establish_date" name="establish_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Company</button>
        </form>
        <hr>

        <!-- Add Category Form -->
        <h3>Add Category</h3>
        <form method="post" action="add_category.php">
            <div class="form-group">
                <label for="company_id">Company ID:</label>
                <input type="text" class="form-control" id="company_id" name="company_id" required>
            </div>
            <div class="form-group">
                <label for="category_name">Category Name:</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>
            <div class="form-group">
                <label for="category_desc">Category Description:</label>
                <input type="text" class="form-control" id="category_desc" name="category_desc" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
        <hr>

        <!-- Add Medicine Form -->
        <h3>Add Medicine</h3>
        <form method="post" action="add_medicine.php">
            <div class="form-group">
                <label for="category_id">Category ID:</label>
                <input type="text" class="form-control" id="category_id" name="category_id" required>
            </div>
            <div class="form-group">
                <label for="company_id">Company ID:</label>
                <input type="text" class="form-control" id="company_id" name="company_id" required>
            </div>
            <div class="form-group">
                <label for="medicine_name">Medicine Name:</label>
                <input type="text" class="form-control" id="medicine_name" name="medicine_name" required>
            </div>
            <div class="form-group">
                <label for="medicine_photo">Medicine Photo:</label>
                <input type="file" class="form-control-file" id="medicine_photo" name="medicine_photo" accept="image/*">
            </div>
            <div class="form-group">
                <label for="medicine_price">Medicine Price:</label>
                <input type="number" class="form-control" id="medicine_price" name="medicine_price" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Medicine</button>
        </form>
        <hr>

        <!-- Check Database Button -->
        <button type="button" class="btn btn-dark btn-block" onclick="window.open('ResultsFile.php', '_blank')">Check Database</button>
        <hr>

        <!-- Logout Form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="logout-form">
            <button type="submit" class="btn btn-danger" name="logout">Logout</button>
        </form>
    </div>

    <!-- Bootstrap JS (optional, for form validation) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
