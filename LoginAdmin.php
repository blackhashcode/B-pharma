<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            height: 100vh; /* Full viewport height */
            display: flex;
            align-items: center; /* Center items vertically */
            justify-content: center; /* Center items horizontally */
        }
        .form-container {
            background-color: #fff; /* White background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); /* Soft shadow */
            width: 400px; /* Fixed width */
            text-align: center; /* Center text */
        }
        .form-container h2 {
            margin-bottom: 20px; /* Spacing below the heading */
            color: #007bff; /* Bootstrap primary color */
        }
        .form-container label {
            font-weight: bold;
            color: #555; /* Dark gray text */
        }
        .form-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc; /* Light gray border */
            border-radius: 5px;
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
            <h2>Admin Login</h2>
            <form method="post" action="LoginAdminServer.php">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (optional, for form validation) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
