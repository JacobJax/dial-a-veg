<?php

    require"../../configure/dbo_config.php";

    $name = $category = $price = $quantity = $file = $pic = $seller_id = '';
    $errors = [
        'name'=>'',
        'category'=>'',
        'price'=>'',
        'quantity'=>'',
        'file'=>''
    ];

    if(isset($_POST['submit'])){
        #item name validation
        if(empty($_POST['name'])){
            $errors['name'] = 'An item name is required';   
        } else {
            $name = $_POST['name'];
            if(!preg_match("/^[a-z ,.'-]+$/i", $name)){
                $errors['name'] = 'A name must be letters and spaces only';
            }
        }

        #item category validation
        if(empty($_POST['category'])){
            $errors['category'] = 'An item category is required';
        } else {
            $category = $_POST['category'];
            if(!preg_match("/^[a-z ,.'-]+$/i", $category)){
                $errors['name'] = 'An item category must be letters and spaces only';
            }
        }

        #price validation
        if(empty($_POST['price'])){
            $errors['price'] = 'An item price is required';  
        } else {
            $price = $_POST['price'];
            if($price < 1){
                $errors['price'] = "Invalid price entry";
            }
        }

        #quantity validation
        if(empty($_POST['quantity'])){
            $errors['quantity'] = 'An item quantity is required';  
        } else {
            $quantity = $_POST['quantity'];
            if($quantity < 1){
                $errors['quantity'] = "You can not stock an item of quantity less than 1";
            }
        }

        // handle image upload
        
        $valid_ext = ['jpg', 'jpeg', 'png'];
        $file = $_FILES['file'];

        $fileName = $file['name'];
        $fileTmpDes = $file['tmp_name'];
        $fileError = $file['error'];

        $fileExt = explode('.', $fileName);
        $actualFileExt = strtolower(end($fileExt));

        if(!in_array($actualFileExt, $valid_ext)){
            $errors['file'] = 'Invalid file format';
        } else {
            if($fileError === 0){
                $fileNewName = uniqid('', true) . '.' . $actualFileExt;
                $destination = "../../pics/" . $fileNewName;
                $imageIllustration = $destination;
                move_uploaded_file($fileTmpDes, $destination);
            } else {
                $errors['file'] = 'An error occured';
            }  
        }

        if(!array_filter($errors)){
            session_start();

            global $seller_id;
            global $seller_name;
            $pic = $fileNewName;

            if(!isset($_SESSION['seller_id'])) {
                header("Location: ../login.php");
            } else if(isset($_SESSION['seller_id'])){
                $seller_id = $_SESSION['seller_id'];
                $seller_name = $_SESSION['fullname'];
            }

            $sql = "INSERT INTO items(item_name, item_category, item_price, item_pic, item_quantity, seller_id, seller_name) VALUES(?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $category, $price, $pic, $quantity, $seller_id, $seller_name]);
            
            $name = $category = $price = $quantity = $file = $pic = $seller_id = '';
            header("Location: ../dashboard.php");
        }
        
    }

    
?>
<?php include"sellers-header.php"; ?>
<div class="container center">
    <form method="POST" enctype="multipart/form-data">
    <h1 class="h3 mb-3 font-weight-normal text-center">Add new Item</h1><hr>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Item name</label>
                <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name) ?>">
                <div class="red-text"><?php echo $errors['name']; ?></div>
            </div>
            <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" name="category">
                    <option>Leafy greens</option>
                    <option>Cruferous</option>
                    <option>Marrow</option>
                    <option>Root</option>
                    <option>Edible plants</option>
                </select>
                <div class="red-text"><?php echo $errors['category']; ?></div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="inputEmail4">Item price</label>
                <input type="number" class="form-control" name="price" value="<?php echo htmlspecialchars($price) ?>">
                <div class="red-text"><?php echo $errors['price']; ?></div>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">Item quantity</label>
                <input type="number" class="form-control" name="quantity" value="<?php echo htmlspecialchars($quantity) ?>">
                <div class="red-text"><?php echo $errors['quantity']; ?></div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Upload item image (jpg/jpeg/png)</label>
            <input type="file" class="form-control-file" name="file" value="<?php echo htmlspecialchars($file) ?>">
            <div class="red-text"><?php echo $errors['file']; ?></div>
        </div>
        
        <button type="submit" class="btn btn-lg btn-primary btn-block" name="submit">Add item</button><br>
    </form>
</div>