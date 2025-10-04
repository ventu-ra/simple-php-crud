<?php
//Include config file

require_once "../config/config.php";

//Define variables and initialize with empty values

$name = $address = $marks = "";
$name_err = $address_err = $marks_err = "";


//Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
  // Get hidden input value
  $id = $_POST["id"];

  // Validate name
  $input_name = trim($_POST["name"]);
  if (empty($input_name)) {
    $name_err = "Please enter a name.";
  } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {

    $name_err = "Please enter a valid name.";

  } else {

    $name = $input_name;

  }
  // Validate address address

  $input_address = trim($_POST["address"]);

  if (empty($input_address)) {

    $address_err = "Please enter an address.";

  } else {
    $address = $input_address;
  }

  // Validate marks
  $input_marks = trim($_POST["marks"]);

  if (empty($input_marks)) {
    $marks_err = "Please enter the marks.";
  } elseif (!ctype_digit($input_marks)) {
    $marks_err = "Please enter a positive integer value.";
  } else {
    $marks = $input_marks;
  }

  // Check input errors before inserting in database
  if (empty($name_err) && empty($address_err) && empty($marks_err)) {
    // Prepare un update statement

    $sql = "update student set name=?, address=?, marks=? where id=?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_address, $param_marks, $param_id);

      // Set parameters
      $param_name = $name;
      $param_address = $address;
      $param_marks = $marks;
      $param_id = $id;

      if (mysqli_stmt_execute($stmt)) {
        header(("location: index.php"));
        exit();
      } else {
        echo "Something went wrong. Please try again later.";
      }
    }
    // Close statement

    mysqli_stmt_close($stmt);
  }
  // Close connection

  mysqli_close($conn);

} else {
  // Check existence of id parameter before processing further
  $my_option = $_GET["id"];
  if (!empty($my_option)) {

    $id = trim($_GET["id"]);

    $sql = "select * from student where id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
      mysqli_stmt_bind_param($stmt, "i", $param_id);

      $param_id = $id;

      if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

          $name = $row["name"];
          $address = $row["address"];
          $marks = $row["marks"];
        } else {
          header("location:error.php");
          exit();
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }
    // Close statement

    mysqli_stmt_close($stmt);


    // Close connection

    mysqli_close($conn);

  } else {
    header("location: error.php");
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
  <title>Update Student</title>
  <style>
    .wrapper {
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
            <h2>Update Student</h2>
          </div>
          <p>Please edit the input values and submit to update the student.</p>
          <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : '' ?> ">
              <label for="">Name</label>
              <input type="text" name="name" value="<?php echo $name; ?>" class="form-control">
              <span class="help-block"><?php echo $name_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
              <label for="">Address</label>
              <textarea name="address" class="form-control"><?php echo $address; ?></textarea>

              <span class="help-block"><?php echo $address_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($marks_err)) ? 'has-error' : ''; ?>">
              <label for="">Marks</label>
              <input type="text" name="marks" value="<?php echo $marks; ?>" class="form-control">
              <span class="help-block"><?php echo $marks_err; ?></span>
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <input type="submit" class="btn btn-primary" value="Submit">
            <a href="index.php" class="btn btn-default">Cancel</a>

          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
