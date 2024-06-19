<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['send'])) {
    $cid = $_GET['cid'];
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $brf = $_POST['brf'];
    $message = $_POST['message'];

    $sql = "INSERT INTO tblbloodrequirer (BloodDonarID, name, EmailId, ContactNumber, BloodRequirefor, Message) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $cid, $name, $email, $contactno, $brf, $message);
    $stmt->execute();

    if($stmt->affected_rows > 0) {
        echo '<script>alert("Request has been sent. We will contact you shortly.")</script>';
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="zxx">
<head>
<link rel="icon" href="images/healthyheart.png" >
    <title>Blood Bank Donor Management System | Blood Requirer</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <style>
        .agileits-contact {
            background-color: #f7f7f7;
            padding: 50px 0;
        }
        .contact-right-w3l {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .btn_apt {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn_apt:hover {
            background-color: #0056b3;
        }
        .form-group label {
            font-weight: bold;
        }
        .space-d-flex {
            justify-content: space-between;
        }
        .grid-inputs {
            flex: 1;
            margin-right: 10px;
        }
    </style>
    <script>
        function hideURLbar() {
            window.scrollTo(0, 1);
        }

        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(hideURLbar, 0);
        });
    </script>
</head>
<body>
    <?php include('includes/header.php');?>

    <div class="inner-banner-w3ls">
        <div class="container"></div>
    </div>

    <div class="agileits-contact py-5">
        <div class="py-xl-5 py-lg-3">
            <div class="w3ls-titles text-center mb-5">
                <h3 class="title">Contact For Blood</h3>
                <span><i class="fas fa-user-md"></i></span>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-lg-7 contact-right-w3l">
                    <h5 class="title-w3 text-center mb-5">Fill the following form for blood</h5>
                    <form action="#" method="post">
                        <div class="d-flex space-d-flex">
                            <div class="form-group grid-inputs">
                                <label for="name" class="col-form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" name="fullname" placeholder="Please enter your name.">
                            </div>
                            <div class="form-group grid-inputs">
                                <label for="phone" class="col-form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="contactno" placeholder="Please enter your phone number.">
                            </div>
                        </div>
                        <div class="d-flex space-d-flex">
                            <div class="form-group grid-inputs">
                                <label for="email" class="col-form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Please enter your email address.">
                            </div>
                            <div class="form-group grid-inputs">
                                <label for="brf" class="col-form-label">Blood Require For</label>
                                <select class="form-control" id="brf" name="brf">
                                    <option value="">Blood Require For</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="col-form-label">Message</label>
                            <textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" name="send" class="btn_apt">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php');?>

    <!-- JavaScript for Smooth Scrolling and Back-to-Top Button -->
   