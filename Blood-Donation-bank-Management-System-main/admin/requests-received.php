<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{


 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<link rel="icon" href="images/healthyheart.png">
	
	<title>BBDMS | Donor List  </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

	
					<div class="col-md-12">



<h3> Blood Requests Received</h3>
<hr />
						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Blood Info</div>
							<div class="panel-body">
							
								<table border="1" class="table table-responsive">
                                    <thead>
                                         <tr>
                                         	<th>S.No</th>
                                          <th>Name of Donar</th>
                                          <th>Conatact Number of Donar</th>
                                            <th>Name of Requirer</th>
                                            <th>Mobile Number of Requirer</th>
                                            <th>Email of Requirer</th>
                                            <th>Blood Require For</th>
                                            <th>Message of Requirer</th>
                                            <th>Apply Date</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       
                                        <tr>
										<?php
											$sql="SELECT tblbloodrequirer.BloodDonarID,tblbloodrequirer.name,tblbloodrequirer.EmailId,tblbloodrequirer.ContactNumber,tblbloodrequirer.BloodRequirefor,tblbloodrequirer.Message,tblbloodrequirer.ApplyDate,tblblooddonars.id as donid,tblblooddonars.FullName,tblblooddonars.MobileNumber from  tblbloodrequirer join tblblooddonars on tblblooddonars.id=tblbloodrequirer.BloodDonarID where tblblooddonars.FullName like '%$sdata%' || tblblooddonars.MobileNumber like '%$sdata%'";
											$stmt = $conn->prepare($sql);
											$stmt->execute();
											$results = $stmt->get_result();
											$cnt=1;
											if($results->num_rows > 0)
											{
												while($row = $results->fetch_assoc())
												{				
											?>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php  echo htmlentities($row['FullName']);?></td>
                                            <td><?php  echo htmlentities($row['MobileNumber']);?></td>
											<td><?php  echo htmlentities($row['name']);?></td>
											<td><?php  echo htmlentities($row['ContactNumber']);?></td>
											<td><?php  echo htmlentities($row['EmailId']);?></td>
											<td><?php  echo htmlentities($row['BloodRequirefor']);?></td>
											<td><?php  echo htmlentities($row['Message']);?> 
											</td>			
												<td>
												<?php  echo htmlentities($row['ApplyDate']);?>  
												</td>
											</tr>
                                   		 <?php $cnt=$cnt+1;}}?>
                                    </tbody>
                                </table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</body>
</html>
<?php } ?>
