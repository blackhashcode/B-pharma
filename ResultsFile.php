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
            padding-top: 20px;
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>

        <!-- Search Form for Medicines -->
        <div class="row mb-3">
            <div class="col-md-6">
                <form class="form-inline my-2 my-lg-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search by Medicine Name" aria-label="Search" name="search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>

        <!-- Medicine Table -->
        <h3>Medicine Table</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Medicine ID</th>
                    <th>Category</th>
                    <th>Company</th>
                    <th>Medicine Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
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

                // Initialize search query for medicine
                $search_query = "";

                if (isset($_GET['search'])) {
                    $search = $conn->real_escape_string($_GET['search']);
                    $search_query = "WHERE m.MedicineName LIKE '%$search%'";
                }

                // Fetch data from medicine table with search query
                $sql_medicine = "SELECT m.MedID, c.MedicineCategoryName, co.CompanyName, m.MedicineName, m.Price
                                FROM medicine m
                                LEFT JOIN category c ON m.MedCatRef = c.VarID
                                LEFT JOIN companies co ON m.MedCompRef = co.CompanyID
                                $search_query";
                $result_medicine = $conn->query($sql_medicine);

                if ($result_medicine->num_rows > 0) {
                    while($row = $result_medicine->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['MedID']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['MedicineCategoryName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['CompanyName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['MedicineName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Price']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Customer Table -->
        <h3>Customer Table</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Home Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data from customer table
                $sql_customer = "SELECT * FROM customer";
                $result_customer = $conn->query($sql_customer);

                if ($result_customer->num_rows > 0) {
                    while($row = $result_customer->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['UserID']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['FirstName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['LastName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['PhoneNumber']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['HomeAddress']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Category Table -->
        <h3>Category Table</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Company Ref ID</th>
                    <th>Category Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data from category table
                $sql_category = "SELECT * FROM category";
                $result_category = $conn->query($sql_category);

                if ($result_category->num_rows > 0) {
                    while($row = $result_category->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['VarID']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['CompanyRefID']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['MedicineCategoryName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['DescUse']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Order Table -->
        <h3>Order Table</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer ID</th>
                    <th>Total Price</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data from orders table
                $sql_orders = "SELECT o.OrderID, o.CustomerID, o.TotalPrice, o.OrderDate
                               FROM orders o";
                $result_orders = $conn->query($sql_orders);

                if ($result_orders->num_rows > 0) {
                    while($row = $result_orders->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['OrderID']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['CustomerID']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['TotalPrice']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['OrderDate']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Company Table -->
        <h3>Company Table</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Company ID</th>
                    <th>Company Name</th>
                    <th>Establish Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data from companies table
                $sql_companies = "SELECT * FROM companies";
                $result_companies = $conn->query($sql_companies);

                if ($result_companies->num_rows > 0) {
                    while($row = $result_companies->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['CompanyID']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['CompanyName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['EstablishDate']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (optional, for table styling) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script
