<?php

  class User{
    private $firstname;
    private $lastname;
    private $email;
    private $phone;
    private $county;
    private $city;
    private $dob;
    private $profilePic;
    private $password;

    public function __construct($firstname, $lastname, $email, $phone, $county, $city, $dob, $profilePic, $password) {
      
      $this->firstname = $firstname;
      $this->lastname = $lastname;
      $this->email = $email;
      $this->phone = $phone;
      $this->county = $county;
      $this->city = $city;
      $this->dob = $dob;
      $this->profilePic = $profilePic;
      $this->password = $password;

    }

    public function register($table) {
      require"../configure/dbo_config.php";

      $sql = "INSERT INTO $table (first_name, last_name, email, phone, county, city,  date_of_birth, profile_pic, password) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$this->firstname, $this->lastname, $this->email, $this->phone, $this->county, $this->city, $this->dob, $this->profilePic, $this->password]);

    }

    public function login($table, $email, $password, $page) {

      $sql = "SELECT id, email, password FROM $table WHERE email = ?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$email]);
      $details = $stmt->fetchAll();

      if($details){
        $hash_pwd = $details->password;
        if(password_verify($password, $hash_password)){
          session_start();
          $_SESSION["id"] = $detail->id;
          $_SESSION["email"] = $detail->email;

          header("Location: $page");
        } 
      }
      
    }

    
  }
?>