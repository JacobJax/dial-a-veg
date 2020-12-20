<?php 

    require_once"../configure/dbo_config.php";

    $f_name = $l_name = $email = $phone = $pwd = $rpt_pwd = '';
    $errors = [
        'f_name'=>'',
        'l_name'=>'',
        'email'=>'',
        'phone'=>'',
        'pwd'=>'',
        'rpt_pwd'=>''
    ];

    if(isset($_POST['submit'])){

        #firstname validation
        if(empty($_POST['f_name'])){
            $errors['f_name'] = 'A name is required';
            
        } else {
            $f_name = $_POST['f_name'];
            if(!preg_match("/^[a-z ,.'-]+$/i", $f_name)){
                $errors['f_name'] = 'A name must be letters and spaces only';
            }
        }

        #lastname validation
        if(empty($_POST['l_name'])){
            $errors['l_name'] = 'A name is required';
            
        } else {
            $l_name = $_POST['l_name'];
            if(!preg_match("/^[a-z ,.'-]+$/i", $l_name)){
                $errors['l_name'] = 'A name must be letters and spaces only';
            }
        }

        #email validation
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required';
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be a valid email address';
            }else{
                $email = $_POST['email'];
                $t_sql = "SELECT * FROM admins WHERE email = ? ";

                $stmt = $pdo->prepare($t_sql);
                $stmt->execute([$email]);
                $det_email = $stmt->fetch();
                if($det_email){
                    $errors['email'] = 'That email is already taken';
                }
            }
        }
        #phone validation
        if(empty($_POST['phone'])){
            $errors['phone'] = 'A phone number is required';
            
        } else {
            $phone = $_POST['phone'];
            if(!preg_match("/(^07|01)[0-9]{8}$/mi", $phone)){
                $errors['phone'] = 'That phone number is not valid';
            }
        }

        #password validation
        if(empty($_POST['pwd'])){
            $errors['pwd'] = 'A password is required';
        }else{
            $pwd = $_POST['pwd'];
            if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/', $pwd)){
                $errors['pwd'] = 'Password must contain 8 or characters, capital letters and special characters';
            }
        }

        #confirm password validation
        if(empty($_POST['rpt_pwd'])){
            $errors['rpt_pwd'] = 'A password is required';
        }else{
            $rpt_pwd = $_POST['rpt_pwd'];
            if($rpt_pwd != $pwd){
                $errors['rpt_pwd'] = 'The passwords do not match';
            }
        }

        // add to database
        if(!array_filter($errors)) {
            $hash_password = password_hash($pwd, PASSWORD_DEFAULT);

            $sql = "INSERT INTO admins (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$f_name, $l_name, $email, $phone, $hash_password]);

            $f_name = $l_name = $email = $phone = $pwd = $rpt_pwd = '';
        }  
    }


?>
<?php include"admin-header.php"; ?>
<div class="container center">
    <form method="POST">
    <h1 class="h3 mb-3 font-weight-normal text-center">Register</h1>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4">First name</label>
            <input type="text" class="form-control" name="f_name" value="<?php echo htmlspecialchars($f_name) ?>">
            <div class="red-text"><?php echo $errors['f_name']; ?></div>
            </div>
            <div class="form-group col-md-6">
            <label for="inputPassword4">Last name</label>
            <input type="text" class="form-control" name="l_name" value="<?php echo htmlspecialchars($l_name) ?>">
            <div class="red-text"><?php echo $errors['l_name']; ?></div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="red-text"><?php echo $errors['email']; ?></div>
            </div>
            <div class="form-group col-md-4">
            <label for="inputPassword4">Phone</label>
            <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($phone) ?>">
            <div class="red-text"><?php echo $errors['phone']; ?></div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Password</label>
            <input type="password" class="form-control" name="pwd" value="<?php echo htmlspecialchars($pwd) ?>">
            <div class="red-text"><?php echo $errors['pwd']; ?></div>
            </div>
            <div class="form-group col-md-6">
            <label for="inputPassword4">Repeat password</label>
            <input type="password" class="form-control" name="rpt_pwd" value="<?php echo htmlspecialchars($rpt_pwd) ?>">
            <div class="red-text"><?php echo $errors['rpt_pwd']; ?></div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-lg btn-primary btn-block" name="submit">Register</button><br>
        <div class="form-group">
            <h6>Already have an account? <a href="login.php">Log in</a></h6>
        </div>
    </form>
</div>
