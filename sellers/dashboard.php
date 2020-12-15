<?php
    require_once"../configure/dbo_config.php";
    session_start();
    $id = $_SESSION['id'];

    $sql = "SELECT * FROM items WHERE seller_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    $number_of_items = $stmt->rowcount();

?>
<?php include"sellers-header.php"; ?>
<div class="jumbotron">
    
    <div class="container">
        <h3>Dashboard</h3><br>
        <?php
        
            if(isset($_SESSION["fullname"])){
                echo "<h3>Hey there ". $_SESSION["fullname"]."</h3>";
            }
        ?>
        <div class="row">
            <div class="col-sm">
                <div class="card" style="width: 25rem;">
                    <div class="card-header">
                        <h5 class="card-title">Items</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Total items</h6>
                        <h1 class="card-text"><?php echo htmlspecialchars($number_of_items) ?></h1>
                        <a href="./items/items.php" class="card-link">Expand</a>
                        <a href="./items/add.php" class="card-link">Add item</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card" style="width: 25rem;">
                    <div class="card-header">
                        <h5 class="card-title">Sales</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Total sales</h6>
                        <h1 class="card-text">0</h1>
                        <a href="./items/sales.php" class="card-link">Expand</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

