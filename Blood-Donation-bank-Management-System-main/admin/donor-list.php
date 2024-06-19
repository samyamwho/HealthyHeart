<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0) {	
    header('location:index.php');
} else {
    if(isset($_REQUEST['hidden'])) {
        $eid=intval($_GET['hidden']);
        $status="0";
        $sql = "UPDATE tblblooddonars SET Status=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $status, $eid);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            $msg="Donor details hidden Successfully";
        }
    }

    if(isset($_REQUEST['public'])) {
        $aeid=intval($_GET['public']);
        $status=1;
        $sql = "UPDATE tblblooddonars SET Status=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $status, $aeid);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            $msg="Donor details public";
        }
    }

    //Code for Deletion
    if(isset($_REQUEST['del'])) {
        $did=intval($_GET['del']);
        $sql = "DELETE FROM tblblooddonars WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $did);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            $msg="Record deleted Successfully ";
        }
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
    <meta name="theme-color" content="#3e454c">
    
    <title>BBDMS | Donor List</title>

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
    <!-- Admin Style -->
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
        .succWrap {
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
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Donors List</h2>
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Donors Info</div>
                            <a href="download-records.php" style="font-size:16px;" class="btn btn-info">Download Donor List</a>
                            <div class="panel-body">
                                <?php if($error) {?>
                                    <div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error);?></div>
                                <?php } else if($msg) {?>
                                    <div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg);?></div>
                                <?php }?>
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Mobile No</th>
                                            <th>Email</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Blood Group</th>
                                            <th>Address</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Mobile No</th>
                                            <th>Email</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Blood Group</th>
                                            <th>Address</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT * FROM tblblooddonars ";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        $results = $stmt->get_result();
                                        $cnt=1;
                                        if($results->num_rows > 0) {
                                            while($result = $results->fetch_assoc()) {
                                        ?>  
                                            <tr>
                                                <td><?php echo htmlentities($cnt);?></td>
                                                <td><?php echo htmlentities($result['FullName']);?></td>
                                                <td><?php echo htmlentities($result['MobileNumber']);?></td>
                                                <td><?php echo htmlentities($result['EmailId']);?></td>
                                                <td><?php echo htmlentities($result['Gender']);?></td>
                                                <td><?php echo htmlentities($result['Age']);?></td>
                                                <td><?php echo htmlentities($result['BloodGroup']);?></td>
                                                <td><?php echo htmlentities($result['Address']);?></td>
                                                <td><?php echo htmlentities($result['Message']);?></td>
                                                <td>
                                                    <?php if($result['status']==1) {?>
                                                        <a href="donor-list.php?hidden=<?php echo htmlentities($result['id']);?>" onclick="return confirm('Do you really want to hide this detail')" class="btn btn-primary">Make it Hidden</a> 
                                                    <?php } else {?>
                                                        <a href="donor-list.php?public=<?php echo htmlentities($result['id']);?>" onclick="return confirm('Do you really want to make this detail public')" class="btn btn-primary">Make it Public</a>
                                                    <?php } ?>
                                                    <a href="donor-list.php?del=<?php echo htmlentities($result['id']);?>" onclick="return confirm('Do you really want to delete this record')" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <?php $cnt=$cnt+1; 
                                            }
                                        }?>
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


