<?php 
    require_once"../configure/dbo_config.php";

    global $item_id;
    if(isset($_GET['item_id'])){
        $item_id = $_GET['item_id'];

        $sql = "SELECT * FROM items WHERE item_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$item_id]);
        $item = $stmt->fetch();
    }
    
?>

<?php include_once"header.php"; ?>
<section class="item-details">
    <div class="item-card">
        <div class="item-det-image display-w">
            <?php echo "<img src='../pics/$item->item_pic'> "?>
        </div>
        <div class="item-det-content display-w">
            <?php echo "<h4>Item name: <b>" . ucfirst($item->item_name) . "</b></h4><hr>"?>
            <?php echo "<h5>Item price: <b>$item->item_price</b></h5>"?>
            <?php echo "<h5>Seller name: <b>" . ucwords($item->seller_name) . "</b></h5><br>" ?>
            <form action="" method="POST">Quantity: <input type="number" name="quantity" value="1" style="width: 45px; padding: 3px;"></form>
            <div class="m-payment">
                <hr>
                <div class="m-payment-det">
                    <p>Select Method of payment: </p>
                    <form action="" method="post">
                        <label for="mpesa">M-PESA</label>
                        <input type="radio" name="method" id="">
                        <label for="credit">Credit card</label>
                        <input type="radio" name="method" id="">
                    </form>
                </div>
            </div><br>
            <input type="submit" value="Buy" style="display: block; width: 70%; padding: 5px 15px; cursor: pointer;">
        </div>
    </div>   
</section>