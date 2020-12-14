<?php

    require_once"../configure/dbo_config.php";

    $f_name = $l_name = $email = $phone = $county = $city = $dob =  $pwd = $rpt_pwd = '';
    $errors = [
        'f_name'=>'',
        'l_name'=>'',
        'email'=>'',
        'phone'=>'',
        'county'=>'',
        'city'=>'',
        'dob'=>'',
        'pwd'=>'',
        'rpt_pwd'=>''
    ];

    if(isset($_POST['submit'])){

        #firstname validation
        if(empty($_POST['f_name'])){
            $errors['f_name'] = 'A name is required';
            
        } else {
            $fullname = $_POST['f_name'];
            if(!preg_match("/^[a-z ,.'-]+$/i", $f_name)){
                $errors['f_name'] = 'A name must be letters and spaces only';
            }
        }

        #lastname validation
        if(empty($_POST['l_name'])){
            $errors['l_name'] = 'A name is required';
            
        } else {
            $fullname = $_POST['l_name'];
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
                $t_sql = "SELECT * FROM users WHERE email= ? ";
    
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                if($stmt->fetch()){
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

        #county validation
        if(empty($_POST['county'])){
            $errors['county'] = 'A county is required';
            
        } else {
            $county = $_POST['county'];
            if(!preg_match("/^[a-z ,.'-]+$/i", $county)){
                $errors['county'] = 'A city must be letters and spaces only';
            }
        }

        #city validation
        if(empty($_POST['city'])){
            $errors['city'] = 'A city is required';
            
        } else {
            $city = $_POST['city'];
            if(!preg_match("/^[a-z ,.'-]+$/i", $city)){
                $errors['city'] = 'A city must be letters and spaces only';
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
    }

?>