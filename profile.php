<head>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php include_once('./connections.php'); ?>
<?php include_once('./header.php'); ?>
<?php
if (isset($_SESSION['username'])) {
} else {
  echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
  exit();
}

$user_id = @$_GET['id'];
$sql = "SELECT *,DATE_FORMAT(dob,'%Y-%m-%d') AS dob FROM `user` WHERE `id`='$user_id'";
$query = mysqli_query($conn, $sql);
while ($rows = mysqli_fetch_array($query)) {
  $userID = $rows['id'];
  $user_name = $rows['fullName'];
  $email = $rows['email'];
  $gender = $rows['gender'];
  $dob = $rows['dob'];
  $mob = $rows['mobileNumber'];
}

//sql for employement details
$sql = "SELECT * FROM `employmentdetails` WHERE `id`='$user_id'";
$query = mysqli_query($conn, $sql);
while ($rows = mysqli_fetch_array($query)) {
  $Company_name = $rows['companyName'];
  $designation = $rows['designation'];
  $employee_id = $rows['employeeId'];
  $job_tenure = $rows['jobTenure'];
  $pincode = $rows['pincode'];
  $city = $rows['city'];
}
//sql for kyc details
$sql = "SELECT * FROM `kycdetails` WHERE `id`='$user_id'";
$query = mysqli_query($conn, $sql);
$nodata = "Not Entered";
while ($rows = mysqli_fetch_array($query)) {
  $aadhaar_number = $rows['aadharNo'];
  if ($aadhaar_number == "") {
    $aadhaar_number = $nodata;
  }

  $panCard_number = $rows['panCardNo'];
  if ($panCard_number == "") {
    $panCard_number = $nodata;
  }

  $electricity_bill = $rows['electricityBill'];
  if ($electricity_bill == "") {
    $electricity_bill = $nodata;
  }

  $driving_license = $rows['drivingLicense'];
  if ($driving_license == "") {
    $driving_license = $nodata;
  }

  $bankAccount_number = $rows['bankAccountNo'];
  if ($bankAccount_number == "") {
    $bankAccount_number = $nodata;
  }

  $ifsc_code = $rows['ifscCode'];
  if ($ifsc_code == "") {
    $ifsc_code = $nodata;
  }

  $salary_slip_current_month_path = $rows['salarySlipCurrentMonthPath'];
}

$data = array(1, 0, 1, 0, 1, 0, 1, 1);
$progress_value = 0;

$number_of_data = count($data);
// echo $number_of_data;
$counter = 0;

while ($counter < $number_of_data) {
  if ($data[$counter] == 1) {
    $progress_value++;
  }
  $counter++;
}

$percentage = round(($progress_value / $number_of_data) * 100);

// echo $percentage;


