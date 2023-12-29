<?php include_once('./connections.php'); ?>
<?php
if (isset($_SESSION['username'])) {
  echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
  exit();
} else {
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Plenty Cred - Admin Panel</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="./assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="./assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="./assets/images/logo.svg" alt="logo">
              </div>
              <?php echo @$_SESSION['user']; ?>
              <?php
            $uid = @$_POST['email'];
            $pwd = @$_POST['password'];
            if (isset($_POST['sign_in'])) {
                //Error Handlers
                //Check if inputs are empty
                if (empty($uid) || empty($pwd)) {
                    echo "<div class='alert-danger'>Username & Password is Invalid!</div><br>";
                } else {
                    $sql = "SELECT * FROM `admin` WHERE email='$uid'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck < 1) {
                        echo "<div class='alert-danger'>Email is Incorrect!</div><br>";
                    } else {
                        
                        if ($row = mysqli_fetch_assoc($result)) {
                            $id_login = $row['id'];
                            $username_login = $row['email'];
                            $password_login = $row['password'];
                            //dehashing the password        
                            
                            if (!$password_login == $pwd) {
                                echo "<div class='alert-danger'>Wrong password credentials!</div><br>";
                            } 
                            else {
                                $_SESSION['id'] = $id_login;
                                $_SESSION['username'] = $username_login;
                                $_SESSION['password'] = $password_login;
                                echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
                                exit();
                            }
                        }
                    }
                }
            }
    ?>
              <h4>Hello! let's get started</h4>
              <h6 class="fw-light">Sign in to continue.</h6>
              <form action="login.php" method="POST" class="pt-3">
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1"
                    placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1"
                    placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" name="sign_in" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="./assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="./assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="./assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="./assets/js/off-canvas.js"></script>
  <script src="./assets/js/hoverable-collapse.js"></script>
  <script src="./assets/js/template.js"></script>
  <script src="./assets/js/settings.js"></script>
  <script src="./assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>