<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "homedecor_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming seller_id is fetched from session or authentication logic
$seller_id = 1; // Example; modify as per your requirement
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard - Home Decor</title>
    <link rel="stylesheet" href="../css/admin_style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
</head>
<body>

<div class="main-container">
<section class="dashboard">
    <div class="heading">
        <h1>Dashboard</h1>
        <a href="dashboard.php" class="image"><img src="../image/cheadimg.jpg" width="150" height="100" alt="Dashboard Logo"></a>
    </div>

    <div class="box-container">
        <div class="box">
            <h3>Welcome!</h3>
            <p><?= htmlspecialchars($fetch_profile['name'] ?? 'Guest'); ?></p>
            <a href="update.php" class="btn">Update Profile</a>
        </div>

        <div class="box">
            <?php
            $select_message = $conn->prepare("SELECT * FROM message");
            $select_message->execute();
            $number_of_msg = $select_message->get_result()->num_rows;
            ?>
            <h3><?= $number_of_msg; ?></h3>
            <p>Unread Messages</p>
            <a href="admin_message.php" class="btn">See Messages</a>
        </div>

        <div class="box">
            <?php
            $select_products = $conn->prepare("SELECT * FROM products WHERE seller_id = ?");
            $select_products->bind_param("i", $seller_id);
            $select_products->execute();
            $number_of_products = $select_products->get_result()->num_rows;
            ?>
            <h3><?= $number_of_products; ?></h3>
            <p>Products Added</p>
            <a href="add_product.php" class="btn">Add Product</a>
        </div>

        <div class="box">
            <?php
            $status = 'active';
            $select_active_products = $conn->prepare("SELECT * FROM products WHERE seller_id = ? AND status = ?");
            $select_active_products->bind_param("is", $seller_id, $status);
            $select_active_products->execute();
            $number_of_active_products = $select_active_products->get_result()->num_rows;
            ?>
            <h3><?= $number_of_active_products; ?></h3>
            <p>Total Active Products</p>
            <a href="view_product.php" class="btn">Active Product</a>
        </div>

        <div class="box">
            <?php
            $status = 'deactive';
            $select_deactive_products = $conn->prepare("SELECT * FROM products WHERE seller_id = ? AND status = ?");
            $select_deactive_products->bind_param("is", $seller_id, $status);
            $select_deactive_products->execute();
            $number_of_deactive_products = $select_deactive_products->get_result()->num_rows;
            ?>
            <h3><?= $number_of_deactive_products; ?></h3>
            <p>Total Deactive Products</p>
            <a href="view_product.php" class="btn">Deactive Product</a>
        </div>

        <div class="box">
            <?php
            $select_users = $conn->prepare("SELECT * FROM users");
            $select_users->execute();
            $number_of_users = $select_users->get_result()->num_rows;
            ?>
            <h3><?= $number_of_users; ?></h3>
            <p>Users Account</p>
            <a href="user_accounts.php" class="btn">See Users</a>
        </div>

        <div class="box">
            <?php
            $select_sellers = $conn->prepare("SELECT * FROM sellers");
            $select_sellers->execute();
            $number_of_sellers = $select_sellers->get_result()->num_rows;
            ?>
            <h3><?= $number_of_sellers; ?></h3>
            <p>Sellers Account</p>
            <a href="view_product.php" class="btn">See Sellers</a>
        </div>

        <!-- <div class="box">
            <?php
            $select_orders = $conn->prepare("SELECT * FROM orders WHERE seller_id = ?");
            $select_orders->bind_param("i", $seller_id);
            $select_orders->execute();
            $number_of_orders = $select_orders->get_result()->num_rows;
            ?>
            <h3><?= $number_of_orders; ?></h3>
            <p>Total Orders Placed</p>
            <a href="admin_order.php" class="btn">Total Orders</a>
        </div> -->

        <div class="box">
            <?php
            $status = 'in progress';
            $select_confirm_orders = $conn->prepare("SELECT * FROM orders WHERE seller_id = ? AND status = ?");
            $select_confirm_orders->bind_param("is", $seller_id, $status);
            $select_confirm_orders->execute();
            $number_of_confirm_orders = $select_confirm_orders->get_result()->num_rows;
            ?>
            <h3><?= $number_of_confirm_orders; ?></h3>
            <p>Total Confirm Orders</p>
            <a href="admin_order.php" class="btn">Confirm Orders</a>
        </div>

        <div class="box">
            <?php
            $status = 'cancelled';
            $select_cancelled_orders = $conn->prepare("SELECT * FROM orders WHERE seller_id = ? AND status = ?");
            $select_cancelled_orders->bind_param("is", $seller_id, $status);
            $select_cancelled_orders->execute();
            $number_of_cancelled_orders = $select_cancelled_orders->get_result()->num_rows;
            ?>
            <h3><?= $number_of_cancelled_orders; ?></h3>
            <p>Total Cancelled Orders</p>
            <a href="admin_order.php" class="btn">Cancelled Orders</a>
        </div>

    </div>
</section>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="../js/admin_script.js"></script>
<?php include '../components/alert.php'; ?>

</body>
</html>
