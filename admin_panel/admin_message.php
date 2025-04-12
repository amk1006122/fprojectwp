<?php 
    include '../components/connect.php';

    if (isset($_COOKIE['seller_id'])) {
        $seller_id = $_COOKIE['seller_id'];
    } else {
        $seller_id = '';
        header('location:login.php');
        exit();
    }
    
    // Update order payment status
    if (isset($_POST['update_order'])) {
        $order_id = $_POST['order_id'];
        $order_id = filter_var($order_id, FILTER_SANITIZE_STRING);

        $update_payment = $_POST['update_payment'];
        $update_payment = filter_var($update_payment, FILTER_SANITIZE_STRING);

        $update_pay = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
        $update_pay->execute([$update_payment, $order_id]);

        $success_msg[] = 'Order payment status updated successfully';
    }

    // Delete order
    if (isset($_POST['delete_order'])) {
        $delete_id = $_POST['order_id'];
        $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

        $verify_delete = $conn->prepare("SELECT * FROM `orders` WHERE id = ?");
        $verify_delete->execute([$delete_id]);

        if ($verify_delete->rowCount() > 0) {
            $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
            $delete_order->execute([$delete_id]);

            $success_msg[] = 'Order deleted successfully';
        } else {
            $warning_msg[] = 'Order already deleted';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homedecor - Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../admin_style.css">
</head>
<body>

    <div class="main-container">
        
        
        <section class="order-container">
            <div class="heading">
                <h1>Total Orders Placed</h1>
            </div>
            
            <div class="box-container">
                <?php 
                   $select_order = $conn->prepare("SELECT * FROM `orders` WHERE seller_id = ?");
                

                    if ($select_order->rowCount() > 0) {
                        while($fetch_order = $select_order->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="box">
                    <div class="status" style="color: <?= ($fetch_order['status'] == 'in progress') ? 'limegreen' : 'red'; ?>">
                        <?= htmlspecialchars($fetch_order['status']); ?>
                    </div>

                    <div class="details">
                        <p> User Name: <span><?= htmlspecialchars($fetch_order['name']); ?></span></p>
                        <p> User ID: <span><?= htmlspecialchars($fetch_order['user_id']); ?></span></p>
                        <p> Placed On: <span><?= htmlspecialchars($fetch_order['date']); ?></span></p>
                        <p> User Number: <span><?= htmlspecialchars($fetch_order['number']); ?></span></p>
                        <p> User Email: <span><?= htmlspecialchars($fetch_order['email']); ?></span></p>
                        <p> Total Price: <span><?= htmlspecialchars($fetch_order['price']); ?></span></p>
                        <p> Payment Method: <span><?= htmlspecialchars($fetch_order['method']); ?></span></p>
                        <p> User Address: <span><?= htmlspecialchars($fetch_order['address']); ?></span></p>
                    </div>

                    <form action="" method="post">
                        <input type="hidden" name="order_id" value="<?= htmlspecialchars($fetch_order['id']); ?>">
                        <select name="update_payment" class="box" style="width: 90%;">
                            <option disabled selected><?= htmlspecialchars($fetch_order['payment_status']); ?></option>
                            <option value="pending">Pending</option>
                            <option value="order delivered">Order Delivered</option>
                        </select>

                        <div class="flex-btn">
                            <input type="submit" name="update_order" value="Update Payment" class="btn">
                            <input type="submit" name="delete_order" value="Delete Order" class="btn"
                            onclick="return confirm('Are you sure you want to delete this order?');">
                        </div>
                    </form>
                </div>
                <?php 
                        }
                    } else {
                        echo '<div class="empty"><p>No orders placed yet!</p></div>';
                    }
                ?>
            </div>
            <div class="back-to-home">
        <a href="dashboard.php" class="btn btn-primary">Back to dashboard</a>
    </div>
        </section>
    </div>

    <?php include '../components/alert.php'; ?>
</body>
</html>
