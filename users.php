<?php include_once('./header.php'); ?>
<div class="row">

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Users</h4>
        <p class="card-description">
          All registered<code>Users will be shown here.</code>
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
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td>
                  $ 77.99
                </td>
                <td>
                  May 15, 2015
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once('./footer.php'); ?>