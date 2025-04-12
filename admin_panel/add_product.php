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
    //  else {
    //     echo "Database connected successfully!";
    // }

    // Ensure seller_id is set (e.g., from session)
    $seller_id = isset($_SESSION['seller_id']) ? $_SESSION['seller_id'] : 0;

    // Add product in database
    if(isset($_POST['publish'])){

        // Clean input values
        $id = uniqid();
        $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $stock = filter_var($_POST['stock'], FILTER_SANITIZE_NUMBER_INT);
        $status = 'active';

        // Handle file upload
        $image = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_folder = '../uploaded_files/' . $image;

        // Check if the image already exists for the seller
        $select_image = $conn->prepare("SELECT * FROM products WHERE image=? AND seller_id=?");
        $select_image->bind_param("si", $image, $seller_id);
        $select_image->execute();
        $result = $select_image->get_result();

        if (isset($image)) {
            if($result->num_rows > 0) {
                $warning_msg[] = 'Image name is already taken';
            } elseif ($image_size > 5000000) {
                $warning_msg[] = 'Image size is too large';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
            }
        } else {
            $image = '';
        }

        // Insert product into database
        if ($result->num_rows == 0 && $image != '') {
            $insert_product = $conn->prepare("INSERT INTO products(id, name, price, stock, product_detail, image, status, seller_id) VALUES (?,?,?,?,?,?,?,?)");
            $insert_product->bind_param("ssdisdsi", $id, $name, $price, $stock, $description, $image, $status, $seller_id);
            $insert_product->execute();

            $success_msg[] = 'Product inserted successfully!';
        } else {
            $warning_msg[] = 'Failed to insert product.';
        }

    }

    // Add product as draft
    if(isset($_POST['draft'])){

        $id = uniqid();
        $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $stock = filter_var($_POST['stock'], FILTER_SANITIZE_NUMBER_INT);
        $status = 'inactive';

        $image = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_folder = '../uploaded_files/' . $image;

        $select_image = $conn->prepare("SELECT * FROM products WHERE image=? AND seller_id=?");
        $select_image->bind_param("si", $image, $seller_id);
        $select_image->execute();
        $result = $select_image->get_result();

        if (isset($image)) {
            if ($result->num_rows > 0) {
                $warning_msg[] = 'Image name is already taken';
            } elseif ($image_size > 5000000) {
                $warning_msg[] = 'Image size is too large';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
            }
        } else {
            $image = '';
        }

        if ($result->num_rows == 0 && $image != '') {
            $insert_product = $conn->prepare("INSERT INTO products(id, name, price, stock, product_detail, image, status, seller_id) VALUES (?,?,?,?,?,?,?,?)");
            $insert_product->bind_param("ssdisdsi", $id, $name, $price, $stock, $description, $image, $status, $seller_id);
            $insert_product->execute();

            $success_msg[] = 'Product saved as draft successfully!';
        } else {
            $warning_msg[] = 'Failed to save product as draft.';
        }

    }

      ?>


       <!DOCTYPE html>
       <html>
       <head>
             <meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <title>Homedecor- Add product page</title>
             <link rel="stylesheet" type="text/css" href="css/style.css">
        <!--- Font Awesome -->
        <!--box icon cdn link-->
               <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">
               <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">

        </head>
         <body>
         <div class="main-container">
           <?php include '../components/connect.php'; ?>
           <section class="post-editor">
            <div class="heading">
                <h1>Add Product</h1>
                <img src="../image/backe.jpg">
                
         </div>
            <style>
        /* General Styles */
      .body {
           font-family: Arial, sans-serif;
           background-color: #f4f4f4;
           background-image: url(image/about1.jpg);
           margin: 0;
           padding: 0;
           }

           /* Main Container */
           .main-container {
           width: 80%;
           max-width: 800px;
           margin: 20px auto;
           background: white;
           padding: 20px;
           border-radius: 10px;
           box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
           }
    
       /* Heading */
          .heading {
           text-align: center;
           margin-bottom: 20px;
          }

          .heading img {
           width: 100%;
           height: auto;
           border-radius: 10px;
         }
   
         /* Form Styles */
           .form-container {
            display: flex;
            justify-content: center;
            flex-direction: column;
           }

           .input-field {
           margin-bottom: 15px;
          }

           .input-field p {
           font-weight: bold;
           margin-bottom: 5px;
         }

           .input-field span {
           color: red;
         }

       .box {
         width: 100%;
         padding: 10px;
         border: 1px solid #ddd;
         border-radius: 5px;
        }

        .flex-btn {
         display: flex;
         gap: 10px;
        justify-content: space-between;
         }

          .btn {
         background: #ff5e57;
         color: white;
         padding: 10px;
         border: none;
         cursor: pointer;
         border-radius: 5px;
         text-align: center;
         width: 100%;
     }

         .btn:hover {
         background: red;
    }
         /* Responsive */
         @media (max-width: 600px) {
          .main-container {
          width: 95%;
            }
         .flex-btn {
           flex-direction: column;
         }
      }

     </style>
        <div class="form-container">
            <form action="" method="post" enctype="multipart/form-data" class="register">
                <div class="input-field">
                    <p>Product name <span>*</span></p>
                    <input type="text" name="name" maxlength="100" placeholder="add product name" required class ="box">
                </div>
                <div class="input-field">
                    <p>Product Price <span>*</span></p>
                    <input type="number" name="price" maxlength="100" placeholder="add product price" required class ="box">
                </div>
                <div class="input-field">
                    <p>Product Detail <span>*</span></p>
                    <textarea name="description" required maxlength="1000" placeholder="add product detail"  required class ="box"></textarea>
                    </div>
                    <div class="input-field">
                    <p>Product Stock <span>*</span></p>
                    <input type="number" name="stock" maxlength="10" min="0" max="99999999999" 
                    placeholder="add product stock" required class ="box">
                    </div>
                    <div class="input-field">
                    <p>Product Image <span>*</span></p>
                    <input type="file" name="image" accept="image/*" required class ="box">
                    </div>
                    <div class="flex-btn">
                        <input type="submit" name="publish" value="add product" class="btn"> 
                        <input type="submit" name="draft" value="save as draft" class="btn">
                    </div>
        </form>
        </div>
        </section>
        </div>

            <!--sweetalert cdn link-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <!--custom js file link-->
        <script src="../js/script.js"></script>
        <?php include '../components/alert.php'; ?>
        </body>
        </html>






































































































































































































































































<style>
 /* General Styles */
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    background-image: url(image/about1.jpg);
    margin: 0;
    padding: 0;
  }

/* Main Container */
.main-container {
    width: 80%;
    max-width: 800px;
    margin: 20px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
   }
    
     /* Heading */
   .heading {
    text-align: center;
    margin-bottom: 20px;
}

    .heading img {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

    /* Form Styles */
    .form-container {
    display: flex;
    justify-content: center;
    flex-direction: column;
}

.input-field {
    margin-bottom: 15px;
}

.input-field p {
    font-weight: bold;
    margin-bottom: 5px;
}

.input-field span {
    color: red;
}

.box {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.flex-btn {
    display: flex;
    gap: 10px;
    justify-content: space-between;
}

.btn {
    background: #ff5e57;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
    width: 100%;
}

.btn:hover {
    background: #d9534f;
}
/* Responsive */
@media (max-width: 600px) {
    .main-container {
        width: 95%;
    }
    .flex-btn {
        flex-direction: column;
    }
}

     </style>