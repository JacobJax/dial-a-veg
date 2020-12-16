<?php
  require_once"../configure/dbo_config.php";
  $email = $password = '';
  $errors = ['email'=>'', 'password'=>'', 'account'=>''];

  if(isset($_POST['submit'])) {
    if(empty($_POST['email']) OR empty($_POST['password'])){
      $errors['email'] = 'Please enter Email or Username';
      $errors['password'] = 'Please enter Password';            
    } else {
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      $sql = "SELECT * FROM sellers WHERE email = ?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$email]);
      $details = $stmt->fetchObject();
      // var_dump($details);
      if($details){
        $hash_pwd = $details->password;
        if(password_verify($password, $hash_pwd)){
          session_start();
          $_SESSION["id"] = $details->seller_id;
          $_SESSION["email"] = $details->email;
          $_SESSION["fullname"] = $details->first_name . ' ' . $details->last_name;

          header("Location: dashboard.php");
        } else {
          $errors['password'] = 'Wrong password try again';
        }
      }
    }
  }

?>

<?php include"sellers-header.php"; ?>
<div class="container center">
<form method="POST">
<h1 class="h3 mb-3 font-weight-normal text-center">Sign in</h1><hr>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address:</label>
    <input type="email" class="form-control" name="email">
    <div class="red-text"><?php echo $errors['email']; ?></div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password:</label>
    <input type="password" class="form-control" name="password">
    <div class="red-text"><?php echo $errors['password']; ?></div>
  </div>
  <button type="submit" class="btn btn-lg btn-primary btn-block" name="submit">Log in</button><br>
  <div class="form-group">
    <h6>Dont have an account? <a href="register.php">Register</a></h6>
  </div>
</form>
</div>