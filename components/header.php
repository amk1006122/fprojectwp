<header class="header">
    <section class="flex">
        <a href="home.php" class="logo"> <img src="image/logo.png" width="130px"></a>
        <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about-us.php">about us</a>
            <a href="shop.php">shop</a>
            <a href="customers.php">order</a>
            <a href="ordercontact.php">contact us</a>
        </nav>
        <form action="" method="post" class="search-form">
            <input type="text" name="search_product" placeholder="search product..." required maxlength="100">
            <button type="submit" class="bx bx-search-alt-2" id="search_product_btn"></button>
        </form>
        <div class="icons">
            <div class="bx bx-list-plus" id="menu-btn"></div>
            <div class="bx bx-search-alt-2" id="search-btn"></div>
            <a href="wishlist.php"><i class="bx bx-heart"></i><sup>0</sup></a>
            <a href="cart.php"><i class="bx bx-cart"></i><sup>0</sup></a>
            <div class="bx bxs-user" id="user-btn"></div>
        </div>
        <div class="profile-detail">
                <div class="flex-btn">
                    <a href="admin_panel/login.php" class="btn">login</a>
                    <a href="admin_panel/register.php" class="btn">register</a>
                </div>
            
            
        </div>
    </section>
    

</header>
<style>
    .header{
    padding: .5rem 4%;
    background-color: gray;
    box-shadow: 0px 5px 10px 0px #aaa;
    position: sticky;
    top:0;
    left: 0;
    right: 0;
    z-index: 1000;
}
.header .flex {
    padding: .5rem 2rem;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.header .flex .search-form{
    width: 30rem;
    border-radius: 5rem;
    display: flex;
    align-items: center;
    gap: 2rem;
    padding: 1rem 2rem;
    background-color: var(--black-opacity);
}
.header .flex .search-form input{
    width: 100%;
    background: none;
    font-size: 1.1rem;
    box-shadow: none;
}
.header .flex .search-form button{
    font-size: 1.1rem;
    color: var(--main-color);
    cursor: pointer;
    background: none;
    box-shadow: none;
}
.header .flex .icons div,
.header a i{
    font-size: 2rem;
    color: var(--main-color);
    height: 2.5rem;
    width: 2.5rem;
    line-height: 2.4rem;
    text-align: center;
    margin-left: .5rem;
    cursor: pointer;
}
.header sup{
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color: var(--main-color);
    position: absolute;
    top:20%;
    color: #fff;
}
#search-btn{
    display: none;
}
#menu-btn{
    display: none;
}
.header .flex .profil-detail{
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
/* Hidden profile-detail by default */
.profile-detail {
    display: none; /* Hidden by default */
    position: absolute;
    top: 100%; /* Position below the button */
    right: 0;
    background: white;
    padding: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 200px;  /* Initial width */
    transition: all 0.3s ease;  /* Smooth transition for size change */
}

/* Active class for showing and expanding */
.profile-detail.active {
    display: block;  /* Make the profile detail visible */
    width: 250px;    /* Increased width */
    height: 100px;
    padding: 20px;   /* Increased padding to make it larger */
    font-size: 16px; /* Optionally increase font size */
}

.profile-detail h3{
    padding-bottom: .7rem;
    font-size: 1.5rem;
    text-transform: capitalize;
    color:#000;

}
.profile-detail .flex-btn{
    justify-content: space-evenly;
}
.profile-detail .flex-btn .btn{
    margin: 0 .5rem;
}
.profile-detail img{
    width: 9rem;
    height: 9rem;
    border-radius: 50%;
    padding: .5rem;
    object-fit: cover;
    margin-bottom: .5rem;
    background-color: var(--main-color);
}
.header .navbar{
    display: flex;
    margin: .5rem 0;
}
.header .navbar a{
    font-size: 1.3rem;
    margin: 0 .5rem;
    text-transform: capitalize;
    color: #000;
}
.header .navbar a:hover{
    color:var(--main-color)
}
/* Logo */
.header .logo img {
    width: 130px;
    height: auto;
}

/* Navbar Links */
.navbar {
    display: flex;
    gap: 1.5rem;
}

.navbar a {
    font-size: 1.2rem;
    color: var(--main-color);
    text-transform: capitalize;
    transition: color 0.3s ease;
}

.navbar a:hover {
    color: var(--black-color);
}

.header form button:hover {
    color: var(--black-color);
}

/* Icons */
.icons {
    display: flex;
    align-items: center;
    gap: 1rem;
    font-size: 1.5rem;
    cursor: pointer;
}

.icons a {
    position: relative;
    color: var(--main-color);
    transition: color 0.3s ease;
}

.icons a:hover {
    color: var(--black-color);
}

/* Notification Count */
.icons a sup {
    position: absolute;
    top: -5px;
    right: -10px;
    background: red;
    color: white;
    font-size: 0.8rem;
    padding: 3px 6px;
    border-radius: 50%;
}
/* Reset and Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
    list-style: none;
}

/* Variables */
:root {
    --space: 2rem;
    --main-color: #2a1a0f;
    --black-color: #3a3a3a;
    --black-opacity: #4e3b31;
    --white-alpha-40: rgba(225, 225, 225, 0.40);
    --white-alpha-25: rgba(225, 225, 225, 0.25);
    --backdrop-filter: blur(5px);
    --box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.40);
}

