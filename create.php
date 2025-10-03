<?php
// Include config file

// Define variables and initialize with empty values
$name = $address = $marks = "";
$name_err = $address_err = $marks_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($input_name)) {
    $name_err = "Please enter a name.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Student</title>
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
            <h2>Create Student</h2>
          </div>

          <p>Please fill this form and submit to add student to the database.</p>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
              <label>Name</label>
              <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
              <span class="help-block"><?php echo $name_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
              <label for="">Address</label>
              <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
              <span class="help-block"><?php echo $address_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($marks_err)) ? 'has-error' : '' ?>">
              <label for="">Marks</label>
              <input type="text" name="marks" class="form-control" value="<?php echo $marks; ?>">
              <span class="help-block"><?php echo $marks_err; ?></span>
            </div>

            <input type="submit" class="btn btn-primary" value="Submit">
            <a href="index.php" class="btn btn-default">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
