<?php

    require_once"../configure/dbo_config.php";

    session_start();
    global $id;


    if(!isset($_SESSION['admin_id'])) {
        header("Location: login.php");
    } else if(isset($_SESSION['admin_id'])){
        $id = $_SESSION['admin_id'];
    }

    $sql = "SELECT * FROM admins WHERE admin_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $seller = $stmt->fetch();

?>

<?php include"admin-header.php"; ?>
<section class="account">
    <div class="acc-card">
        <div class="acc-card-img">
            <!-- <?php echo"<img src='$seller->profile_pic'>" ?> -->
        </div>
        <div class="acc-card-content">
            <div class="name">
                <?php echo "<h2>" . ucwords($_SESSION['admin_fullname']) . "</h2>"?>
            </div>
            <!-- <div class="acc-details" style="display: flex; gap: 20px;">
                <?php echo "<h4>$no_of_items Items</h4>" ?>
                <h4>0 sales</h4>
            </div> -->
            <div class="acc-details" style="display: flex; gap: 20px;">
                <?php echo "<h4>City/Town: $seller->email</h4>" ?>
                <?php echo "<h4>Phone: $seller->phone</h4>" ?>
            </div><br><br>
            <a href="#" class="edit">Edit profile</a>
        </div>
    </div>
</section>