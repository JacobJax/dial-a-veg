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
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $items = $stmt->fetchAll();
    // var_dump($items);

    // $number_of_items = $stmt->rowcount();

    if(isset($_POST['search'])) {

        if(isset($_POST['itm_search'])) {

            $item_name = '%' . $_POST['itm_search'] . '%';
            $category = '%' . ucfirst($_POST['itm_search']) . '%';

            $sql = "SELECT * FROM items WHERE item_name LIKE ? OR item_category LIKE ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$item_name, $category]);
            $items = $stmt->fetchAll();
        }
    }

?>

<?php include"admin-header.php"; ?>
<div class="container-fluid mx-20">
    <div class="row">
        <div class="col-md-6">
            <h2 class="text-center">Items</h2>
        </div>
        <div class="col-md-6">
            <form class="form-inline" method="POST">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="inputPassword2" class="sr-only">Search:</label>
                    <input type="text" class="form-control" name="itm_search" placeholder="search item">
                </div>
                <button type="submit" class="btn btn-success mb-2" name="search">Search</button>
            </form>
        </div>
    </div><br>
    
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Item image</th>
            <th scope="col">Item name</th>
            <th scope="col">Item category</th>
            <th scope="col">Item price (Kshs)</th>
            <th scope="col">In stock</th>
            <th scope="col">Date created</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
       
    <tbody>
        <?php foreach($items as $item) { ?>
        <tr>
            <?php echo " <th scope='row'> <img src='../pics/$item->item_pic'></th> " ?>
            <?php echo " <td scope='row'>$item->item_name</td> " ?>
            <?php echo " <td scope='row'>$item->item_category</td> " ?>
            <?php echo " <td scope='row'>$item->item_price</td> " ?>
            <?php echo " <td scope='row'>$item->item_quantity</td> " ?>
            <?php echo " <td scope='row'>$item->created_on</td> " ?>
            <td>
                <a href="#" class="btn btn-primary">Update</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </td>  
        </tr>
        <?php } ?>
    </tbody>
    </table>

</div>