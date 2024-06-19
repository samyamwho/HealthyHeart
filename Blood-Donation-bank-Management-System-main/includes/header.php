<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <!-- Include Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, .navbar, .nav-link {
            font-family: 'Poppins', sans-serif;
        }

        body {
            padding-top: 170px; /* Adjust this value to match the height of your navbar and logo */
            
        }

        .navbar {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            
           
        }

        .nav-link {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .nav-item {
            margin-right: 30px; /* Adjust the value to add spacing between list items */
        }

        .navbar-brand img {
            max-width: 125px;
            height: auto;

        }
        :root {
         --gray-300: #e8eaed; /* Replace with your actual gray color value */
            }

            .custom-navbar {
                background-color: var(--gray-300) !important;
            }


    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light custom-navbar fixed-top ">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.png" alt="healthy heart logo">
            </a>
            <button class="navbar-toggler" type="button" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php" style="color: black;">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php" style="color: black;">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php" style="color: black;">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="donor-list.php" style="color: black;">Donor List</a>
                    </li>
                    <?php if (strlen($_SESSION['bbdmsdid']) != 0) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: black;">
                            My Account
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profile.php" style="color: black;">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="change-password.php" style="color: black;">Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="request-received.php" style="color: black;">Request Received</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php" style="color: black;">Logout</a>
                        </div>
                    </li>
                    <?php } ?>
                    <?php if (strlen($_SESSION['bbdmsdid']) == 0) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/index.php" style="color: black;">Admin</a>
                    </li>
                </ul>
                <!-- login -->
                <a href="login.php" class="btn btn-outline-dark ml-lg-3 mt-lg-0 mt-3 mb-lg-0 mb-3">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>
                <?php } ?>
                <!-- //login -->
            </div>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggler = document.querySelector('.navbar-toggler');
            var navbarCollapse = document.querySelector('#navbarExample');

            toggler.addEventListener('click', function() {
                navbarCollapse.classList.toggle('collapse');
                navbarCollapse.classList.toggle('show');
            });

            // Custom dropdown
            var dropdown = document.querySelector('.dropdown-toggle');
            var dropdownMenu = document.querySelector('.dropdown-menu');

            dropdown.addEventListener('click', function() {
                dropdownMenu.classList.toggle('show');
            });
        });
    </script>
    
        

