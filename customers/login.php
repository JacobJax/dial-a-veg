<?php include"../includes/header.php"; ?>
<div class="container center">
<form>
<h1 class="h3 mb-3 font-weight-normal text-center">Sign in</h1><hr>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address:</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password:</label>
    <input type="password" class="form-control" name="password">
  </div>
  <button type="submit" class="btn btn-lg btn-primary btn-block">Log in</button><br>
  <div class="form-group">
    <h6>Dont have an account? <a href="register.php">Register</a></h6>
  </div>
</form>
</div>