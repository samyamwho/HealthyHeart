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
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .ts-sidebar-menu {
                list-style-type: none;
                padding: 0;
                margin: 0;
                display: flex;
                justify-content: center; /* Display menu items horizontally */
            }
        .ts-sidebar-menu li {
            margin-right: 50px; 
            /* Add spacing between menu items */
        }


        .ts-sidebar {
            background-color: #424242;
            color: #fff;
            padding: 15px;
            width: 100%; /* Set a fixed width for the sidebar */
        }
        .ts-sidebar-menu li {
            margin-bottom: 10px;
        }

        .ts-sidebar-menu a {
            text-decoration: none;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s ease;
            display: inline-block; /* Display each menu item horizontally */
            margin-right: 10px; /* Add some spacing between menu items */
        }

        .ts-sidebar-menu a:hover {
            background-color: #38304a;
        }

        .ts-sidebar-menu i {
            font-size: 24px;
            margin-right: 5px;
        }

        .ts-sidebar-menu span {
            font-size: 18px;
        }

        .menu-toggle {
            display: none;
        }

        @media (max-width: 1024px) {
            .ts-sidebar {
                display: none;
            }

            .ts-sidebar.show {
                display: block;
            }

            .menu-toggle {
                display: block;
                background-color: #2a2438;
            color: #fff;
            padding: 15px;
            width: 100%;
            }

            .ts-sidebar-menu {
                display: none;
            }

            .ts-sidebar.show .ts-sidebar-menu { 
                display: block;
            }
        }
    </style>
</head>

<body>  
    <button class="menu-toggle">☰ Menu</button>
    <nav class="ts-sidebar">
        <ul class="ts-sidebar-menu">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="add-bloodgroup.php"><i class="fa fa-users"></i> <span>Add Blood Group</span></a></li>
            <li><a href="manage-bloodgroup.php"><i class="fa fa-users"></i> <span>Manage Blood Group</span></a></li>
            <li><a href="donor-list.php"><i class="fa fa-users"></i> <span>Donor List</span></a></li>
            <li><a href="add-donor.php"><i class="fa fa-users"></i> <span>Add Donor</span></a></li>
            <li><a href="request-received-bydonar.php"><i class="fa fa-users"></i> <span>Request Received By Donor</span></a></li>
            
        </ul>
    </nav>

    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.ts-sidebar').classList.toggle('show');
        });
    </script>
</body>

</html>
