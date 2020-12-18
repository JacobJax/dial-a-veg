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
                <!-- <?php session_start(); ?> -->
                <?php if(isset($_SESSION['seller_id'])) {?>
                    <?php echo "<h5><a href='dashboard.php'>Dial a Veg</a> Trader</h5>"; ?>
                <?php } else {?>
                    <?php echo "<h5><a href='#'>Dial a Veg</a> Trader</h5>"; ?>
                <?php } ?>
                
            </div>
        </div>
        <div class="nav-items">
            <ul>
                <div class="common-items">
                    <?php if(isset($_SESSION['seller_id'])) { ?>
                        <?php echo " <li><a href='./items/items.php'>Products</a></li>" ?>
                        <?php echo " <li><a href='./items/sales.php'>Sales</a></li>" ?>
                    <?php }?>
                </div>
                <div class="call-to-action">
                    <?php if(isset($_SESSION["seller_id"])) { ?>
                        <?php echo "<li><a href='account.php' class='login-btn'>Account</a></li>";?>
                        <?php echo "<li><a href='logout.php' class='sign-btn'>Sign out</a></li>"; ?>
                    <?php } else { ?>
                        <?php echo "<li><a href='login.php' class='login-btn'>Log in</a></li>"; ?>
                        <?php echo "<li><a href='register.php' class='sign-btn'>Sign up</a></li>"; ?>
                    <?php } ?>                   
                </div>                
            </ul>
        </div>
    </nav>

