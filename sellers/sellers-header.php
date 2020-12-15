<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dial a veg</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav>
        <div class="nav-left">
            <div class="nav-logo">
                <h5><a href="dashboard.php">Dial a Veg</a> Trader</h5>
            </div>
        </div>
        <div class="nav-items">
            <ul>
                <div class="common-items">
                    <li><a href="./items/items.php">Products</a></li>
                    <li><a href="./items/sales.php">Sales</a></li>
                </div>
                <div class="call-to-action">
                <?php
                    session_start();
                    if(isset($_SESSION["email"])){
                        echo "<li><a href='account.php' class='login-btn'>Account</a></li>";
                        echo "<li><a href='logout.php' class='sign-btn'>Sign out</a></li>";
                    } else {
                        echo "<li><a href='login.php' class='login-btn'>Log in</a></li>";
                        echo "<li><a href='register.php' class='sign-btn'>Sign up</a></li>";
                    }
                ?>
                    
                </div>                
            </ul>
        </div>
    </nav>

