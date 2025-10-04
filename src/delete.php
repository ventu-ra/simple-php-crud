<?php

require_once "../config/config.php";

if (isset($_POST["id"]) && !empty($_POST["id"])) {
  $sql = "delete from student where id = ?";
  if ($stmt = mysqli_prepare($conn, $sql)) {

    mysqli_stmt_bind_param($stmt, "i", $param_id);

    $param_id = trim($_POST["id"]);

    if (mysqli_stmt_execute($stmt)) {
      header("location: index.php");
      exit();
    } else {
      echo "Oops! Something went wrong. Please try again later.";
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  $my_option = $_GET["id"];
  if (empty($my_option)) {
    header("location:error.php");
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <title>View Student</title>
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
            <h1>Delete Student</h1>
          </div>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="alert alert-danger fade in">
              <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>" />
              <p>Are you sure you want to delete this Student?</p><br>

              <p><input type="submit" value="Yes" class="btn btn-danger">
                <a href="index.php" class="btn btn-default">No</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
