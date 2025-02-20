<?php
// Array of products with their details
$products = [
    [
        'image' => 'image/price1.1.jpg',
        'discount' => '20%',
        'title' => '2BHK+ Wooden Stuff+Furnish house',
        'price' => '€200-€250',
    ],
    [
        'image' => 'image/price2.jpg',
        'discount' => 'Latest Design',
        'title' => '3BHK+Balcony',
        'price' => '€360-€400',
    ],
    [
        'image' => 'image/price3.jpg',
        'discount' => '25%',
        'title' => '2BHK+kids safty',
        'price' => '€320-€350',
    ],
    [
        'image' => 'image/price4.jpg',
        'discount' => 'Fixed Price',
        'title' => '2BHK+Fancy decoration',
        'price' => '€210-€245',
    ],
    [
        'image' => 'image/price5-2.jpg',
        'discount' => 'Classic Design',
        'title' => 'Dining Room+classicDesign',
        'price' => '€200-€250',
    ],
    [
        'image' => 'image/price6.1.jpg',
        'discount' => 'Clean & glass Interior',
        'title' => 'Washroom + Luxuary Design + Metallic gray',
        'price' => '€400-€450',
    ],
    [
        'image' => 'image/price6.jpg',
        'discount' => 'Negotiable',
        'title' => 'Multicolor Contrast Kitchen',
        'price' => '€220-€250',
    ],
    [
        'image' => 'image/price11.1.jpg',
        'discount' => 'Special Discount 35%',
        'title' => 'Mirror and shining Marbel',
        'price' => '€400-€450',
    ],
    [
        'image' => 'image/price7.1.jpg',
        'discount' => 'Only Cheque accepting',
        'title' => 'Outdoor Home Park Decor + Fireplace',
        'price' => '€210-€250',
    ],
    [
        'image' => 'image/price8.jpg',
        'discount' => 'Expensive layout view + Discount15%',
        'title' => 'Seamlessly Blend Indoor and Outdoors Spaces + swimming pool',
        'price' => '€550-€650',
    ],
    [
        'image' => 'image/price9.jpg',
        'discount' => 'No Discount + All Form Of Payment Accepting',
        'title' => 'Home Decor Classic Interior + Lighting',
        'price' => '€300-€350',
    ],
    [
        'image' => 'image/price10.jpg',
        'discount' => 'Special Discount10%',
        'title' => 'Traditional Makeover + Colorfull glasses',
        'price' => '€500-550',
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Responsive full website</title>
    <link rel="stylesheet" href="pricing.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body style="background-image:url(image/homebgimage5.jpg); background-repeat: no-repeat; background-size: cover;" >
    
    <section class="main-home">
        <div class="main-text">
            <h4><a href="customers.php" class="main-btn"><b>Book Now</b><i class='bx bx-right-arrow-alt'></i></a></h4>  
        </div>
        <div class="down-arrow">
            <a href="#trending" class="down"><i class='bx bx-down-arrow-alt'></i></a>
        </div>
    </section>

    <!-- trending-products-section -->
    <section class="trending-products" id="trending">
        <div class="center-text">
            <h2>Our Trending <span>Products</span></h2>
        </div>
        <div class="products">
            <div class="row">
                <?php foreach($products as $index => $product): ?>
                    <div class="product">
                        <img src="<?= $product['image']; ?>" alt="">
                        <div class="product-text">
                            <h5><?= $product['discount']; ?></h5>
                        </div>
                        <div class="heart-icon">
                            <i class='bx bx-heart'></i>
                        </div>
                        <div class="rating">
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bxs-star-half'></i>
                        </div>
                        <div class="price">
                            <h4><?= $product['title']; ?></h4>
                            <p><?= $product['price']; ?></p>
                        </div>
                    </div>
                    <?php if (($index + 1) % 4 == 0) echo '</div><div class="row">'; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- Back to Home Button -->
    <div class="back-to-home">
        <a href="home.php" class="btn btn-primary">Back to Home</a>
    </div>
            
    </section>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
            font-family: 'Poppins', sans-serif;
            list-style: none;
            text-decoration: none;
        }



        section {
            padding: 5% 10%;
        }

        .main-home {
            width: 100%;
            height: auto;
            background-position: center;
            background-size: cover;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            align-items: center;
        }

        .center-text h2 {
            color: #111;
            font-size: 28px;
            text-transform: capitalize;
            text-align: center;
            margin-bottom: 30px;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .product {
            position: relative;
            transition: all 0.4s;
            border-radius: 10px;
            overflow: hidden;
        }

        .product img {
            width: 100%;
            max-width: 250px;
            max-height: 250px;
            transition: all 0.4s;
            border-radius: 10px;
        }

        .product:hover img {
            transform: scale(0.95);
        }

        .product-text h5 {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #fff;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            padding: 3px 10px;
            border-radius: 3px;
        }

        .heart-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            color: #333;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .heart-icon:hover {
            color: #ee1c47;
        }

        .rating i {
            color: #ffa500;
            font-size: 18px;
            margin: 5px 0;
        }

        .price h4 {
            color: #000000;
            font-size: 16px;
            text-transform: capitalize;
            font-weight: 500;
        }

        .price p {
            color: #151515;
            font-size: 14px;
            font-weight: 600;
        }
        .main-home{
    width: cover;
    height: cover;
    background-position: 0;
    background-size: cover;
    display: grid;
    grid-template-columns: repeat(1,1fr);
    align-items:center;
}
.main-text h5{
    color: #ee1c47;
    font-size: 16px;
    text-transform: capitalize;
    font-weight: 500;
}
.main-text h1{
    color: #000;
    font-size: 65px;
    text-transform:capitalize;
    line-height: 1.1;
    font-weight: 600;
    margin: 6px 0 10px;
}
.main-btn{
    display: inline-block;
    color: #ffffff;
    font-size: 18px;
    font-weight: 500;
    backdrop-filter: blur(20px);  
    text-transform: capitalize;
    border: 2px solid #ffffff;
    padding: 12px 25px;
    transition: all .42s ease;
}
.main-btn:hover{
    background-color: #000;
    color: #fff;
}
.main-btn i{
    vertical-align: middle;
}
.down-arrow{
    position: absolute;
    top: 10%;
    right: 60%
}
.down i{
    font-size: 30px;
    color: #2c2c2c;
    border: 2px solid #2c2c2c;
    border-radius: 50px;
    padding: 12px 12px;
}
.down i:hover{
    background-color: #2c2c2c;
    color: #fff;
    transition: all .42s ease;
} 

.back-to-home {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}

.back-to-home .btn {
    background-color:rgb(65, 7, 36); /* Button background color */
    color: white; /* Button text color */
    padding: 10px 20px; /* Button padding */
    font-size: 16px; /* Font size */
    text-align: center; /* Center the text inside the button */
    border-radius: 5px; /* Rounded corners */
    text-decoration: none; /* Remove underline from the link */
    display: inline-block; /* To make it behave like a button */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transitions for hover effects */
}

.back-to-home .btn:hover {
    background-color:rgb(20, 20, 21); /* Darker shade of blue on hover */
    transform: scale(1.05); /* Slightly increase the size on hover */
}

.back-to-home .btn:focus {
    outline: none; /* Remove outline on focus */
}


        /* Resize images for smaller screens */
        @media screen and (max-width: 768px) {
            .product img {
                max-width: 230px;
                max-height: 230px;
            }
        }

        @media screen and (max-width: 480px) {
            .product img {
                max-width: 180px;
                max-height: 180px;
            }

            .products {
                grid-template-columns: 1fr; /* For mobile devices, show 1 column */
            }
        }
    </style>
    
</body>
</html>
