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
    <link rel="icon" href="images/healthyheart.png">

    <script>
        window.addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        });

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

        function checkpass() {
            var newPassword = document.changepassword.newpassword.value;
            var confirmPassword = document.changepassword.confirmpassword.value;
            if (newPassword !== confirmPassword) {
                alert('New Password and Confirm Password field does not match');
                document.changepassword.confirmpassword.focus();
                return false;
            }
            return true;
        }

        document.addEventListener("DOMContentLoaded", function () {
            var datepickers = document.querySelectorAll("#datepicker, #datepicker1");
            datepickers.forEach(function (datepicker) {
                datepicker.addEventListener("focus", function () {
                    new VanillaDatepicker(datepicker);
                });
            });
        });

        function VanillaDatepicker(element) {
            var input = element;
            input.addEventListener("click", function () {
                var datepicker = document.createElement("input");
                datepicker.type = "date";
                datepicker.addEventListener("change", function () {
                    input.value = datepicker.value;
                    datepicker.remove();
                });
                input.parentNode.insertBefore(datepicker, input.nextSibling);
                datepicker.focus();
            });
        }
    </script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
</head>

<body>
    <?php include('includes/header.php');?>

    <div class="inner-banner-w3ls">
        <div class="container">

        </div>
    </div>
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
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php');?>

    <!-- Js files -->
    <script src="js/bootstrap.js"></script>
</body>

</html>
<?php } ?>
