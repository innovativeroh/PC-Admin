<head>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

$data = array(1, 0, 1, 0, 1, 0, 1 , 1);
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
  <div class="col-lg-4 grid-margin stretch-card">
    <div class="card mb-4">
      <div class="card-body text-center">
        <!-- live Selfie upload -->
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="Live Selfie" class="rounded-circle img-fluid" style="width: 150px;">
        <h5 class="my-3">
          <?php echo $user_name; ?>
        </h5>
        <!-- role of the employee -->
        <p class="text-muted mb-1"><?php echo $designation ?></p>
        <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
        <div class="d-flex justify-content-center mb-2">
          <!-- view Salary slip -->
          <button type="button" class="btn btn-primary">Follow</button>
          <button type="button" class="btn btn-outline-primary ms-1">Message</button>
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
            <p class="text-muted mb-0"><?php echo $user_name ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Email</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0"><?php echo $email ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Mobile</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0"><?php echo $mob ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Gender</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0"><?php echo $gender ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Address</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
          </div>
        </div>
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
            <p class="text-muted mb-0"><?php echo $Company_name ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Designation</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0"><?php echo $designation ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Job Tenure</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0"><?php echo @$job_tenure ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Employee ID</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0"><?php echo $employee_id ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Pincode</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0"><?php echo $pincode ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">City</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0"><?php echo $city ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">ID Card Pic Live</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0"><?php echo "dmemo" ?></p>
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
            <p class="text-muted mb-0"><?php echo $aadhaar_number ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            <p class="mb-0">PanCard Number</p>
          </div>
          <div class="col-sm-6">
            <p class="text-muted mb-0"><?php echo $panCard_number ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            <p class="mb-0">Electricity Bill</p>
          </div>
          <div class="col-sm-6">
            <p class="text-muted mb-0"><?php echo $electricity_bill ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            <p class="mb-0">Driving License </p>
          </div>
          <div class="col-sm-6">
            <p class="text-muted mb-0"><?php echo $driving_license ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            <p class="mb-0">Bank Account Number</p>
          </div>
          <div class="col-sm-6">
            <p class="text-muted mb-0"><?php echo $bankAccount_number ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            <p class="mb-0">IFSC Code </p>
          </div>
          <div class="col-sm-6">
            <p class="text-muted mb-0"><?php echo $ifsc_code ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            <p class="mb-0">Salary Slip Current Month Path</p>
          </div>
          <div class="col-sm-6">
            <p class="text-muted mb-0"><?php echo $salary_slip_current_month_path ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card mb-4">
      <div class="card-body">
        <h3 class="mb-3">Profile Completion</h3>
        <div class="row">
          <div class="col-sm-6">
            <button id="button" class="btn btn-primary">Refresh</button>
          </div>
          <div class="col-sm-12">
            <div class="progress" style="height: 2em;">
              <div class="progress-bar progress-bar-animated progress-bar-striped" id="changer" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $percentage . "%" ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Striped Table</h4>
                  <p class="card-description">
                    Add class <code>.table-striped</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            User
                          </th>
                          <th>
                            First name
                          </th>
                          <th>
                            Progress
                          </th>
                          <th>
                            Amount
                          </th>
                          <th>
                            Deadline
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-1">
                            <img src="../../assets/images/faces/face1.jpg" alt="image" />
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../assets/images/faces/face2.jpg" alt="image" />
                          </td>
                          <td>
                            Messsy Adam
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $245.30
                          </td>
                          <td>
                            July 1, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../assets/images/faces/face3.jpg" alt="image" />
                          </td>
                          <td>
                            John Richards
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 90%"
                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $138.00
                          </td>
                          <td>
                            Apr 12, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../assets/images/faces/face4.jpg" alt="image" />
                          </td>
                          <td>
                            Peter Meggik
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 50%"
                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../assets/images/faces/face5.jpg" alt="image" />
                          </td>
                          <td>
                            Edward
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 35%"
                                aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 160.25
                          </td>
                          <td>
                            May 03, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../assets/images/faces/face6.jpg" alt="image" />
                          </td>
                          <td>
                            John Doe
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 123.21
                          </td>
                          <td>
                            April 05, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../assets/images/faces/face7.jpg" alt="image" />
                          </td>
                          <td>
                            Henry Tom
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 20%"
                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 150.00
                          </td>
                          <td>
                            June 16, 2015
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div> -->
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
</script>
<?php include_once('./footer.php'); ?>