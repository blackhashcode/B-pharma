<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Signup</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1556767574-1d94c67f1d04'); /* Background image URL */
            background-size: cover;
            background-position: center;
            height: 100vh; /* Full viewport height */
            display: flex;
            align-items: center; /* Center items vertically */
            justify-content: center; /* Center items horizontally */
            color: #fff; /* Text color */
        }
        .form-container {
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
            padding: 30px;
            border-radius: 10px;
            width: 400px; /* Fixed width */
            text-align: center; /* Center text */
        }
        .form-container h2 {
            margin-bottom: 20px; /* Spacing below the heading */
        }
        .form-container label {
            font-weight: bold;
            color: #fff; /* Text color */
        }
        .form-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.8); /* Transparent white background */
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff; /* Bootstrap primary color */
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Customer Signup</h2>
            <form method="post" action="SignUpCustomerServer.php">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="phonenumber">Phone Number:</label>
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" required>
                </div>
                <div class="form-group">
                    <label for="homeaddress">Home Address:</label>
                    <input type="text" class="form-control" id="homeaddress" name="homeaddress" required>
                </div>
                <button type="submit" class="btn btn-primary">Signup</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (optional, for form validation) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
