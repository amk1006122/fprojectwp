<?php
session_start();  // Always call session_start() at the very beginning
?>

<header>
    <div class="logo">
        <img src="../image/logo.png" width="150" alt="Logo">
    </div>

    <div class="profile-detail">
    <?php
    // Make sure you have the seller_id from the session
    $seller_id = isset($_SESSION['seller_id']) ? (int)$_SESSION['seller_id'] : 0;

    if ($seller_id > 0) {
        // Assuming the $conn variable is already initialized and connected
        try {
            $select_profile = $conn->prepare("SELECT * FROM `sellers` WHERE id = ?");
            $select_profile->execute([$seller_id]);

            if ($select_profile->rowCount() > 0) {
                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                $profile_image = !empty($fetch_profile['image']) ? '../uploaded_files/' . $fetch_profile['image'] : '../image/default-avatar.png';
        ?>
                <img src="<?= $profile_image; ?>" class="logo-img" width="100" alt="Profile Image">
                <p><?= htmlspecialchars($fetch_profile['name']); ?></p>
                <a href="profile.php" class="btn">Profile</a>
                <a href="../components/admin_logout.php" onclick="return confirm('Logout from this website?');" class="btn">Logout</a>
        <?php 
            } else {
                // If no profile is found
                echo "<p>No profile found for this seller.</p>";
            }
        } catch (PDOException $e) {
            // Handle any database connection or query errors
            echo "<p>Error fetching profile: " . $e->getMessage() . "</p>";
        }
    } else {
        // If seller_id is not set or invalid
        echo "<p>Invalid seller ID.</p>";
    }
    ?>
    </div>

    <div class="right">
        <!-- User icon -->
        <a href="profile.php" id="user-icon">
            <i class="fa-solid fa-user"></i> <!-- User icon -->
        </a>
    </div>
</header>



<div class="sidebar-container">
    <div class="sidebar">
        <div style="margin-top:80px;">
            <?php
            // Ensure session is started and the user_id is available
            
            $user_id = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0; // Default to 0 if not set
            
            // Check if user_id is valid
            if ($user_id > 0) {
                // Prepare and execute query to fetch the user profile
                $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                $select_profile->execute([$user_id]);

                // Check if any profile was found
                if ($select_profile->rowCount() > 0) {
                    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                    
                    // Use htmlspecialchars to sanitize the name and prevent XSS
                    $profile_name = htmlspecialchars($fetch_profile['name']);
                    // If the image is not set, use a default image
                    $profile_image = !empty($fetch_profile['image']) ? 'uploaded_files/' . $fetch_profile['image'] : 'images/default-avatar.png';
                    ?>
                    <img src="<?= $profile_image; ?>" alt="<?= $profile_name; ?>" class="profile-img" />
                    <h3 style="margin-bottom: 1rem;"><?= $profile_name; ?></h3>
                    <div class="flex-btn">
                        <a href="profile.php" class="btn">View Profile</a>
                        <a href="components/user_logout.php" onclick="return confirm('Logout from this website?');" class="btn">Logout</a>
                    </div>
                    <?php
                } else {
                    echo "<p>No profile found.</p>";
                }
            } else {
                echo "<p>Please log in to view your profile.</p>";
            }
            ?>
        </div>
    </div>
</div>


        </div>
        <h5>menu</h5>
        <div class="navbar">
            <ul>
                <li><a href="dashboard.php"><i class="bx bxs-home-smile"></i>dashboard</a></li>
                <li><a href="add_product.php"><i class="bx bxs-shopping-bags"></i>add product</a></li>
                <li><a href="view_product.php"><i class="bx bxs-food-menu"></i>view product</a></li>
                <li><a href="user_accounts.php"><i class="bx bxs-user-detail"></i>accounts</a></li>
                <li><a href="../components/admin_logout.php" onclick="return confirm('logout from this website');"><i class="bx bxs-log-out"></i>logout</a></li>
            </ul>
        </div>
        <h5>find us</h5>
        <div class="social-links">
        <i class="bx bxl-facebook"></i>
        <i class="bx bxl-instagram-alt"></i>
        <i class="bx bxl-linkedin"></i>
        <i class="bx bxl-twitter"></i>
        <i class="bx bxl-tiktok"></i>
        </div>
    </div>
</div>

