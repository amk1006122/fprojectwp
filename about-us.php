<?php 
include 'components/connect.php';
if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homedecor - About Us</title>
    <link rel="stylesheet" href="css/user_style.css">



    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Swiper CSS (For Team Section Slider) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    
    <style>
        /* Additional CSS for responsive images */
        img {
            max-width: 100%;
            height: auto;
        }

        .image {
            object-fit: cover;
        }

        .image img {
            width: 90%;
            max-width: 100%;
        }

        /* Add Styles for Service and Top Designs Sections */
        .service {
            padding: 50px 0;
            background-color: #f4f4f4;
        }

        .service .box-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .service .box {
            width: 30%;
            background-color: white;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .service .box i {
            font-size: 50px;
            color: #333;
            margin-bottom: 20px;
        }

        .Designs .box-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .Designs .box {
            width: 30%;
            margin-bottom: 20px;
        }

        .Designs .box img {
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 768px) {
            .service .box, .Designs .box {
                width: 45%;
            }
        }

        @media (max-width: 480px) {
            .service .box, .Designs .box {
                width: 90%;
            }
        }
    </style>
</head>

<div>
    <!-- PHP Header Include -->
    <?php include 'components/user_header.php'; ?>

    <!-- About Section -->
    <section class="section about container-fluid p-0" id="About">
        <h1 class="heading">About Us</h1>
        <div class="row align-items-center">
            <div class="col-md-6 image">
                <img src="image/about.jpg"  alt="About Home Decor">
            </div>
            <style>
      .about{
       background-image: url(../image/about.jpg);
       background-repeat: no-repeat;
       background-size: cover;
       background-position: center center;
       padding: 60px 0;
       background-color: #f4f4f4;
       text-align: center;
     }

    .about .row {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    }

.about .image {
    flex: 1;
    text-align: center;
}

   .about .info {
    flex:1;
    text-align: left;
    padding: 30px;
  }

   .about .icons a {
    font-size: 26px;
    margin: 10px;
    color: blueviolet;
    text-decoration: none;
    margin-bottom: 16px;
    transition: color 0.3s;
   }

    .about .icons a:hover {
    color: blue;
   }
</style>
            <div class="col-md-6 info">
                <div class="h2">The Best Designers</div>
                <p>We believe your home is a reflection of your personality, and we are here to help you express it. 
                    Our journey began with a simple idea: to make beautiful, high-quality home décor accessible to everyone.
                </p>
                <p>Our mission is to transform houses into homes, blending functionality with beauty. We envision a world where
                    every living space radiates warmth, comfort, and style.
                </p>

                <div class="icons">
                    <a href="https://www.facebook.com/Home.DIY.Decor/" class="fab fa-facebook-f"></a>
                    <a href="https://www.instagram.com/interioranhomes/?hl=en" class="fab fa-instagram"></a>
                    <a href="https://www.snapchat.com/explore/decor" class="fab fa-snapchat"></a>
                    <a href="https://x.com/i/flow/login?redirect_after_login=%2Fhomedesigning" class="fab fa-twitter"></a>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Service Section Start -->
    <section class="service" id="service">
        <h1 class="heading">Our Services</h1>
        <div class="box-container">
            <div class="box">
                <i class="fas fa-palette"></i>
                <p>
                    Choose a cohesive color scheme with primary and accent tones, incorporate textures like soft fabrics, rough woods, and glossy finishes, 
                    use natural, industrial, or fabric-based materials, add patterns such as geometric or floral, select matte, define a theme like minimalist or bohemian.
                </p>
            </div>
            <div class="box">
                <i class="fas fa-couch"></i>
                <p>
                    Choose a fabric that complements your color scheme, such as neutral tones for versatility or bold colors for a statement.
                </p>
            </div>
            <div class="box">
                <i class="fas fa-tools"></i>
                <p>
                    A laser measure provides quick, accurate measurements for larger spaces, while a chalk line is helpful for creating straight lines on walls or floors.
                </p>
            </div>
            <div class="box">
            <i class="fas fa-user"></i> <!-- Displays a user icon -->
            <p>
                    For home maintenance, a house user would need basic tools such as a hammer, screwdriver set, wrench, pliers, utility knife, and tape measure.
                </p>
            </div>
            <div class="box">
                <i class="fas fa-bath"></i>
                <p>
                    For the bathroom, essential tools and items include cleaning tools like a mop, broom, microfiber cloths, toilet brush, and scrubbing brush for regular maintenance.
                </p>
            </div>
            <div class="box">
                <i class="fas fa-bed"></i>
                <p>
                    Decorative touches like throw blankets, decorative pillows, or bed skirts can add style and comfort. Additionally, tools like a screwdriver and wrench may be necessary for assembling bed frames or adjusting slats.
                </p>
            </div>
        </div>
    </section>
    <!-- Service Section End -->

    <!-- Designs Section Start -->
    <section class="Designs" id="Designs">
        <h1 class="heading">Top Designs</h1>
        <div class="box-container">
            <div class="box">
                <a href="image/img1.jpg">
                    <img src="image/img1.jpg" alt="Modern Living Room" />
                </a>
            </div>
            <div class="box">
                <a href="image/img2.jpg">
                    <img src="image/img2.jpg" alt="Stylish Kitchen" />
                </a>
            </div>
            <div class="box">
                <a href="image/img3.jpg">
                    <img src="image/img3.jpg" alt="Elegant Bathroom" />
                </a>
            </div>
            <div class="box">
                <a href="image/img4.jpg">
                    <img src="image/img4.jpg" alt="Peaceful Balcony" />
                </a>
            </div>
            <div class="box">
                <a href="image/img5.jpg">
                    <img src="image/img5.jpg" alt="Stylish Dining" />
                </a>
            </div>
            <div class="box">
                <a href="image/img6.jpg">
                    <img src="image/img6.jpg" alt="Elegant Bathroom" />
                </a>
            </div>
        </div>
    </section>
    <!-- Designs Section End -->

    <!-- Team Section with Swiper Slider -->
    <div class="team">
        <div class="heading">
            <span>Our Team</span>
            <h1>Quality & Passion with Our Services</h1>
        </div>

        <!-- Swiper Slider -->
        <div class="swiper team-slider">
            <div class="swiper-wrapper">
                <!-- Team Member 1 -->
                <div class="swiper-slide">
                    <div class="content">
                        <img src="image/tp1.jpg" alt="Binita Acharya" class="img">
                        <h2>Binita Acharya</h2>
                        <p>CEO</p>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="swiper-slide">
                    <div class="content">
                        <img src="image/tp3.jpg" alt="Prayusha Poudel" class="img">
                        <h2>Prayusha Poudel</h2>
                        <p>Marketing Head</p>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="swiper-slide">
                    <div class="content">
                        <img src="image/tp2.jpg" alt="Sakshi" class="img">
                        <h2>Sakshi</h2>
                        <p>Business Head</p>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="swiper-slide">
                    <div class="content">
                        <img src="image/tp4.jpg" alt="Rafeed Ismal" class="img">
                        <h2>Rafeed Ismal</h2>
                        <p>Interior Designer</p>
                    </div>
                </div>
            </div>

            <!-- Swiper Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    <!--team section end-->
    <!--standers section start-->
    <div class="standers">
        <div class="detail">
            <h1>Our standers</h1>
            <p>Lorem ipsum dolor sit amet.</p>
            <i class ="bx bxs-heart"></i>
            <p>Lorem ipsum dolor sit amet.</p>
            <i class ="bx bxs-heart"></i>
            <p>Lorem ipsum dolor sit amet.</p>
            <i class ="bx bxs-heart"></i>
            <p>Lorem ipsum dolor sit amet.</p>
            <i class ="bx bxs-heart"></i>
            <p>Lorem ipsum dolor sit amet.</p>
            <i class ="bx bxs-heart"></i>
        </div>
    </div>
    <!--standers section end-->
        <div class="testimonal">
            <div class="heading">
                <h1>Testimonal</h1>
                </div>
            <div class="testimonal-container">
            <div class="slide-row" id="slide">
                <div class="slide-col">
                    <div class="user-text">
                        <p>The home decor influencer has a popular YouTube channel 
                            where she shares styling tips and tricks for every room in the house.</p>
                        <h2>Jawad Yasin</h2>
                        <p>Influencer</p>
                    </div>
                    <div class="user-img">
                        <img src="image/testimonal1.jpg">
                    </div>
                </div>
                <div class="slide-col">
                    <div class="user-text">
                        <p>The home decor influencer has a popular YouTube channel 
                            where she shares styling tips and tricks for every room in the house.</p>
                        <h2>Prayusha Poudel</h2>
                        <p>Architect</p>
                    </div>
                    <div class="user-img">
                        <img src="image/tp3.jpg">
                    </div>
                </div>
            <div class="slide-col">
                    <div class="user-text">
                        <p>The stylist selected all the accessories for the photoshoot to make the living room look more inviting..</p>
                        <h2>Binita Acharya</h2>
                        <p> Stylist</p>
                    </div>
                    <div class="user-img">
                        <img src="image/testimonal2.jpg">
            </div>
        </div>
        <div class="slide-col">
                    <div class="user-text">
                        <p>The furniture designer created this custom bookshelf to match the client's modern living room decor.</p>
                        <h2>MD Maruf</h2>
                        <p>Designer</p>
                    </div>
                    <div class="user-img">
                        <img src="image/testimonal3.jpg">
                    </div>
                </div>
            </div>
        </div>
        <div class="indicator">
            <span class="btn1 active"></span>
            <span class="btn1"></span>
            <span class="btn1"></span>
            <span class="btn1"></span>
        </div>
    </div>
    <!--testimonal section end-->

    <!-- Footer Include -->


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="js/user_script.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".team-slider", {
            loop: true,
            spaceBetween: 30,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });
    </script>
    <!-- Back to Home Button -->
    <div class="back-to-home">
        <a href="home.php" class="btn btn-primary">Back to Home</a>
    </div>


</body>

</html>
