<?php
// Check existence of id parameter before processing further

$my_option = $_GET["id"];
if (!empty($my_option)) {
  // Include config file

  require_once "../config/config.php";
  require_once "model/student.php";

  //Prepare a select statement
  $sql = "select * from student where id = ?";

  if ($stmt = mysqli_prepare($conn, $sql)) {
    //Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "i", $param_id);

    // Set parameters
    $param_id = trim($_GET["id"]);

    //Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $student = new Student(name: $row["name"], address: $row["marks"], marks: "");


      } else {
        header("location:error.php");
        exit();
      }
    } else {
      echo "Oops! Something went wrong. Please try again later.";
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("location: error.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Student</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <style type="text/css">
    .wrapper {
      width: 500px;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <div class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="page-header">
            <h1>View Student</h1>
          </div>
          <div class="form-group">
            <label>Name</label>
            <p class="form-control-static"><?php echo $student->name; ?></p>
          </div>
          <div class="form-group">
            <label>Address</label>
            <p class="form-control-static"><?php echo $student->address; ?></p>
          </div>
          <div class="form-group">
            <label>Marks</label>
            <p class="form-control-static"><?php echo $student->marks; ?></p>
          </div>
          <p><a href="index.php" class="btn btn-primary">Back</a></p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
