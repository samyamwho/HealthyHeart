<!doctype html>
<html lang="en" class="no-js">
<head>
    
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>Healthy Heart | Admin Dashboard</title>
    <link rel="icon" href="images/healthyheart.png">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <style>
        /* Custom CSS for the Dashboard */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .page-title {
            margin-top: 20px;
            margin-bottom: 30px;
            font-size: 34px;
            color: #333;
        }
        .panel {
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #424242;
        }
        .panel-body {
            padding: 20px;
        }
        .stat-panel {
            margin-top: 10px;
        }
        .stat-panel-number {
            font-size: 36px;
            font-weight: bold;
            color: #fff;
        }
        .stat-panel-title {
            font-size: 18px;
            font-weight: bold;
            color: #fff;
        }
        .panel-footer {
            border-top: none;
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            text-decoration: none;
        }
        .panel-footer:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/leftbar.php'); ?>
        <div class="content-wrapper container-fluid">
            <h2 class="page-title">Dashboard</h2>
            <div class="row">
                <?php 
	                 include('includes/config.php');

                $stats = [
                    ['query' => "SELECT id FROM tblbloodgroup", 'color' => 'primary', 'title' => 'Listed Blood Groups', 'link' => 'manage-bloodgroup.php'],
                    ['query' => "SELECT id FROM tblblooddonars", 'color' => 'success', 'title' => 'Registered Blood Group', 'link' => 'donor-list.php'],
                    ['query' => "SELECT ID FROM tblbloodrequirer", 'color' => 'danger', 'title' => 'Total Blood Request Received', 'link' => 'requests-received.php']
                ];

                foreach ($stats as $stat) {
                    $stmt = $conn->prepare($stat['query']);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $count = $result->num_rows;
                ?>
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-body bk-<?php echo $stat['color']; ?> text-light">
                            <div class="stat-panel text-center">
                                <div class="stat-panel-number"><?php echo htmlentities($count); ?></div>
                                <div class="stat-panel-title"><?php echo $stat['title']; ?></div>
                            </div>
                        </div>
                        <a href="<?php echo $stat['link']; ?>" class="panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>


