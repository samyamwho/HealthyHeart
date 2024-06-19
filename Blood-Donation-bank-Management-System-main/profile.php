
<?php 
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['bbdmsdid']) == 0) {
    header('location:logout.php');
} else {
    if(isset($_POST['update'])) {
        $uid = $_SESSION['bbdmsdid'];
        $name = $_POST['fullname'];
        $mno = $_POST['mobileno']; 
        $emailid = $_POST['emailid'];
        $age = $_POST['age']; 
        $gender = $_POST['gender'];
        $bloodgroup = $_POST['bloodgroup']; 
        $address = $_POST['address'];
        $message = $_POST['message']; 

        $sql = "UPDATE tblblooddonars SET FullName=?, MobileNumber=?, Age=?, Gender=?, BloodGroup=?, Address=?, Message=? WHERE id=?";
        $query = $conn->prepare($sql);
        $query->bind_param('sssssssi', $name, $mno, $age, $gender, $bloodgroup, $address, $message, $uid);
        $query->execute();
        echo '<script>alert("Profile has been updated")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Blood Bank Donar Management System !! Donor Profile</title>
	
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<!-- Popper JS library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<script type="text/javascript" src='js/bootstrap.js'></script>


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
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //Web-Fonts -->

</head>

<body>
	<?php include('includes/header.php');?>


	<!-- contact -->
	
		
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title">Donor Profile</h3>
				<span>
					<i class="fas fa-user-md"></i>
				</span>
			</div>
				<div class="container">
					<h5 class="title-w3 text-center mb-5">Detail of Your profile</h5>
					<form action="#" method="post">
												<?php
							$uid = $_SESSION['bbdmsdid'];
							$sql = "SELECT * FROM tblblooddonars WHERE id=?";
							$query = $conn->prepare($sql);
							$query->bind_param('i', $uid);
							$query->execute();
							$results = $query->get_result();
							$cnt = 1;

							if($results->num_rows > 0) {
								while($row = $results->fetch_assoc()) {
							?>

						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Full Name</label>
							<input type="text" class="form-control" name="fullname" id="fullname" value="<?php  echo $row['FullName'];?>">
						</div>
						<div class="form-group">
							<label for="recipient-phone" class="col-form-label">Mobile Number</label>
							<input type="text" class="form-control" name="mobileno" id="mobileno" required="true" maxlength="10" pattern="[0-9]+" value="<?php  echo $row['MobileNumber'];?>">
						</div>
						<div class="form-group">
							<label for="recipient-phone" class="col-form-label">Email Id <span style="color:red; font-size:10px;">(Can't be Change)</span></label>
							<input type="email" name="emailid" class="form-control" value="<?php  echo $row['EmailId'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="recipient-phone" class="col-form-label">Age</label>
							<input type="text" class="form-control" name="age" id="age" required="" value="<?php  echo $row['Age'];?>">
						</div>
						<div class="form-group">
							<label for="datepicker" class="col-form-label">Gender</label>
							<select required="" class="form-control" name="gender">
								<option value="<?php  echo $row['Gender'];?>"><?php  echo $row['Gender'];?></option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="form-group">
							<label for="datepicker" class="col-form-label">Blood Group</label>
							<select name="bloodgroup" class="form-control" required>
								<option value="<?php echo $row['BloodGroup']; ?>"><?php echo $row['BloodGroup']; ?></option>
								<?php
								$sql = "SELECT * FROM tblbloodgroup";
								$query = $conn->query($sql);
								if ($query->num_rows > 0) {
									while ($result = $query->fetch_assoc()) {
								?>
										<option value="<?php echo htmlentities($result['BloodGroup']); ?>"><?php echo htmlentities($result['BloodGroup']); ?></option>
								<?php
									}
								}
								?>
							</select>

						</div>
						<div class="form-group">
							<label for="datepicker" class="col-form-label">Address</label>
							<input type="text" class="form-control" name="address" id="address" required="true" value="<?php  echo $row['Address'];?>">
						</div>
						<div class="form-group">
							<label for="datepicker" class="col-form-label">Message</label>
							<textarea class="form-control" name="message" required><?php  echo $row['Message'];?></textarea>
						</div>
						
						<?php $cnt=$cnt+1;}} ?>
						<input type="submit" value="Update" name="update" class="bg-danger mb-5">
					</form>
					
				</div>
				<div class="clerafix"></div>
				
				
			</div>

	<!-- //contact -->

	
	
	<?php include('includes/footer.php');?>

</body>

</html><?php  ?>