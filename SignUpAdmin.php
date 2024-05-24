<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://png.pngtree.com/thumb_back/fh260/background/20210923/pngtree-health-care-gradient-blue-theme-light-effect-background-image_904155.png'); /* Medical-themed background */
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
            padding: 20px;
            border-radius: 10px;
            width: 400px; /* Fixed width */
            text-align: center; /* Center text */
        }
        .form-container h2 {
            margin-bottom: 20px; /* Spacing below the heading */
        }
        .form-container label {
            font-weight: bold;
        }
        .form-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: none;
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
            <h2>Admin Signup</h2>
            <form method="post" action="serverforadmin.php">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <button type="submit" class="btn btn-primary">Signup</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
