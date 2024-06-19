<?php
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Blood Bank Donor Management System | About Us </title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />

    <!-- Custom-Files -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <!-- Font-Awesome-Icons-CSS -->

    <!-- Web-Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap"
        rel="stylesheet">
        <link rel="icon" href="images/healthyheart.png" >
</head>

<body>
<?php include('includes/top.php'); ?>
    <?php include('includes/header.php');?>

    <div class="screen-w3ls py-5">
        <div class="container py-xl-5 py-lg-3">
            <div class="row">
                <!-- About Us Section -->
                <div class="col-md-6 mb-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="card-title">About Us</h3>
                            <span>
                                <i class="fas fa-user-md"></i>
                            </span>
                            <p class="card-text mt-2">At Healthy Heart Blood Bank, we are committed to saving lives by ensuring a steady supply of safe and quality blood for those in need. Established with the aim of addressing the critical shortage of blood in our community, we strive to be the leading provider of blood and blood products, serving hospitals, medical facilities, and patients across the region.</p>
                        </div>
                    </div>
                </div>
                <!-- Our Mission Section -->
                <div class="col-md-6 mb-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="card-title">Our Mission</h3>
                            <p class="card-text mt-2">Our mission is to promote and facilitate blood donation, ensuring a sustainable blood supply for patients in need of transfusions. We are dedicated to raising awareness about the importance of blood donation and encouraging individuals to become regular blood donors, ultimately saving lives and improving the health of our community.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Our Vision Section -->
            <div class="w3ls-titles text-center mb-5">
                <h3 class="title">Our Vision</h3>
                <p class="mt-2">We envision a future where every individual has access to safe and adequate blood when needed, regardless of their location or circumstances. Through our efforts, we aim to eliminate the shortage of blood and blood products, contributing to better healthcare outcomes and enhanced quality of life for all.</p>
            </div>
            <!-- Additional Content -->
            <div class="row">
                <div class="col-lg-6">
                    <ul>
                        <li>Blood Donation: We organize regular blood donation drives at various locations, making it convenient for individuals to donate blood and save lives.</li>
                        <li>Blood Testing: All donated blood undergoes rigorous testing to ensure its safety and quality before being used for transfusions.</li>
                        <li>Blood Processing and Storage: We process and store donated blood and blood products under optimal conditions to maintain their efficacy and shelf life.</li>
                        <li>Blood Distribution: We work closely with hospitals and medical facilities to distribute blood and blood products to patients in need, ensuring timely access to lifesaving treatments.</li>
                    </ul>
                    <p>A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to eat prior to your donation.</p>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid rounded" width="300px" src="images/healthyheart.png" alt="">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-8">
                    <h4 style="padding-top: 30px;">Get Involved</h4>
                    <p>You can make a difference by becoming a blood donor or volunteering with us to support our blood donation initiatives. Join us in our mission to save lives and promote a healthier, more resilient community. </p>
                </div>
                <div class="col-md-4" style="padding-top: 30px;">
                    <a class="btn btn-lg btn-secondary btn-block login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3" href="donor-list.php">Become a Donor</a>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php');?>

    <!-- JavaScript -->
    <script src="js/bootstrap.js"></script>
    <!-- Necessary-JavaScript-File-For-Bootstrap -->

</body>


</html>
