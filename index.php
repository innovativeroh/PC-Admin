<?php include_once('./connections.php'); ?>
<?php include_once('./header.php'); ?>
<?php
if (isset($_SESSION['username'])) {
} else {
  echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
  exit();
}
?>
<div class="content">
  <h2>User List</h2>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Details</th>
        <!-- <th>isEmailVerified</th>
        <th>isMobileVerified</th>
        <th>UserSecret</th> -->
        <!-- Add more columns based on your database structure -->
      </tr>
      <style>
        #myButton {
          width: 80px;
          padding: 10px;
          font-weight: 600;
          color: #fff;
          background-color: #04befe;
          cursor: pointer;
          text-align: center;
          border: none;
          background-size: 300% 100%;
          border-radius: 50px;
          -o-transition: all .4s ease-in-out;
          -webkit-transition: all .4s ease-in-out;
          transition: all .4s ease-in-out;
        }

        #myButton:hover {
          background-position: 100% 0;
          -o-transition: all .4s ease-in-out;
          -webkit-transition: all .4s ease-in-out;
          transition: all .4s ease-in-out;
          background-image: linear-gradient(to right, #25aae1, #4481eb, #04befe, #3f86ed);
          box-shadow: 0 4px 15px 0 rgba(65, 132, 234, 0.75);
        }

        #myButton:focus {
          outline: none;
        }
      </style>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT *,DATE_FORMAT(dob,'%Y-%m-%d') AS dob FROM `user`";
      $query = mysqli_query($conn, $sql);
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["id"] . "</td>";
          echo "<td>" . $row["fullName"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "<td>" . $row["gender"] . "</td>";
          echo "<td>" . $row["dob"] . "</td>";
          echo "<td>" . "<button id='myButton'> View </button>" . "</td>";

          // echo "<td>" . $row["isEmailVerified"] . "</td>";
          // echo "<td>" . $row["isMobileVerified"] . "</td>";
          // echo "<td>" . $row["userSecret"] . "</td>";
          // Add more columns based on your database structure
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='3'>No users found</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<?php include_once('./footer.php'); ?>