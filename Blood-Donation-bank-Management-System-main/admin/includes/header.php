<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Healthy Heart Blood Bank</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .nav {
            background-color: #9A616D;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 15px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .menu-btn {
            display: none;
            font-size: 20px;
            color: #fff;
            cursor: pointer;
        }

        .ts-profile-nav {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .ts-profile-nav li {
            position: relative;
        }

        .ts-profile-nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            display: flex;
            align-items: center;
        }

        .ts-profile-nav img {
            border-radius: 50%;
            margin-right: 10px;
        }

        .ts-profile-nav ul {
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #9A616D;
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: none;
        }

        .ts-profile-nav ul.show {
            display: block;
        }

        .ts-profile-nav ul li a {
            padding: 20px;
            display: block;
        }

        @media (max-width: 768px) {
            .menu-btn {
                display: block;
            }

            .ts-profile-nav {
                display: none;
                flex-direction: column;
                width: 100%;
            }

            .ts-profile-nav.show {
                display: flex;
            }

            .ts-profile-nav li a {
                width: 100%;
                text-align: left;
            }

            .ts-profile-nav li ul {
                position: static;
            }
        }

        .content {
            margin-top: 60px; /* Adjust this value to match the height of your fixed header */
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="nav">
        <a href="dashboard.php" style="color:white">Healthy Heart Blood Bank</a>
        <span class="menu-btn"><i class="fa fa-bars"></i></span>
        <ul class="ts-profile-nav">
            <li class="ts-account">
                <a href="#" class="account-toggle"><img src="img/avatar.png" class="ts-avatar" alt=""> Account</a>
                <ul class="account-dropdown">
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="change-password.php">Change Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="content">
        <!-- Your page content goes here -->
    </div>

    <script>
        document.querySelector('.menu-btn').addEventListener('click', function () {
            document.querySelector('.ts-profile-nav').classList.toggle('show');
        });

        document.querySelector('.account-toggle').addEventListener('click', function (event) {
            event.preventDefault();
            document.querySelector('.account-dropdown').classList.toggle('show');
        });
    </script>
</body>


