<?php 

// Database Connection


$db_host = 'localhost';
$db_name = 'homedecor_db';  // Make sure this name is correct!
$db_user = 'root';  // Default XAMPP username
$db_pass = '';  // Default XAMPP password is empty

try {
    // Correct DSN format
    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";

    // Create a PDO instance
    $conn = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // Enable error reporting
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Fetch as associative array
    ]);

    // Debugging: Remove this after testing
    //echo "✅ Database Connected Successfully!"; 

} catch (PDOException $e) {
    die("❌ Database Connection Failed: " . $e->getMessage());
}

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['submit'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pass = $_POST['pass'];
    $confirm_pass = $_POST['confirm_pass'];

    // Password hashing
    if ($pass !== $confirm_pass) {
        $warning_msg[] = "❌ Passwords do not match!";
    } else {
        $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);
    }

    // Image handling
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../uploaded_files/'.$image;

    // Check if email already exists
    $check_email = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $check_email->execute([$email]);

    if ($check_email->rowCount() > 0)
{
        $warning_msg[] = "❌ Email already exists!";
    } else {
        if (move_uploaded_file($image_tmp_name, $image_folder)) {
            $insert = $conn->prepare("INSERT INTO `users` (name, email, password, image) VALUES (?, ?, ?, ?)");
            $insert->execute([$name, $email, $hashed_pass, $image]);

            if ($insert) {
                $success_msg[] = "new user registered! Successful!";
                header('location:login.php');
                exit;
            } else {
                $error_msg[] = "❌ Registration failed. Please try again!";
            }
        } else {
            $error_msg[] = "❌ Failed to upload image!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homedecor- user registation page</title>
    <!-- <link rel="stylesheet" href="../css/admin_style.css=<?php echo time(); ?>"> -->

    <link rel="stylesheet" href="../css/admin_style.css">
    <!--font awesome cdn link---->
    <!--box icon cdn link-->
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/dist/boxicons.js"rel="stylesheet">
</head>
<body>
    


</div>

<div class="form-container">
    <form action="" method="post" enctype="multipart/form-data" class="register">
        <h3>Register Now</h3>
        
        <div class="input-field">
            <p>Your Name <span>*</span></p>
            <input type="text" name="name" placeholder="Enter your name" maxlength="50" required class="box">
        </div>

        <div class="input-field">
            <p>Your Email <span>*</span></p>
            <input type="email" name="email" placeholder="Enter your email" maxlength="50" required class="box">
        </div>

        <div class="input-field">
            <p>Password <span>*</span></p>
            <input type="password" name="pass" placeholder="Enter password" maxlength="50" required class="box">
        </div>

        <div class="input-field">
            <p>Confirm Password <span>*</span></p>
            <input type="password" name="confirm_pass" placeholder="Confirm password" maxlength="50" required class="box">
        </div>

        <div class="input-field">
            <p>Upload Image <span>*</span></p>
            <input type="file" name="image" accept="image/*" required class="box">
        </div>

        <p class="link">Already have an account? <a href="login.php">Login Now</a></p>
        <input type="submit" name="submit" value="Register" class="btn">
    </form>
</div>
<div class="back-to-home">
        <a href="../home.php" class="btn btn-primary">Back to Home</a>
    </div>










<!--sweet alert cdn link-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" ></script>
<!--custom js file link-->
<script src="../js/user_script.js"></script>
<style>
    .banner .detail{
        text-align: left;
        margin-top: 10%;
    }
</style>


</body>
</html>
