<?php
    require_once"../configure/dbo_config.php";

    session_start();
    global $id;

    if(!isset($_SESSION['admin_id'])) {
        header("Location: login.php");
    } else if(isset($_SESSION['admin_id'])){
        $id = $_SESSION['admin_id'];
    }

    $sql = "SELECT * FROM sellers";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $customers = $stmt->fetchAll();
    // var_dump($items);

    // $number_of_items = $stmt->rowcount();

    if(isset($_POST['search'])) {

        if(isset($_POST['itm_search'])) {

            $cust_name = '%' . $_POST['itm_search'] . '%';
            
            $sql = "SELECT * FROM sellers WHERE first_name LIKE ? OR last_name LIKE ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$cust_name, $cust_name]);
            $customers = $stmt->fetchAll();
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
            <th scope="col">Profile image</th>
            <th scope="col">First name</th>
            <th scope="col">Last name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile phone</th>
            <th scope="col">County</th>
            <th scope="col">Town</th>
            <th scope="col">Date of birth</th>
            <th scope="col">Options</th>
            </tr>
        </thead>
       
    <tbody>
        <?php foreach($customers as $customer) { ?>
        <tr>
            <?php echo " <th scope='row'> <img src='$customer->profile_pic'></th> " ?>
            <?php echo " <td scope='row'>$customer->first_name</td> " ?>
            <?php echo " <td scope='row'>$customer->last_name</td> " ?>
            <?php echo " <td scope='row'>$customer->email</td> " ?>
            <?php echo " <td scope='row'>$customer->phone</td> " ?>
            <?php echo " <td scope='row'>$customer->county</td> " ?>
            <?php echo " <td scope='row'>$customer->city</td> " ?>
            <?php echo " <td scope='row'>$customer->date_of_birth</td> " ?>
            <td>
                <a href="#" class="btn btn-primary">Update</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </td>  
        </tr>
        <?php } ?>
    </tbody>
    </table>

</div>