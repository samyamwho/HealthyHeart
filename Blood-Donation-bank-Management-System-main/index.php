<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Healthy Heart | Home Page</title>
    <link rel="icon" href="images/healthyheart.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Eczar:wght@400..800&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<style>
    h1, h2 {
        font-family: 'El Messiri', sans-serif;
        font-weight: lighter;
    }
    p {
        font-size: 20px;
    }
    .navbar-toggler {
        z-index: 1;
    }
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    .red-text {
        color: red;
    }
</style>

<body>

    <?php include('includes/header.php'); ?>
    <?php include('includes/slider.php'); ?>

    <div class="container py-xl-5 py-lg-3">
        <h2 id="welcomeMessage" class="text-center mt-5 display-5"></h2>
        <p class="text mt-5">
            Thank you for visiting Healthy Heart, your trusted online blood bank management system. At <span class="red-text">Healthy Heart</span>, we are dedicated to saving lives by connecting donors with those in need of blood. Whether you're here to donate blood or seeking assistance, we're here to help. Together, we can make a difference and contribute to a healthier, happier community. Explore our services and join us in our mission to save lives.
        </p>
    </div>

    <!-- blog -->
    <div class="">
        <div class="container py-xl-5 py-lg-3">
            <div class="w3ls-titles text-center mb-5">
                <h2 class="text-center display-5">Some of the <span class="red-text">Donors</span></h2>
            </div>
            <div class="row package-grids mt-5">
                <?php 
                $status = 1;
                $sql = "SELECT * FROM tblblooddonars WHERE status=? ORDER BY rand() LIMIT 6";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $status);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                <div class="col-md-4 pricing" style="margin-top: 2%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px; overflow: hidden; transition: transform 0.3s ease;">
                    <div class="price-top" style="background-color: #f8f9fa; padding: 20px; text-align: center; margin-top: 2%;">
                    <?php if (!empty($row['ImagePath'])) { ?>
                                        <img src="admin/<?php echo htmlentities($row['ImagePath']); ?>" alt="<?php echo htmlentities($row['FullName']); ?>" style="border: 1px solid #000; width: 200px; height: 200px;" class="img-fluid" />
                                    <?php } else { ?>
                                        <img src="images/samyam.png" alt="Blood Donor" style="border: 1px solid #000; width: 200px; height: 200px;" class="img-fluid" />
                                    <?php } ?>                        <h3><?php echo htmlentities($row['FullName']); ?></h3>
                    </div>
                    <div class="price-bottom p-4" style="background-color: #fff; padding: 20px;">
                        <h4 class="text-dark mb-3" style="font-size: 1.2em; color: #333;">Gender: <?php echo htmlentities($row['Gender']); ?></h4>
                        <p class="card-text" style="font-size: 1em; color: #666;"><b>Blood Group :</b> <?php echo htmlentities($row['BloodGroup']); ?></p>
                        <a class="btn btn-secondary" style="color: #fff; display: inline-block; margin-top: 15px; padding: 10px 20px; font-size: 1em;" href="contact-blood.php?cid=<?php echo $row['id']; ?>">Request</a>
                    </div>
                </div>
                <?php }
                }
                $stmt->close();
                ?>
            </div>
        </div>
    </div>
    <!-- //blog -->

    <!-- treatments -->
    <div class="screen-w3ls py-5">
        <div class="container py-xl-5 py-lg-3">
            <div class="w3ls-titles text-center mb-5">
                <h3 class="title">BLOOD GROUPS</h3>
                <span><i class="fas fa-user-md"></i></span>
                <p class="mt-2">Blood group of any human being will mainly fall in any one of the following groups.</p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <ul>
                        <li>A positive or A negative</li>
                        <li>B positive or B negative</li>
                        <li>O positive or O negative</li>
                        <li>AB positive or AB negative.</li>
                    </ul>
                    <p>A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to eat prior to your donation.</p>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid rounded" width="300px" src="images/healthyheart.png" alt="">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-8">
                    <h4 style="padding-top: 30px;">UNIVERSAL DONORS AND RECIPIENTS</h4>
                    <p>The most common blood type is O, followed by type A. Type O individuals are often called "universal donors" since their blood can be transfused into persons with any blood type. Those with type AB blood are called "universal recipients" because they can receive blood of any type.</p>
                </div>
                <div class="col-md-4" style="padding-top: 30px;">
                    <a class="btn btn-lg btn-secondary btn-block login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3" href="donor-list.php">Become a Donor</a>
                </div>
            </div>
        </div>
    </div>
    <!-- //treatments -->

    <!-- footer -->
    <?php include('includes/footer.php'); ?>

    <!-- Vanilla JavaScript to Display Welcome Message -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var username = <?php echo json_encode(isset($_SESSION['username']) ? $_SESSION['username'] : null); ?>;
        var welcomeMessage = document.getElementById('welcomeMessage');        if (username) {
            welcomeMessage.innerHTML = `Welcome to <span style="color: red;">Healthy Heart</span>, ${username}!`;
        } else {
            welcomeMessage.innerHTML = `Welcome to <span style="color: red;">Healthy Heart</span>!`;
        }
    });
    </script>

</body>
</html>
