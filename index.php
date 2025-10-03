<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
  <script type="text/javascript">

    $(document).ready(function () {

      $('[data-toggle="tooltip"]').tooltip();

    });

  </script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="page-header clearfix">
            <h2 class="pull-left">Students Details</h2>
            <a href="create.php" class="btn btn-primary pull-right">Add New Student</a>
          </div>
          <?php

          // Include config
          
          require_once "config.php";

          // Attempt select query execution
          $sql = "select * from student";
          if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
              echo "<table class='table table-bordered table-striped table-hover'>";
              echo "<thead>";
              echo "<tr>";
              echo "<th>#</th>";
              echo "<th>Name</th>";
              echo "<th>Address</th>";
              echo "<th>Marks</th>";
              echo "<th>Action</th>";
              echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
              while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['marks'] . "</td>";
                echo "<td>";
                echo "<a href='read.php?id=" . $row['id'] . "' title='View Record' data-toggle='tooltip'><span class ='glyphicon glyphicon-eye-open'></span></a>";

                echo "<a href='update.php?id=" . $row['id'] . "' title='Update Record' data-toggle='tooltip'><span class ='glyphicon glyphicon-pencil'></span></a>";

                echo "<a href='delete.php?id=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><span class ='glyphicon glyphicon-trash'></span></a>";
                echo "</td>";
                echo "</tr>";
              }
              echo "</tbody>";
              echo "</table>";

              // Free result set
              mysqli_free_result($result);
            } else {
              echo "<p class='lead'><em>No students were found.</em></p>";
            }
          } else {
            echo "Error: Could not able to execute $sql. " . mysqli_error($conn);
          }
          // Close connection
          mysqli_close($conn);
          ?>
          <form method="post" action="search1.php?go" id="searchform">
            <input type="text" name="name">
            <input type="submit" name="submit" value="Search">
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
