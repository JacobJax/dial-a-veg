<?php

    class Item{
        private $name;
        private $category;
        private $price;
        private $pic;
        private $quantity;
        private $seller_id;

        public function __construct($name, $category, $price, $pic, $quantity, $seller_id) {
            $this->name = $name;
            $this->category = $category;
            $this->price = $price;
            $this->pic = $pic;
            $this->quantity = $quantity;
            $this->seller_id = $seller_id;
        }

        public function addItem() {
            require"../configure/dbo_config.php";

            $sql = "INSERT INTO items(item_name, item_category, item_price, item_pic, item_quantity, created_on, seller_id) VALUES(?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->name, $this->category, $this->price, $this->pic, $this->quantity, $this->seller_id]);
        }
    }

?>