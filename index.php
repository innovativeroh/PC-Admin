<?php include_once('./connections.php') ; ?>
<?php include_once('./header.php'); ?>
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
        <th>isEmailVerified</th>
        <th>isMobileVerified</th>
        <th>UserSecret</th>
        <!-- Add more columns based on your database structure -->
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["id"] . "</td>";
          echo "<td>" . $row["fullName"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "<td>" . $row["gender"] . "</td>";
          echo "<td>" . $row["dob"] . "</td>";
          echo "<td>" . $row["isEmailVerified"] . "</td>";
          echo "<td>" . $row["isMobileVerified"] . "</td>";
          echo "<td>" . $row["userSecret"] . "</td>";
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