/* Global Styling */


html {
    scroll-behavior: smooth;
}

/* Button Styling */
.btn {
    background-color: var(--white-alpha-25);
    border: 2px solid var(--white-alpha-40);
    backdrop-filter: var(--backdrop-filter);
    box-shadow: var(--box-shadow);
    text-transform: capitalize;
    color: var(--main-color);
    padding: .8rem 2rem;
    border-radius: 1.5rem;
    font-size: 20px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.btn::before {
    position: absolute;
    content: '';
    top: 0;
    left: 0;
    height: 100%;
    width: 0;
    border-radius: 30px;
    background-color: var(--main-color);
    z-index: 0;
    transition: width 0.3s ease;
}

.btn:hover::before {
    width: 100%;
}

.btn:hover {
    color: #fff;
}

/* Empty State Styling */
.empty {
    background-color: var(--white-alpha-25);
    border: 2px solid var(--white-alpha-40);
    backdrop-filter: var(--backdrop-filter);
    box-shadow: var(--box-shadow);
    text-transform: capitalize;
    color: var(--main-color);
    padding: 1.5rem;
    text-align: center;
}

.empty p {
    font-size: 20px;
    margin-bottom: 2rem;
}

/* Input Styling */
input[type='submit'] {
    cursor: pointer;
}

input[type='submit']:hover {
    color: var(--main-color);
}

/* Grid Box Container */
.box-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
    align-items: center;
}

.box-container .box {
    background-color: var(--white-alpha-25);
    border: 2px solid var(--white-alpha-40);
    backdrop-filter: var(--backdrop-filter);
    box-shadow: var(--box-shadow);
    text-transform: capitalize;
    margin: 1rem;
}


.heading span {
    color: var(--main-color);
    text-transform: capitalize;
    font-size: 16px;
}

.heading img {
    margin-top: .5rem;
    width: 150px !important;
}

/* Post Editor */
section.post-editor {
    width: 75vw;
    min-height: 100vh;
    padding: 4%;
    margin: 8% 5%;
    margin-bottom: 2%;
}

/* Flex Buttons */
.flex-btn {
    display: flex;
    justify-content: space-between;
}

.flex-btn .btn {
    margin: 5rem;
}
.banner{
    width:100%;
    height: 80vh;
    background-image: url("../image/homebg_image.png");
    background-position: center center;
    background-size: cover;
    display: flex;
    align-items: center;
}
.banner .detail{
    place-content: 4%;
    color: gray;
    line-height: 1.5;
}
.banner .detail p{
    font-size: 16px;
    margin-bottom: 1rem;
}
.banner .detail span{
    text-transform: uppercase;
    font-size: 1.1rem;
    margin-top: 1rem;
}
.banner .detail span a{
    color: var(--main-color);
}
.banner .detail span a i{
    margin: 0 1rem;

}
/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 5px;
}

::-webkit-scrollbar-thumb {
    border-radius: 20px;
    height: 40px;
    margin-top: 30px;
    margin-bottom: 30px;
    background-color: var(--black-color);
}

::-webkit-scrollbar-track {
    background-color: transparent;
    border-radius: 20px;
    height: 40px;
    margin-top: 30px;
    margin-bottom: 30px;
    margin-right: 10px;
    margin-left: 10px;
}
</style>
        