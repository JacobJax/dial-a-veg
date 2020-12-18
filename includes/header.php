<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dial a veg</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div class="nav-left">
            <div class="nav-logo">
                <h3><a href="../index.php">Dial a Veg</a></h3>
            </div>
            <div class="categories">
                <ul>
                    <li>
                        <a href="#" class="categories-head">Categories</a>
                        <ul class="dropdown" style="padding-top: 25px;">
                            <li><a href="customers/shop.php?category=Leafy greens">Leafy greens</a></li>
                            <li><a href="customers/shop.php?category=Cruferous">Cruferous</a></li>
                            <li><a href="customers/shop.php?category=Marrow">Marrow</a></li>
                            <li><a href="customers/shop.php?category=Root">Root</a></li>
                            <li><a href="customers/shop.php?category=Edible plants">Edible plants</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="nav-items">
            <ul>
                <div class="common-items">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="cart.php">Cart</a></li>
                </div>
                <div class="call-to-action">
                    <li><a href="sellers/register.php" class="seller-btn">Become a seller</a></li>
                    <?php session_start() ?>
                    <?php if(isset($_SESSION["c_id"])) { ?>
                        <?php echo "<li><a href='customers/account.php' class='login-btn'>Acount</a></li>" ?>
                        <?php echo "<li><a href='customers/logout.php' class='login-btn'>Log out</a></li>" ?>
                    <?php } else { ?>
                        <?php echo "<li><a href='customers/register.php' class='login-btn'>Sign up</a></li>" ?>
                        <?php echo "<li><a href='customers/login.php' class='login-btn'>Log in</a></li>" ?>
                    <?php } ?>
                </div>                
            </ul>
        </div>
    </nav>

