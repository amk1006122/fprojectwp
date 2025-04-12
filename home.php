<?php
include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
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
    <title>LAYOUT & HOME DECOR - home page</title>
    <link rel="stylesheet" type="text/css" href="css/user_style.css">
    <!--- Font Awesome -->
    <!--box icon cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">

</head>
<body>
    <?php include 'components/user_header.php'; ?>


    <!--slider section start-->
    <div class="slider-container">
        <div class="slider">
            <div class="slideBox active">
                <div class="textBox">
                    <h1>we pride ourselfs on <br> exceptional designs</h1>
                    <a href="menu.php" class="btn">shop now</a>
                </div>
                <div class="imgBox">
                    <img src="image/slider1.jpg">
                </div>
            </div>
            <div class="slideBox">
                <div class="textBox">
                    <h1>The right home decor can transform any room into a sanctuary, <br> blending functionality with aesthetic appeal to suit individual tastes."</h1>
                    <a href="menu.php" class="btn">shop now</a>
                </div>
                <div class="imgBox">
                    <img src="image/slider2.jpg">
                </div>
            </div>
        </div>
        <ul class="controls">
            <li onclick="nextSlide();" class="next"><i class="bx bx-right-arrow-alt"></i></li>
            <li onclick="prevSlide();" class="prev"><i class="bx bx-left-arrow-alt"></i></li>
        </ul>
    </div>
    <!--slider section end-->
    <div class="service">
        <div class="box-container">
            <!--service item box-->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/freedeliver.png" class="img1">
                        <!-- <img src="image/services1.png" class="img2"> -->
                    </div>
                </div>
                <div class="detail">
                    <h4>delivery</h4>
                    <span>100% secure</span>
                </div>
            </div>
            <!--service item box-->
            <!--service item box-->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/payment.png" class="img1">
                        <!-- <img src="image/services3.png" class="img2"> -->
                    </div>
                </div>
                <div class="detail">
                    <h4>payment</h4>
                    <span>100% secure</span>
                </div>
            </div>
            <!--service item box-->
            <!--service item box-->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/support.png" class="img1">
                        <!-- <img src="image/services5.png" class="img2"> -->
                    </div>
                </div>
                <div class="detail">
                    <h4>support</h4>
                    <span>24*7 hours</span>
                </div>
            </div>
            <!--service item box-->
            <!--service item box-->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/gift.png" class="img1">
                        <!-- <img src="image/services5.png" class="img2"> -->
                    </div>
                </div>
                <div class="detail">
                    <h4>Gift service</h4>
                    <span>support Gift services</span>
                </div>
            </div>
            <!--service item box-->
            <!--service item box-->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/returns.png" class="img1">
                        <!-- <img src="image/services7.png" class="img2"> -->
                    </div>
                </div>
                <div class="detail">
                    <h4>returns</h4>
                    <span>24*7 free return</span>
                </div>
            </div>
            <!--service item box-->
            <!--service item box-->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/deliver.jpg" class="img1">
                        <!-- <img src="image/services1.png" class="img2"> -->
                    </div>
                </div>
                <div class="detail">
                    <h4>deliver</h4>
                    <span>100% secure</span>
                </div>
            </div>
            <!--service item box-->
        </div>
    </div>
    <!--service section end-->
    <div class="catagories">
        <div class="heading">
            <h1>catagories features</h1>
            <img src="image/cheadimg.jpg">
        </div>
        <div class="box-container">
            <div class="box">
                <img src="image/furniturecimg.jpg">
                <a href="menu.php" class="btn">Furniture</a>
            </div>
            <div class="box">
                <img src="image/lightiningcimg.jpg">
                <a href="menu.php" class="btn">Lighting</a>
            </div>
            <div class="box">
                <img src="image/textilescimg.jpg">
                <a href="menu.php" class="btn">Textiles</a>
            </div>
            <div class="box">
                <img src="image/wallartcimg.png">
                <a href="menu.php" class="btn">Wall Art</a>
            </div>
            <div class="box">
                <img src="image/kitchenanddinningcimg.jpg">
                <a href="menu.php" class="btn">Kitchen and Dining</a>
            </div>
            <div class="box">
                <img src="image/outdoordecorcimg.jpg">
                <a href="menu.php" class="btn">Outdoor Decor</a>
            </div>
        </div>
    </div>
    <!--categories section end-->
    <img src="image/menu-banner.jpg" class="menu-banner">
    <div class="design">
        <div class="heading">
            <span>Design</span>
            <h1>If you buy before April you get @ earlybird discount </h1>
            <img src="image/cheadimg.jpg">
        </div>
        <div class="box-container">
            <div class="box">
                <img src="image/dmodernimg.png">
                <div class="detail">
                    <h2>classic decoration</h2>
                    <h1>Modern</h1>
                </div>
            </div>
            <div class="box">
                <img src="image/dcontemporaryimg.png">
                <div class="detail">
                    <h2>classic decoration</h2>
                    <h1>Contemporary</h1>
                </div>
            </div>
            <div class="box">
                <img src="image/dtraditionalimg.png">
                <div class="detail">
                    <h2>classic decoration</h2>
                    <h1>Traditional</h1>
                </div>
            </div>
        </div>
    </div>
    <!--design section end-->
    <div class="Decorative-trays">
        <div class="overlay"></div>
        <div class="detail">
            <h1>Decorative trays add both elegance <br>and functionality to your home</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. <br>Provident, earum quisquam. Excepturi minus 
            accusamus explicabo ea, commodi impedit consectetur <br>assumenda dignissimos debitis quis nam delectus 
            tempora sed quaerat expedita aliquid?</p>
            <a href="menu.php" class="btn">shop now</a>
        </div>
    </div>
    <!--container section end-->
    <div class="design2">
        <div class="d-banner">
            <div class="overlay"></div>
                <div class="detail">
                <h1>find your style or design for your home</h1>
                <p>Accessories are the "jewelry" of the room.</p>
                <a href="menu.php" class="btn">shop now</a>
                </div>
            <div class="box-container">
                <div class="box">
                    <div class="box-overlay"></div>
                    <img src="image/hdecorativeimg1.jpg">
                    <div class="box-details fadeIn-bottom">
                        <h1>Decorative-trays</h1>
                        <p>find your style or design for your home</p>
                        <a href="menu.php" class="btn">explore more</a>
                    </div>
                </div>
                <div class="box">
                    <div class="box-overlay"></div>
                    <img src="image/hdecorativeimg2.jpg">
                    <div class="box-details fadeIn-bottom">
                        <h1>Decorative-trays</h1>
                        <p>find your style or design for your home</p>
                        <a href="menu.php" class="btn">explore more</a>
                    </div>
                </div>
                <div class="box">
                    <div class="box-overlay"></div>
                    <img src="image/hdecorativeimg3.jpg">
                    <div class="box-details fadeIn-bottom">
                        <h1>Decorative-trays</h1>
                        <p>find your style or design for your home</p>
                        <a href="menu.php" class="btn">explore more</a>
                    </div>
                </div>
                <div class="box">
                    <div class="box-overlay"></div>
                    <img src="image/hdecorativeimg4.jpg">
                    <div class="box-details fadeIn-bottom">
                        <h1>Decorative-trays</h1>
                        <p>find your style or design for your home</p>
                        <a href="menu.php" class="btn">explore more</a>
                    </div>
                </div>
                <div class="box">
                    <div class="box-overlay"></div>
                    <img src="image/hdecorativeimg5.jpg">
                    <div class="box-details fadeIn-bottom">
                        <h1>Decorative-trays</h1>
                        <p>find your style or design for your home</p>
                        <a href="menu.php" class="btn">explore more</a>
                    </div>
                </div>
                <div class="box">
                    <div class="box-overlay"></div>
                    <img src="image/hdecorativeimg6.jpg">
                    <div class="box-details fadeIn-bottom">
                        <h1>Decorative-trays</h1>
                        <p>find your style or design for your home</p>
                        <a href="menu.php" class="btn">explore more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--container section end-->
    <div class="style">
        <div class="box-container">
            <img src="image/hbannerimg.jpg">
            <div class="detail">
                <h1>Hot Deal ! Sale Up To <span>30% 0ff</span></h1>
                <p>expired</p>
                <a href="menu.php" class="btn">shop now</a>
            </div>
        </div>
    </div>
    <!--design section end-->
    <div class="usage">
        <div class="heading">
            <h1>How it works</h1>
            <img src="image/cheadimg.jpg">
        </div>
        <div class="row">
            <div class="box-container">
                <div class="box">
                    <img src="image/homediconimg.png">
                    <div class="detail">
                        <h3>scoop home decor</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Maxime dolore alias repellat voluptatum laborum assumenda odio 
                        provident, molestiae esse laboriosam facere culpa consequatur officia 
                        voluptate vero dolorum! Consectetur, illo temporibus!
                        </p>
                    </div>
                </div>
                <div class="box">
                    <img src="image/homediconimg1.png">
                    <div class="detail">
                        <h3>scoop home decor</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Maxime dolore alias repellat voluptatum laborum assumenda odio 
                        provident, molestiae esse laboriosam facere culpa consequatur officia 
                        voluptate vero dolorum! Consectetur, illo temporibus!
                        </p>
                    </div>
                </div>
                <div class="box">
                    <img src="image/homedeconimg2.png">
                    <div class="detail">
                        <h3>scoop home decor</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Maxime dolore alias repellat voluptatum laborum assumenda odio 
                        provident, molestiae esse laboriosam facere culpa consequatur officia 
                        voluptate vero dolorum! Consectetur, illo temporibus!
                        </p>
                    </div>
                </div>
            </div>
            <img src="" class="divider">
            <div class="box-container">
                <div class="box">
                    <img src="image/homedeconimg3.jpg">
                    <div class="detail">
                        <h3>scoop home decor</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Maxime dolore alias repellat voluptatum laborum assumenda odio 
                        provident, molestiae esse laboriosam facere culpa consequatur officia 
                        voluptate vero dolorum! Consectetur, illo temporibus!
                        </p>
                    </div>
                </div>
                <div class="box">
                    <img src="image/homedconimg4.jpg">
                    <div class="detail">
                        <h3>scoop home decor</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Maxime dolore alias repellat voluptatum laborum assumenda odio 
                        provident, molestiae esse laboriosam facere culpa consequatur officia 
                        voluptate vero dolorum! Consectetur, illo temporibus!
                        </p>
                    </div>
                </div>
                <div class="box">
                    <img src="image/homedconimg5.jpg">
                    <div class="detail">
                        <h3>scoop home decor</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Maxime dolore alias repellat voluptatum laborum assumenda odio 
                        provident, molestiae esse laboriosam facere culpa consequatur officia 
                        voluptate vero dolorum! Consectetur, illo temporibus!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--usage section end-->
    <div class="pride">
        <div class="detail">
            <h1>we pride Ourselves on <br> our brands.</h1>
            <p>Lorem, ipsum dolor sit amet consectetur <br> adipisicing elit. 
            Itaque quae excepturi laudantium . </p>
            <a href="menu.php" class="btn">shop now</a>
        </div>
    </div>
    <!--pride section end-->
    <?php include 'components/footer.php';?>
    <!--sweetalert cdn link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!--custom js file link-->
    <script src="js/user_script.js"></script>


    <?php include 'components/alert.php'; ?>
</body>
</html>