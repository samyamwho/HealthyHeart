<?php 
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $mobile = $_POST['mobileno'];
    $email = $_POST['emailid'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blodgroup = $_POST['bloodgroup'];
    $address = $_POST['address'];
    $message = $_POST['message'];
    $status = 1;
    $password = md5($_POST['password']);

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $check_email_query = "SELECT * FROM tblblooddonars WHERE EmailId='$email'";
    $check_email_result = $conn->query($check_email_query);

    if($check_email_result->num_rows == 0) {
        $insert_query = "INSERT INTO tblblooddonars (FullName, MobileNumber, EmailId, Age, Gender, BloodGroup, Address, Message, status, Password) 
            VALUES ('$fullname', '$mobile', '$email', '$age', '$gender', '$blodgroup', '$address', '$message', '$status', '$password')";

        if ($conn->query($insert_query) === TRUE) {
            echo "<script>alert('You have signed up successfully');</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    } else {
        echo "<script>alert('Email-id already exists. Please try again');</script>";
    }
}
?>	
	

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Blood Bank Donar Management System | About Us </title>
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

</head>

<body>
    <?php include('includes/top.php'); ?>
    <?php include('includes/header.php');?>

    <!-- banner 2 -->
    <div class="inner-banner-w3ls">
        <div class="container">
        </div>
        <!-- //banner 2 -->
    </div>
   

    <!-- about -->
    <section class="about py-5">
        <div class="container py-xl-5 py-lg-3">
            <div class="login px-4 mx-auto mw-100">
                <h5 class="text-center mb-4">Register Now</h5>
                <form action="#" method="post" name="signup" onsubmit="return checkpass();">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="text" class="form-control" name="mobileno" id="mobileno" required="true" placeholder="Mobile Number" maxlength="10" pattern="[0-9]+">
                    </div>
                    
                    <div class="form-group">
                        <label class="mb-2">Email Id</label>
                        <input type="email" name="emailid" class="form-control" placeholder="Email Id">
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Age</label>
                        <input type="text" class="form-control" name="age" id="age" placeholder="Age" required="">
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Gender</label>
                        <select name="gender" class="form-control" required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
					<div class="form-group">
								<label class="mb-2">Blood Group</label>
								<select name="bloodgroup" class="form-control" required>
									<?php 
									$sql = "SELECT * FROM tblbloodgroup";
									$result = $conn->query($sql);
									
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) { ?>
											<option value="<?php echo htmlentities($row['BloodGroup']); ?>"><?php echo htmlentities($row['BloodGroup']); ?></option>
										<?php }
									} ?>
								</select>
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" class="form-control" name="address" id="address" required="true" placeholder="Address">
							</div>
							<div class="form-group">
								<label>Message</label>
								<textarea class="form-control" name="message" required> </textarea>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" id="password" required="">
							</div>
							<button type="submit" class="btn btn-primary submit mb-4" name="submit">Register</button>
							<p class="account-w3ls text-center pb-4" style="color:#000">
								Already Registered?
								<a href="login.php" >Sign in now</a>
							</p>

                </form>
            </div>
        </div>
    </section>
    <!-- //about -->

    <?php include('includes/footer.php');?>
    <script>
        $(function () {
            $("#slider4").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 1000,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });
        });
    </script>

</body>

</html>
