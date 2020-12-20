<?php
    require_once"../configure/dbo_config.php";
    session_start();

    global $id;

    if(!isset($_SESSION['admin_id'])) {
        header("Location: login.php");
    } else if(isset($_SESSION['admin_id'])){
        $id = $_SESSION['admin_id'];
    }

    $sql = "SELECT * FROM items";
    $stmt_items = $pdo->prepare($sql);
    $stmt_items->execute();

    $sql = "SELECT * FROM sellers";
    $stmt_sellers = $pdo->prepare($sql);
    $stmt_sellers->execute();

    $sql = "SELECT * FROM customers";
    $stmt_customers = $pdo->prepare($sql);
    $stmt_customers->execute();

    $number_of_items = $stmt_items->rowcount();
    $number_of_sellers = $stmt_sellers->rowcount();
    $number_of_customers = $stmt_customers->rowcount();

?>
<?php include"admin-header.php"; ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1>Dashboard</h1><br>
        <!-- <?php if(isset($_SESSION["admin_fullname"])) {?>
            <small><?php echo "<h3>Hey there ". $_SESSION["admin_fullname"]."</h3>"; ?></small>
        <?php } ?> -->
        <div class="row">
            <div class="col-sm">
                <div class="card" style="width: 20rem;">
                    <div class="card-header">
                        <h5 class="card-title">Items</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Total items</h6>
                        <h1 class="card-text"><?php echo htmlspecialchars($number_of_items) ?></h1>
                        <a href="items.php" class="card-link">Expand</a>
                        <a href="./items/add.php" class="card-link">Add item</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card" style="width: 20rem;">
                    <div class="card-header">
                        <h5 class="card-title">Traders</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Total traders</h6>
                        <h1 class="card-text"><?php echo htmlspecialchars($number_of_sellers) ?></h1>
                        <a href="sellers.php" class="card-link">Expand</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card" style="width: 20rem;">
                    <div class="card-header">
                        <h5 class="card-title">Customers</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Total customers</h6>
                        <h1 class="card-text"><?php echo htmlspecialchars($number_of_customers) ?></h1>
                        <a href="customers.php" class="card-link">Expand</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

