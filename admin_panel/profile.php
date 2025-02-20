<?php
session_start();
include '../components/connect.php';
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

if (!isset($_SESSION['seller_id'])) 


$seller_id = $array['seller_id'] ?? 'Default Value';  // Replace 'Default Value' with an actual fallback


// Fetch seller profile
$select_profile = $conn->prepare("SELECT name, image FROM `sellers` WHERE id = ?");
$select_profile->bind_param("i", $seller_id);
$select_profile->execute();
$result_profile = $select_profile->get_result();
$fetch_profile = $result_profile->fetch_assoc();
$select_profile->close();

$profile_image = !empty($fetch_profile['image']) ? htmlspecialchars($fetch_profile['image'], ENT_QUOTES, 'UTF-8') : 'default_profile.jpg';

// Count products
$select_products = $conn->prepare("SELECT COUNT(*) AS total FROM `products` WHERE seller_id = ?");
$select_products->bind_param("i", $seller_id);
$select_products->execute();
$result_products = $select_products->get_result();
$total_products = $result_products->fetch_assoc()['total'];
$select_products->close();

// Count orders
$select_orders = $conn->prepare("SELECT COUNT(*) AS total FROM `orders` WHERE order_id = ?");
$select_orders->bind_param("i", $seller_id);
$select_orders->execute();
$result_orders = $select_orders->get_result();
$total_orders = $result_orders->fetch_assoc()['total'];
$select_orders->close();

$conn->close();
?>

<img src="../uploaded_files/<?= $profile_image; ?>" alt="Seller Profile">
<h3 class="name"><?= htmlspecialchars($fetch_profile['name'] ?? 'Unknown Seller', ENT_QUOTES, 'UTF-8'); ?></h3>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Seller Profile Page</title>
    <link rel="stylesheet" href="../css/admin_style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
</head>
<body>

<div class="main-container">
    <?php include '../components/admin_header.php'; ?>
    
    <section class="seller-profile">
        <div class="heading">
            <h1>Profile Details</h1>
            <a href="dashboard.php" class="image"><img src="../image/cheadimg.jpg" width="150" height="100" alt="Dashboard Logo"></a>
        </div>
        <div class="details">
            <div class="seller">
                <img src="../uploaded_files/<?= isset($fetch_profile['image']) && !empty($fetch_profile['image']) ? htmlspecialchars($fetch_profile['image']) : 'default.png'; ?>" alt="Seller Profile">
                <h3 class="name"><?= isset($fetch_profile['name']) ? htmlspecialchars($fetch_profile['name'], ENT_QUOTES, 'UTF-8') : 'Unknown Seller'; ?></h3>
                <span>Seller</span>
                <a href="update.php" class="btn">Update Profile</a>
            </div>
            <div class="flex">
                <div class="box">
                    <span><?= $total_products; ?></span>
                    <p>Total Products</p>
                    <a href="view_product.php" class="btn">View Products</a>
                </div>
                <div class="box">
                    <span><?= $total_orders; ?></span>
                    <p>Total Orders Placed</p>
                    <a href="admin_order.php" class="btn">View Orders</a>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="../js/admin_script.js"></script>

<?php include '../components/alert.php'; ?>

</body>
</html>