<style>
/* General body styling */
header{
    position:fixed;
    left:0;
    top:0;
    right: 0;
    height: 80px;
    z-index: 151;
    box-shadow: 0px 5px 10px 0px #aaa;
    padding: 0;
    background-color: gray;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.header .right{
    display: flex;
}
#user-btn,
.toggle-btn{
    font-size: 2rem;
    padding: 5rem;
    color: var(--black-color);
    cursor:pointer;
    transition: .6s;
}
.toggle-btn{
    margin-left: .5rem;
    display: none;
}
.profile-detail{
    background-color: var(--white-alpha-25);
    border: 2px solid var(--white-alpha-40);
    backdrop-filter: var(--backdrop-filter);
    box-shadow: var(--box-shadow);
    position: absolute;
    top: 125%;
    right: 2rem;
    border-radius: .5rem;
    width: 22rem;
    padding: 1.5rem .5rem;
    animation: .2s linear fadeIn;
    text-align: center;
    overflow: hidden;
    display: none;
}
@keyframes fadeIn{
    0%{
        transform: translateY(1rem);
    }
}
.profile-detail.active{
    display: inline-block;
}
.profile-detail p{
    padding-bottom: .7rem;
    font-size: 1.5rem;
    text-transform: capitalize;
    color: lightgrey;
}
.profile-detail .flex-btn{
    display: flex;
    justify-content: space-evenly;
}
.profile-detail .flex-btn .btn{
    margin: 0 .5rem;
}

.header .right {
    display: flex;
    align-items: center;
    justify-content: left; /* Aligns the icon to the right */
}


#user-icon {
    font-size: 2rem; /* Adjusts the size of the user icon */
    color: var(--main-color); /* Change this to the color you want */
    margin-left: 50px; /* Adds spacing between the icon and other items */
    cursor: pointer; /* Shows a pointer when hovered */
    margin-right: 20px;
}

#user-icon:hover {
    color: var(--accent-color); /* Changes the color on hover */
}

.main-container{
    display: flex;
}
.sidebar h5{
    text-transform: uppercase;
    color: var(--main-color);
    padding: .5rem 1rem;
    margin: .5rem 0;
}
.profile{
    margin: .5rem auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.sidebar .profile{
    margin-top: 2.5rem;
}
.profile .logo-img{
    border-radius: 50%;
    padding: .2rem;
    border: 2px solid var(--main-color);
}
.sidebar .profile p{
    margin-top: .5rem;
    text-transform: uppercase;
    font-weight: bolder;
    color: gray;
    font-size: 1.3rem;
}
.sidebar ul li{
    padding: 1rem;
    background-color: var(--white-alpha-25);
    border: 2px solid var(--white-alpha-40);
    backdrop-filter: var(--backdrop-filter);
    box-shadow: var(--box-shadow);
    position: relative;
    transition: .5s;
    margin: .5rem 0;
}
.sidebar ul li::before{
    position: absolute;
    content: '';
    left: 0;
    top: 0;
    height: 0%;
    width: 5px;
    background-color: var(--main-color);
    z-index: 2;
    transition: all 200ms linear;
}
.sidebar ul li:hover::before{
    height: 100%;
}
.sidebar ul li i{
    color: var(--main-color);
    font-size: 20px;
    margin-right: 2rem;
}
.sidebar ul li a{
    text-transform: uppercase;
    color: gray;
    font-size: 12px;
    font-weight: bold;
}
.social-links{
    margin-bottom: 3rem;
}
.social-links i{
    background-color: var(--white-alpha-25);
    border: 2px solid var(--white-alpha-40);
    backdrop-filter: var(--backdrop-filter);
    box-shadow: var(--box-shadow);
    cursor: pointer;
    margin: 3rem;
    width: 40px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    font-size: 20px;
    transition: .5s;
}
.social-links i:hover{
    background-color: var(--black-opacity);
    border: 2px solid var(--main-color);
} 
.logo-img {
    width: 10%;adust size as needed */
    height: auto;
    object-fit: cover;  /* Prevents image distortion */
    border-radius: 50%;  /* Makes the image round */
    border: 3px solid #ccc;  /* Adds a subtle border */
    display: block;
    margin: :left;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Soft shadow */
}
.profile-detail {
    text-align: center;
    padding-top: 20px;  /* Adds space above the image */
}

/* If inside a flexbox, prevent cropping */
.profile-detail img {
    flex-shrink: 0;  
    max-width: 100%;
}

</style>

