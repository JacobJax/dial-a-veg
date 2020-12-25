<?php include_once"includes/header.php"; ?>
<header>
    <form action="customers/shop.php" method="POST">
        <input type="text" name="veg-search" placeholder="What do veggie do you want to get">
        <input type="submit" name="search" value="Search">
    </form><br>
    <h1>VEGIES AT YOUR FINGERFTIPS</h1>
    <p>We are your onestop online shop for fresh vegetables fruits with fast efficient service</p>

    <a href="sellers/register.php" class="seller-btn">Become a seller</a>
    <a href="customers/shop.php" class="shop-btn">Shop now</a>
</header>

<section class="featured">
    <h3>Popular Items</h3>
    <p>Checkout our most visited popular items by other customers just like you</p>

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
                    <?php echo "<p>" . ucfirst($item->item_name) . "</p>" ?>
                    <?php echo "<p>" . ucwords($item->seller_name) . "</p>" ?>
                </div>
                <div class="card-content-right">
                <?php echo "<p>Kshs $item->item_price</p>" ?>
                    <a href="customers/shop.php" class="buy-btn"><small>Shop now</small></a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

<section class="display">
    <div class="display-w display-left">
        <h3>Fast Customer Service</h3>
        <p>We put our customers at the center of service provision. After all the Customer is always right</p><br>
        <a href="customers/shop.php" class="smn-1 smn-btn">Buy now</a>
    </div>
    <div class="display-w display-right">
        <h3>Nothing but the Best</h3>
        <p>Our products come from the best farmers using best natural organic methods to grow their produce</p><br>
        <a href="customers/shop.php" class="smn-2 smn-btn">Buy now</a>
    </div>
</section>

<section class="extra-details">
    <div class="extra-details-content">
        <h3>Health focused</h3>
        <p>With the increased rate in obesity related diseases. We are aimed at providing you our customer, with products that help keep your heart pumping and nourish you with the neccessary vitamins to keep you going.</p>

        <h5>We are Good at What we do</h5>
        <p><small>"...dial a veg is really efficient for me especially during this pandemic season. It has proven very helpful."<br>--<b>Monica Adhis</b></small></p>
    </div>
    <div class="extra-details-image">
        <img src="img/markus-spiske-vPGJ2fMsWkQ-unsplash.jpg" alt="">
    </div>
</section>

<section class="popular">
    <h3>Featured Items--</h3>
    <p>Have a look at some of the products in our honourable mentions</p><br>
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
                    <?php echo "<p>" . ucfirst($item->item_name) . "</p>" ?>
                    <?php echo "<p>" . ucwords($item->seller_name) . "</p>" ?>
                </div>
                <div class="card-content-right">
                <?php echo "<p>Kshs $item->item_price</p>" ?>
                    <a href="customers/shop.php" class="buy-btn">Shop now</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

<section class="final-details">
    <p>Help people perform better, think faster, and live better using a proven blend of ancient knowledge and brand new technologies, tempered by research, science, and measured results from our customers, top athletes, and medical professionals. It starts with their purpose: “Help people perform better, think faster, and live better. Then it goes on to explain exactly how they plan to do it: Using ancient knowledge, brand new technologies, and science.</p>
</section>

<?php include_once"includes/footer.php"; ?>