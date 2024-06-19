<?php
session_start();
include('includes/config.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT UserName, Password FROM tbladmin WHERE UserName=? and Password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $results = $stmt->get_result();

    if ($results->num_rows > 0) {
        $_SESSION['alogin'] = $_POST['username'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
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
    <title>BloodBank & Donor Management System | Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .vh-100 {
            min-height: 100vh;
        }
        .login-image {
            border-radius: 1rem 0 0 1rem;
        }
    </style>
</head>
<body>

<section class="vh-100" style="background-color: #9A616D;">
    <div class="container py-5 h-100" >
        <div class="row d-flex justify-content-center align-items-center h-100" >
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem; background-color: #424242; ">
                    <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="img/bgm1.jpg"
                                alt="login form" class="img-fluid w-100" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-white">
                                <form method="post">
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Healthy Heart Blood Bank</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="username" name="username" class="form-control form-control-lg" required />
                                        <label class="form-label" for="username">Username</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" name="login" type="submit">Login</button>
                                    </div>

                                    <a class="small text-white" href="forgot-password.php">Forgot password?</a>
                                    
                                    <a href="#!" class="small text-white">Terms of use.</a>
                                    <a href="#!" class="small text-white">Privacy policy</a>
                                    <div class="small">
                                        <a href="../index.php">Back to Home</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
