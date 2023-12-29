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
?>
<div class="col-lg-4">
  <div class="card mb-4">
    <div class="card-body text-center">
      <!-- live Selfie upload -->
      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="Live Selfie" class="rounded-circle img-fluid" style="width: 150px;">
      <h5 class="my-3">
        <?php echo $user_name; ?>
      </h5>
      <!-- role of the employee -->
      <p class="text-muted mb-1">Full Stack Developer</p>
      <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
      <div class="d-flex justify-content-center mb-2">
        <!-- view Salary slip -->
        <button type="button" class="btn btn-primary">Follow</button>
        <button type="button" class="btn btn-outline-primary ms-1">Message</button>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-8">
  <div class="card mb-4">
    <div class="card-body">
      <div class="row">
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


<div class="row">

  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Profile</h4>
        <p class="card-description">
          All The Profile Details<code> Mentioned In This Section</code>
        </p>
        <div class="table-responsive">
          <br>
          <?php echo $email; ?>
          <br>
          <?php echo $dob; ?>
          <br>
          <?php echo $gender; ?>
          <br>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Hoverable Table</h4>
        <p class="card-description">
          Add class <code>.table-hover</code>
        </p>
        <div class="table-responsive">

          <?php echo "f   "; ?>
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
</div>
</div>
<?php include_once('./footer.php'); ?>