?>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card mb-4">
      <div class="card-body">
        <h3 class="mb-3">Profile Completion</h3>
        <div class="row">
          <div class="col-sm-12">
            <div class="progress" style="height: 2em;">
              <div class="progress-bar progress-bar-animated progress-bar-striped" id="changer" role="progressbar"
                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                <?php echo $percentage . "%" ?>
              </div>
              <div class="col-sm-6" style="visibility: hidden;">
                <button id="button">Refresh</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 grid-margin stretch-card">
    <div class="card mb-4">
      <div class="card-body text-center">
        <!-- live Selfie upload -->
        <img src="./default_pp.jpg" alt="Live Selfie" class="rounded-circle img-fluid" style="width: 150px;">
        <h5 class="my-3">
          <?php echo $user_name; ?>
        </h5>
        <!-- role of the employee -->
        <p class="text-muted mb-1">
          <?php echo $designation ?>
        </p>
        <hr>
        </hr>
        <div class="d-flex justify-content-center mb-2">
          <!-- view Salary slip -->
          <?php

          ?>
          <?php
          if (isset($_POST['acceptProfile'])) {
            $sql = "INSERT INTO `user_status`(`id`, `userId`, `profile_approved`, `credit_limit_set`) VALUES (null,'$userID','1','1')";
            $query = mysqli_query($conn, $sql);
            echo "<meta http-equiv=\"refresh\" content=\"0; url=profile.php?id=$userID\">";
            exit();
          }
          if (isset($_POST['rejectProfile'])) {
            $sql = "INSERT INTO `user_status`(`id`, `userId`, `profile_approved`, `credit_limit_set`) VALUES (null,'$userID','0','1')";
            $query = mysqli_query($conn, $sql);
            echo "<meta http-equiv=\"refresh\" content=\"0; url=profile.php?id=$userID\">";
            exit();
          }
          ?>
              <?php
              $sql = "SELECT * FROM `user_status` WHERE `userId`='$userID'";
              $query = mysqli_query($conn, $sql);
              $count = mysqli_num_rows($query);
              if (!$count > 0) {
                ?>
                <form action="profile.php?id=<?= $userID ?>" method="POST">
                  <button type="submit" name="acceptProfile" class="btn btn-primary">Accept</button>
                  <button type="submit" name="rejectProfile" class="btn btn-outline-primary ms-1">Reject</button>
                </form>
              <?php
              } else {
?>

<?php
                $sql = "SELECT * FROM `user_status` WHERE `userId`='$userID' AND `profile_approved`='1'";
                $query = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($query);
                if (!$count > "0") {
                  echo "<p style='font-size: 18px; font-weight: 600; color: #f44336;'>Declined ❌</p>";
                } else if (!$count < "1") {
                  echo "<p style='font-size: 18px; font-weight: 600; color: #5ed529;'>Approved ✅</p>";
                        }
?>
                        <?php
              }
              ?>

      </div>
      </div>
    </div>
  </div>
  <!-- Basic Details -->
  <div class="col-lg-8 grid-margin stretch-card">
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <h3 class="mb-3">Basic Details</h3>
          <div class="col-sm-3">
            <p class="mb-0">Full Name</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">
              <?php echo $user_name ?>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Email</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">
              <?php echo $email ?>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Mobile</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">
              <?php echo $mob ?>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Gender</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">
              <?php echo $gender ?>
            </p>
          </div>
        </div>
        <hr>
      </div>
    </div>
  </div>
</div>
<!-- Employee Details -->
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <h3 class="mb-3">Employee Details</h3>
          <div class="col-sm-3">
            <p class="mb-0">Company Name</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">
              <?php echo @$Company_name ?>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Designation</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">
              <?php echo @$designation ?>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Job Tenure</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">
              <?php echo @$job_tenure ?>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Employee ID</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">
              <?php echo @$employee_id ?>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Pincode</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">
              <?php echo @$pincode ?>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">City</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">
              <?php echo @$city ?>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">ID Card Pic Live</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">
              <?php echo "dmemo" ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- kyc Details -->
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <h3 class="mb-3">KYC Details</h3>
          <div class="col-sm-6">
            <p class="mb-0">Aadhaar Card Number </p>
          </div>
          <div class="col-sm-6">
            <p class="text-muted mb-0">
              <?php echo @$aadhaar_number ?>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            <p class="mb-0">PanCard Number</p>
          </div>
          <div class="col-sm-6">
            <p class="text-muted mb-0">
              <?php echo @$panCard_number ?>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            <p class="mb-0">Electricity Bill</p>
          </div>
          <div class="col-sm-6">
            <p class="text-muted mb-0">
              <?php echo @$electricity_bill ?>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            <p class="mb-0">Driving License </p>
          </div>
          <div class="col-sm-6">
            <p class="text-muted mb-0">
              <?php echo @$driving_license ?>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            <p class="mb-0">Bank Account Number</p>
          </div>
          <div class="col-sm-6">
            <p class="text-muted mb-0">
              <?php echo @$bankAccount_number ?>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            <p class="mb-0">IFSC Code </p>
          </div>
          <div class="col-sm-6">
            <p class="text-muted mb-0">
              <?php echo @$ifsc_code ?>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            <p class="mb-0">Salary Slip Current Month Path</p>
          </div>
          <div class="col-sm-6">
            <p class="text-muted mb-0">
              <?php echo @$salary_slip_current_month_path ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  var percentage = '<?php echo $percentage; ?>';
  const button = document.getElementById('button');
  // console.log(percentage);
  button.addEventListener('click', () => {
    const element = document.getElementById('changer');
    element.style.width = String(percentage).concat('%');
    // console.log(percentage);
    // console.log("Working");
  });
  window.onload = function () {
    const element = document.getElementById('changer');
    element.style.width = String(percentage).concat('%');
  };
</script>
<?php include_once('./footer.php'); ?>