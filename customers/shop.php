<?php
    require_once"../configure/dbo_config.php";

    if(empty($_GET)){

        $sql = "SELECT * FROM items";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $items = $stmt->fetchAll();

    } else {

        $category = $_GET['category'];

        $sql = "SELECT * FROM items WHERE item_category LIKE ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$category]);
        $items = $stmt->fetchAll();
    }
   
    
?>

<?php include_once"header.php"; ?>
<section class="shop">
<section class="left-menu">
    <h3>Categories</h3>
    <ul>
        <li><a href="shop.php?category=Leafy greens">Leafy greens</a></li>
        <li><a href="shop.php?category=Cruferous">Cruferous</a></li>
        <li><a href="shop.php?category=Marrow">Marrow</a></li>
        <li><a href="shop.php?category=Root">Root</a></li>
        <li><a href="shop.php?category=Edible plants">Edible plants</a></li>
    </ul>
    <hr>
</section>
<section class="right-menu">
    <div class="the-items-container">
        <?php if($items) { ?>
            <?php foreach($items as $item) {?>
            <div class="items-card">
                <div class="items-card-image">
                    <?php echo "<img src=". "../pics/$item->item_pic" .">" ?>
                </div>
                <div class="items-card-content">
                    <div class="items-card-content-left" style="text-align: left;">
                        <?php echo "<p>" . ucfirst($item->item_name) . "</p>" ?>
                        <?php echo "<p>" . ucwords($item->seller_name) . "</p>" ?>
                    </div>
                    <div class="items-card-content-right">
                        <?php echo "<p>Ksh $item->item_price</p>" ?>
                        <?php echo "<a href='' class='buy-btn'>Buy now</a>" ?>
                    </div>
                </div>
            </div>
            <?php } ?> 
        <?php } else { ?>
            <?php echo "<h1> NO RESULTS FOUND</h1>"; ?>
        <?php } ?>                
    </div>
    
</section>
</section>

<?php include_once"../includes/footer.php"; ?>