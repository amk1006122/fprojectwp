<?php
include '../components/connect.php';

if(isset($_POST['submit'])) {
    
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $pass = $_POST['pass']; // Don't hash before checking
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $select_seller = $conn->prepare("SELECT * FROM `sellers` WHERE email = ?");
    $select_seller->execute([$email]);

    if ($select_seller->rowCount() > 0) {
        $row = $select_seller->fetch();

        // Verify password using password_verify
        if (password_verify($pass, $row["password"])) {
            setcookie("seller_id", $row["id"], time() + 60*60*24*30, '/');
            header('location:dashboard.php');
            exit;
        } else {
            $warning_msg[] = '❌ Incorrect email or password!';
        }
    } else {
        $warning_msg[] = '❌ Email not found!';
    }
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Login</title>
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data" class="login">
            <h3>Login Now</h3>
            <div class="input-field">
                <p>Your Email <span>*</span></p>
                <input type="email" name="email" placeholder="Enter your email" maxlength="50" required class="box">
            </div>
                
            <div class="input-field">
                <p>Your Password <span>*</span></p>
                <input type="password" name="pass" placeholder="Enter your password" maxlength="50" required class="box">
            </div>
                    
            <p class="link">Don't have an account? <a href="register.php">Register Now</a></p>
            <input type="submit" name="submit" value="Login" class="btn">
        </form>
    </div>

<!-- SweetAlert for notifications -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="../js/user_script.js"></script>

<?php include '../components/alert.php'; ?>
</body>
</html>

