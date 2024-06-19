<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['bbdmsdid']==0)) {
  header('location:logout.php');
} else {
  if(isset($_POST['change'])) {
    $uid = $_SESSION['bbdmsdid'];
    $cpassword = md5($_POST['currentpassword']);
    $newpassword = md5($_POST['newpassword']);
    $sql = "SELECT ID FROM tblblooddonars WHERE id=? and Password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $uid, $cpassword);
    $stmt->execute();
    $results = $stmt->get_result();

    if($results->num_rows > 0) {
      $sql = "UPDATE tblblooddonars SET Password=? WHERE id=?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ss", $newpassword, $uid);
      $stmt->execute();
      echo '<script>alert("Your password successfully changed")</script>';
    } else {
      echo '<script>alert("Your current password is wrong")</script>';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>Blood Bank Donor Management System - Change Password</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Custom-Files -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- Bootstrap-Core-CSS -->
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
  <!-- Style-CSS -->
  <link rel="stylesheet" href="css/fontawesome-all.css">
  <link rel="icon" href="images/healthyheart.png" >
  <!-- Font-Awesome-Icons-CSS -->
  <!-- //Custom-Files -->

  <!-- Web-Fonts -->
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
    rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
    rel="stylesheet">
  <!-- //Web-Fonts -->
  <style>
    .appointment {
      background-color: #f7f7f7;
      padding: 50px 0;
    }
    .appoint-form {
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
  </style>
  <script>
    function hideURLbar() {
      window.scrollTo(0, 1);
    }

    function checkpass() {
      if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
        alert('New Password and Confirm Password field do not match');
        document.changepassword.confirmpassword.focus();
        return false;
      }
      return true;
    }

    document.addEventListener("DOMContentLoaded", function() {
      setTimeout(hideURLbar, 0);
    });
  </script>
</head>

<body>
  <?php include('includes/header.php');?>

  <!-- banner 2 -->
  <div class="inner-banner-w3ls">
    <div class="container"></div>
  </div>
  <!-- //banner 2 -->

  <!-- page details -->
  <div class="breadcrumb-agile">
    <div aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
      </ol>
    </div>
  </div>
  <!-- //page details -->

  <!-- contact -->
  <div class="appointment py-5">
    <div class="py-xl-5 py-lg-3">
      <div class="w3ls-titles text-center mb-5">
        <h3 class="title">Change Password</h3>
        <span>
          <i class="fas fa-user-md"></i>
        </span>
      </div>
      <div class="d-flex justify-content-center">
        <div class="contact-right-w3l appoint-form">
          <h5 class="title-w3 text-center mb-5">Reset your password if needed</h5>
          <form action="#" method="post" onsubmit="return checkpass();" name="changepassword">
            <div class="form-group">
              <label for="currentpassword" class="col-form-label">Current Password</label>
              <input type="password" class="form-control" name="currentpassword" id="currentpassword" required>
            </div>
            <div class="form-group">
              <label for="newpassword" class="col-form-label">New Password</label>
              <input type="password" name="newpassword" class="form-control" id="newpassword" required>
            </div>
            <div class="form-group">
              <label for="confirmpassword" class="col-form-label">Confirm Password</label>
              <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
            </div>
            <input type="submit" value="Update" name="change" class="btn_apt">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- //contact -->

  <?php include('includes/footer.php');?>

</body>

</html>

