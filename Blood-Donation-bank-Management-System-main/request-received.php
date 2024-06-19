<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['bbdmsdid']) == 0) {
    header('location:logout.php');
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blood Bank Donar Management System !! Request Received</title>

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <script type="text/javascript">
        function checkpass() {
            if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                alert('New Password and Confirm Password field does not match');
                document.changepassword.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>


    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <!-- Popper JS library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script type="text/javascript" src='js/bootstrap.js'></script>

    <script src="Scripts/umd/popper.min.js"></script>

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

</head>

<body>
    <?php include('includes/header.php');?>

    <!-- banner 2 -->
    <div class="inner-banner-w3ls">
        <div class="container">

        </div>
        <!-- //banner 2 -->
    </div>
    <!-- page details -->
    <!-- <div class="breadcrumb-agile">
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Request Received</li>
            </ol>
        </div>
    </div> -->
    <!-- //page details -->

    <!-- contact -->
    <div class="appointment py-5">
        <div class="py-xl-5 py-lg-3">
            <div class="w3ls-titles text-center mb-5">
                <h3 class="title">Request Received</h3>
                <span>
                    <i class="fas fa-user-md"></i>
                </span>
            </div>
            <div class="d-flex">

                <div class="contact-right-w3l appoint-form" style="width:100% !important;">
                    <h5 class="title-w3 text-center mb-5">Below is the detail of Blood Requirer.</h5>
                    <table border="1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>Blood Require For</th>
                                <th>Message</th>
                                <th>Apply Date</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <?php
                                $uid = $_SESSION['bbdmsdid'];
                                $sql = "SELECT tblbloodrequirer.BloodDonarID, tblbloodrequirer.name, tblbloodrequirer.EmailId, tblbloodrequirer.ContactNumber, tblbloodrequirer.BloodRequirefor, tblbloodrequirer.Message, tblbloodrequirer.ApplyDate, tblblooddonars.id as donid 
                                    FROM tblbloodrequirer 
                                    JOIN tblblooddonars ON tblblooddonars.id = tblbloodrequirer.BloodDonarID 
                                    WHERE tblbloodrequirer.BloodDonarID = ?";
                                $query = $conn->prepare($sql);
                                $query->bind_param('i', $uid);
                                $query->execute();
                                $results = $query->get_result();
                                $cnt = 1;
                                if ($results->num_rows > 0) {
                                    while ($row = $results->fetch_assoc()) {
                                ?>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td><?php echo htmlentities($row['name']); ?></td>
                                       
                                        <td><?php echo htmlentities($row['ContactNumber']); ?></td>
                                        <td><?php echo htmlentities($row['EmailId']); ?></td>
                                        <td><?php echo htmlentities($row['BloodRequirefor']); ?></td>
                                        <td><?php echo htmlentities($row['Message']); ?></td>
                                        <td><?php echo htmlentities($row['ApplyDate']); ?></td>
                                    </tr>
                                <?php
                                        $cnt++;
                                    }
                                } else {
                                ?>
                                    <tr>
                                        <th colspan="7" style="color:red;"> No Record found</th>
                                    </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="clerafix"></div>
            </div>
        </div>
    </div>
    <!-- //contact -->

    <?php include('includes/footer.php');?>
    <!-- Js files -->
    <!-- JavaScript -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- Default-JavaScript-File -->

    <!--start-date-piker-->
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <script src="js/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker,#datepicker1").datepicker();
        });
    </script>

</body>

</html>
<?php } ?>
