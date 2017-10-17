<?php
  // Message Vars
  $msg = '';
  $msgClass = '';



  //check for submit
  if (filter_has_var(INPUT_POST, 'submit')){
    // Get Form Data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $message = $_POST['message'];

    //Check Required Fields
    if(!empty($email) && !empty($name) && !empty($message)){
      //Passed
      //Check Email
      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        // Failed
        $msg = 'Please use a valid email';
        $msgClass = 'alert-danger';
      } else {
        // Passed
        echo 'Passed';
      }
    } else {
      //Failed
      $msg = 'Please fill in all fields';
      $msgClass = 'alert-danger';
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">My Website</a>
          </div>
      </div>
  </nav>
  <div class="container">
      <?php if($msg != ''): ?>
        <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
      <?php endif; ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="">
      </div>
      <div class="form-group">
        <label>Message</label>
        <textarea name="message" class="form-control" value=""></textarea>
      </div>
      <br>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>
</html>
