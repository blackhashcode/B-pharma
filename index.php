<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Welcome to Our Pharmacy</title>
    <style>
        /* Set height of carousel slides to 100vh (viewport height) */
        .carousel-item {
            height: 100vh;
            min-height: 300px; /* Set a minimum height to avoid very short slides */
            background-size: cover; /* Ensure that the background image covers the entire slide */
            background-position: center; /* Center the background image */
        }

        /* Center carousel captions vertically */
        .carousel-caption {
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand text-italic" href="#">B-Pharma</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    <li class="nav-item order-2">
                        <a class="nav-link" href="#carouselExampleIndicators" data-slide-to="1">Products</a>
                    </li>
                    <li class="nav-item order-1">
                        <a class="nav-link" href="#carouselExampleIndicators" data-slide-to="0">About</a>
                    </li>
                    <li class="nav-item order-3">
                        <a class="nav-link" href="#carouselExampleIndicators" data-slide-to="2">Associated Companies</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal" onclick="window.location.href='CustomerLogin.php'">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#signupModal" onclick="window.location.href='SignUpCustomer.php'">Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="LoginAdmin.php">Admin Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="SignUpAdmin.php">Admin Signup</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('https://twin-cities.umn.edu/sites/twin-cities.umn.edu/files/Medicine%20900x600.jpg');">
                <div class="carousel-caption d-none d-md-block text-dark font-weight-bold">
                    <h2 class="display-3">B-Pharma</h2>
                    <p class="blockquote font-italic">The 'B' in the name stands for 'Best' which is what we deliver</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('https://ophthalmicedge.org/patient/wp-content/uploads/2021/09/bigstock-Portrait-Of-Smiling-Happy-Conf-419166493-1.jpg');">
                <div class="carousel-caption d-none d-md-block text-dark font-weight-bold">
                    <h2 class="display-3">Drugs We Facilitate</h2>
                    <p class="blockquote font-italic">We offer a wide range of pharmaceutical products to meet your healthcare needs.</p>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-dark" onclick="window.location.href='SignUpCustomer.php'">Sign Up</button>
                        <button type="button" class="btn btn-dark " onclick="window.location.href='CustomerLogin.php'">Log In</button>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('https://businessinspection.com.bd/wp-content/uploads/2022/04/Top-7-Pharmaceutical-Companies-in-Bangladesh-1.jpg');">
                <div class="carousel-caption d-none d-md-block text-dark font-weight-bold">
                    <h2 class="display-3">Pharmaceutical Companies</h2>
                    <p class="blockquote font-italic">We sell products from reputable pharmaceutical companies in Bangladesh.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    </div>
    
</body>
</html>
