<?php
    require_once"../configure/dbo_config.php";

    $session_id = $_POST['sessionId'];
    $service_code = $_POST['serviceCode'];
    $phonenumber = $_POST['phoneNumber'];
    $text = $_POST['text'];

    $f_name = $l_name = $email = $phone = $county = $city = $dob =  $pwd = '';
    global $s_email;

    if($text == "") {
        $response = "CON Choose an option. \n";
        $response .= "1. Register to become a cutomer \n";
        $response .= "2. My Account \n";
        
    } else if($text == "1") {
        $response = "CON Enter first name\n";
        $f_name = $text;

    } else if($text == "1*$f_name") {
        $response = "CON Enter last name\n";
        $l_name = $text;

    } else if($text == "1*$f_name*$l_name"){
        $response = "CON Enter your email\n";
        $email = $text;

    } else if($text == "1*$f_name*$l_name*$email"){
        $response = "CON Enter your mobile number\n";
        $phone = $text;

    } else if($text == "1*$f_name*$l_name*$email*$phone") {
        $response = "CON Enter your County\n";
        $county = $text;
        
    } else if($text == "1*$f_name*$l_name*$email*$phone*$county") {
        $response = "CON Enter your Town\n";
        $city = $text;

    } else if($text == "1*$f_name*$l_name*$email*$phone*$county*$city") {
        $response = "CON Enter your date of birth ('year'-'month'-'date')\n";
        $dob = $text;

    } else if($text == "1*$f_name*$l_name*$email*$phone*$county*$city*$dob") {
        $response = "CON Choose a password\n";
        $pwd = $text;

        $prof = ".." . "/profile-pics/" . "default-profile.png";
        $hash_password = password_hash($pwd, PASSWORD_DEFAULT);

        $sql = "INSERT INTO sellers (first_name, last_name, email, phone, county, city,  date_of_birth, profile_pic, password) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$f_name, $l_name, $email, $phone, $county, $city, $dob, $hash_password]);

    } else if($text == "1*$f_name*$l_name*$email*$phone*$county*$city*$dob*$pwd"){
        $response = "END You have succesfully registered";

    } else if($text == "2") {
        $response = "CON Choose an option. \n";
        $response .= "1. Get number of items \n";
        $response .= "2. Get number of sales \n";

    } else if($text == "2*1") {
        $response = "CON Enter your email \n";
        $s_email = $text;
        
    } else if($text == "2*1*$s_email") {
        $sql = "SELECT seller_id FROM sellers WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$s_email]);
        $s_id = $stmt->fetch();

        $sql = "SELECT * FROM items WHERE seller_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$s_id]);
        $num_of_items = $stmt->rowcount();

        $response = "END You have " . $num_of_items . " items";

    } else if($text == "2*2") {
        $response = "END You have 0 sales";

    }

    header('Content-type: text/plain');
    echo $response;

    
?>