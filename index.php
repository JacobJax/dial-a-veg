<?php include_once"includes/header.php"; ?>
<header>
    <form action="" method="post">
        <input type="text" name="veg-search" placeholder="What do veggie do you want to get">
        <input type="submit" name="submit" value="Search">
    </form><br>
    <h1>VEGIES AT YOUR FINGERFTIPS</h1>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt natus repudiandae </p><br><br>

    <a href="sellers/register.php" class="seller-btn">Become a seller</a>
    <a href="customers/shop.php" class="shop-btn">Shop now</a>
</header>

<section class="featured">
    <h3>Popular Items</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, nisi.</p>

    <div class="featured-items">
        <?php include_once"configure/dbo_config.php" ?>
        <?php $sql = "SELECT * FROM items LIMIT 1, 4"; ?>
        <?php $stmt = $pdo->prepare($sql); ?>
        <?php $stmt->execute(); ?>
        <?php $items = $stmt->fetchAll(); ?>

        <?php foreach($items as $item) {?>
        <div class="card">
            <div class="card-image">
                <?php echo "<img src='pics/$item->item_pic'>" ?>
            </div>
            <div class="card-content">
                <div class="card-content-left" style="text-align: left;">
                    <?php echo "<p>$item->item_name</p>" ?>
                    <?php echo "<p>$item->seller_name</p>" ?>
                </div>
                <div class="card-content-right">
                <?php echo "<p>$item->item_price</p>" ?>
                    <a href="customers/shop.php" class="buy-btn"><small>Shop now</small></a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

<section class="display">
    <div class="display-w display-left">
        <h3>Lorem, ipsum dolor.</h3><br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, molestias!</p><br><br>
        <a href="customers/shop.php" class="smn-1 smn-btn">Buy now</a>
    </div>
    <div class="display-w display-right">
        <h3>Lorem, ipsum dolor.</h3><br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, molestias!</p><br><br>
        <a href="customers/shop.php" class="smn-2 smn-btn">Buy now</a>
    </div>
</section>

<section class="extra-details">
    <div class="extra-details-content">
        <h3>Lorem, ipsum.</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis exercitationem minima quia tempora atque sed porro, ipsam aliquam, voluptatem ad est assumenda commodi dolorum excepturi magnam debitis quis. Odio, tempora.</p><br>

        <h4>We are Good at What we do</h4>
        <p><small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, repudiandae?</small></p>
    </div>
    <div class="extra-details-image">
        <img src="img/markus-spiske-vPGJ2fMsWkQ-unsplash.jpg" alt="">
    </div>
</section>

<section class="popular">
    <h3>Featured Items--</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, nisi.</p><br><br>
    <div class="featured-items">
    <?php include_once"configure/dbo_config.php" ?>
        <?php $sql = "SELECT * FROM items LIMIT 4, 3"; ?>
        <?php $stmt = $pdo->prepare($sql); ?>
        <?php $stmt->execute(); ?>
        <?php $items = $stmt->fetchAll(); ?>

        <?php foreach($items as $item) {?>
        <div class="card">
            <div class="card-image">
                <?php echo "<img src='pics/$item->item_pic'>" ?>
            </div>
            <div class="card-content">
                <div class="card-content-left" style="text-align: left;">
                    <?php echo "<p>$item->item_name</p>" ?>
                    <?php echo "<p>$item->seller_name</p>" ?>
                </div>
                <div class="card-content-right">
                <?php echo "<p>$item->item_price</p>" ?>
                    <a href="customers/shop.php" class="buy-btn"><small>Shop now</small></a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

<section class="final-details">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic natus fugit dolores non neque a veniam incidunt. Eum iure molestias id enim nihil earum nemo rem consectetur quisquam, accusantium, rerum ea labore asperiores placeat laudantium, non animi quam harum eos quas dolorem totam aut facere? Molestias tempora suscipit ipsam magnam!</p>
</section>

<?php include_once"includes/footer.php"; ?>