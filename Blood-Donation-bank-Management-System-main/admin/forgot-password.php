<?php
session_start();
include('includes/config.php');
if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $newpassword=md5($_POST['newpassword']);
    $sql ="SELECT Email FROM tbladmin WHERE Email=? and MobileNumber=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $mobile);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows > 0)
    {
        $sql="UPDATE tbladmin SET Password=? WHERE Email=? and MobileNumber=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $newpassword, $email, $mobile);
        $stmt->execute();
        echo "<script>alert('Your Password succesfully changed');</script>";
    }
    else {
        echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
    }
}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="images/healthyheart.png">

	<title>BloodBank & Donor Management System | Forgot Password</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>

<body>
	
	<div class="login-page bk-img" style="background-image: url(img/bg.png;">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">BloodBank & Donor Management System Forgot Password</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post" name="chngpwd" onsubmit="return checkpass();">

									<label for="" class="text-uppercase text-sm">Email </label>
									
									<input type="email" class="form-control mb" placeholder="Email Address" required="true" name="email">

									<label for="" class="text-uppercase text-sm">Mobile Number</label>
								<input type="text" class="form-control mb"  name="mobile" placeholder="Mobile Number" required="true" maxlength="10" pattern="[0-9]+">

								<label for="" class="text-uppercase text-sm">New Password</label>
								<input class="form-control mb" type="password" name="newpassword" placeholder="New Password" required="true"/>

								<label for="" class="text-uppercase text-sm">Confirm Password</label>
								<input class="form-control mb" type="password" name="confirmpassword" placeholder="Confirm Password" required="true" />

									<button class="btn btn-primary btn-block" name="submit" type="submit">Reset</button>
<a href="index.php" >signin</a>
								</form>
								<div class="card-footer text-center" style="padding-top: 30px;">
                                        <div class="small"><a href="../index.php" class="btn btn-primary">Back to Home</a></div>
                                    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	


</body>

</html>