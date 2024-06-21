<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $message = $_POST['message'];
    $sql = "INSERT INTO tblcontactusquery(name, EmailId, ContactNumber, Message) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $contactno, $message);
    $stmt->execute();
    if($stmt->affected_rows > 0) {
        echo '<script>alert("Query Sent. We will contact you shortly.")</script>';
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Blood Bank Donar Management System | Contact Us </title>
	<!-- Meta tag Keywords -->
	
	<script>
		window.addEventListener("load", function () {
			setTimeout(function() {
				window.scrollTo(0, 1);
			}, 0);
		}, false);
	</script>
	<!--// Meta tag Keywords -->

	<link rel="icon" href="images/healthyheart.png" >

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
		
	<!-- //Web-Fonts -->

</head>

<body>
	<?php include('includes/top.php'); ?>
	<?php include('includes/header.php');?>

	<!-- contact -->
	<div class="container">
		<div class="">
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title">Contact Us</h3>
				<span>
					<i class="fas fa-user-md"></i>
				</span>
			</div>
			<div class="container" style="display: flex; justify-content: center;">
    <div class="col-lg-7 contact-right-w3l" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-bottom:40px;">
        <h5 class="title-w3 text-center mb-5">Get In Touch</h5>
        <form action="#" method="post">
            
                <div class="form-group grid-inputs">
                    <input type="text" class="form-control" id="name" name="fullname" placeholder="Please enter your name." style="border-radius: 5px;">
                </div>

           
			<div class="form-group grid-inputs">
                    <input type="text" class="form-control" id="phone" name="contactno" placeholder="Please enter your phone number." style="border-radius: 5px;">
                </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" required placeholder="Please enter your email address." style="border-radius: 5px;">
            </div>
            <div class="form-group">
                <textarea rows="5" class="form-control" id="message" name="message" placeholder="Please enter your message" maxlength="999" style="resize:none; border-radius: 5px;"></textarea>
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Send Message" name="send" class="btn btn-primary" style="padding: 10px 20px; border-radius: 5px; background-color: #007bff; border-color: #007bff;">
            </div>
        </form>
    </div>
</div>

		</div>
	</div>
	


	<?php include('includes/footer.php');?>

	

</body>

</html>
