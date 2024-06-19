<?php
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Blood Bank Donor Management System | Blood Donor List </title>
    <!-- Meta tag Keywords -->

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--// Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->

    <!-- Web-Fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <!-- //Web-Fonts -->
    <link rel="icon" href="images/healthyheart.png">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>

</head>

<body>
    <?php include('includes/header.php');?>
    <div class="agileits-contact py-5">
        <div class="card py-xl-5 py-lg-3">
            <div class="w3ls-titles text-center mb-5">
                <h3 class="title">Blood Donor List</h3>
                <span>
                    <i class="fas fa-user-md"></i>
                </span>
            </div>
            <div class="card">
                <div class="row package-grids mt-5" style="padding-left: 50px;">
                <?php
                    session_start();
                    error_reporting(0);
                    include('includes/config.php');
                    $status = 1;
                    $sql = "SELECT * FROM tblblooddonars WHERE status = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $status);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 pricing" style="margin-bottom: 20px;">
                                <div class="price-top">
                                    <?php if (!empty($row['ImagePath'])) { ?>
                                        <?php echo htmlentities($row['ImagePath']); ?>;
                                        <img src="admin/<?php echo htmlentities($row['ImagePath']); ?>" alt="<?php echo htmlentities($row['FullName']); ?>" style="border: 1px solid #000; width: 200px; height: 200px;" class="img-fluid" />
                                    <?php } else { ?>
                                        <img src="images/image.png" alt="Blood Donor" style="border: 1px solid #000; width: 200px; height: 200px;" class="img-fluid" />
                                    <?php } ?>
                                    <h3 style="font-size: 1.2em; margin-top: 10px;"><?php echo htmlentities($row['FullName']);?></h3>
                                </div>
                                <div class="price-bottom p-2" style="font-size: 0.9em;">
                                    <table class="table table-bordered mb-0">
                                        <tbody>
                                            <tr>
                                                <th style="width: 30%;">Gender</th>
                                                <td><?php echo htmlentities($row['Gender']);?></td>
                                            </tr>
                                            <tr>
                                                <th>Blood Group</th>
                                                <td><?php echo htmlentities($row['BloodGroup']);?></td>
                                            </tr>
                                            <tr>
                                                <th>Mobile No.</th>
                                                <td><?php echo htmlentities($row['MobileNumber']);?></td>
                                            </tr>
                                            <tr>
                                                <th>Email ID</th>
                                                <td><?php echo htmlentities($row['EmailId']);?></td>
                                            </tr>
                                            <tr>
                                                <th>Age</th>
                                                <td><?php echo htmlentities($row['Age']);?></td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td><?php echo htmlentities($row['Address']);?></td>
                                            </tr>
                                            <tr>
                                                <th>Message</th>
                                                <td><?php echo htmlentities($row['Message']);?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a class="btn btn-primary mt-3" style="color:#fff; font-size: 0.9em;" href="contact-blood.php?cid=<?php echo $row['id'];?>">Request</a>
                                </div>
                            </div>
                        <?php }
                    }
                    $stmt->close();
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- //contact -->
    <?php include('includes/footer.php');?>
</body>
</html>
