<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homedecor_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all customers for the customer dropdown
$customers_sql = "SELECT * FROM Customers";
$customers_result = $conn->query($customers_sql);

// Handle form submission to add an order
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_order'])) {
    $customer_id = $_POST['customer_id'];
    $order_date = $_POST['order_date'];
    $total_amount = $_POST['total_amount'];
    $status = $_POST['status'];
    $shipping_address = $_POST['shipping_address'];
    $payment_method = $_POST['payment_method'];
    $payment_status = $_POST['payment_status'];
    $tracking_number = $_POST['tracking_number'];

    // Insert order into the Orders table
    $insert_order_sql = "INSERT INTO Orders (customer_id, order_date, total_amount, status, shipping_address, payment_method, payment_status, tracking_number) 
                        VALUES ('$customer_id', '$order_date', '$total_amount', '$status', '$shipping_address', '$payment_method', '$payment_status', '$tracking_number')";
    
    if ($conn->query($insert_order_sql) === TRUE) {
        echo "New order added successfully!<br>";
    } else {
        echo "Error: " . $conn->error . "<br>";
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order</title>
</head>
<body>
    <h1>Add New Order</h1>

    <!-- Form to add new order -->
    <form action="admin_order.php" method="POST">
        <label for="customer_id">Customer Name:</label>
        <select name="customer_id" required>
            <?php
            // Loop through the fetched customer data and create dropdown options
            if ($customers_result->num_rows > 0) {
                while ($customer = $customers_result->fetch_assoc()) {
                    echo "<option value='" . $customer['customer_id'] . "'>" . $customer['name'] . "</option>";
                }
            } else {
                echo "<option>No customers available</option>";
            }
            ?>
        </select><br>

        <label for="order_date">Order Date:</label>
        <input type="datetime-local" name="order_date" required><br>

        <label for="total_amount">Total Amount:</label>
        <input type="number" step="0.01" name="total_amount" required><br>

        <label for="status">Status:</label>
        <input type="text" name="status" required><br>

        <label for="shipping_address">Shipping Address:</label>
        <input type="text" name="shipping_address" required><br>

        <label for="payment_method">Payment Method:</label>
        <input type="text" name="payment_method"><br>

        <label for="payment_status">Payment Status:</label>
        <input type="text" name="payment_status"><br>

        <label for="tracking_number">Tracking Number:</label>
        <input type="text" name="tracking_number"><br>

        <button type="submit" name="add_order">Add Order</button>
    </form>
    
    <br><br>

    <a href="customers.php">Go to Customer Form</a>

    <div class="contact">
                <h1>If you want more information regarding your order <br>
            free to contact us here </h1>
            </div>

            <a href="ordercontact.php" class="button">Contact Us</a>
    <!-- Link to go to the Customer page -->
        <style>
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
    --main-color: #2a1a0f; /* Dark brown */
    --highlight-color:rgb(36, 26, 22); /* Coral */
    --black-color: #3a3a3a;
    --white-alpha-40: rgba(225, 225, 225, 0.40);
    --backdrop-filter: blur(5px);
    --box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.40);
}

/* Global Styling */
body {
    background-image: url('image/homebgimage4.jpg');
    background-repeat: no-repeat;
    background-position: center;
    font-family: Arial, sans-serif;
    color: #333;
    line-height: 1.6;
    padding: 20px;
}

/* Main Heading */
h1 {
    text-align: center;
    color: var(--main-color);
    margin-bottom: 20px;
}

/* Form Container */
form {
    width: 60%;
    margin: 0 auto;
    background-color: rgba(255, 255, 255, 0.9);
    padding: 30px;
    border-radius: 10px;
    box-shadow: var(--box-shadow);
}

label {
    font-size: 1.1rem;
    color: var(--main-color);
    margin-bottom: 8px;
    display: block;
}

input, select {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid var(--black-color);
    font-size: 1rem;
}

/* Button Styling */
button[type="submit"] {
    background-color: var(--main-color);
    color: white;
    padding: 12px 20px;
    font-size: 1.2rem;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    border: none;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #3a1d0f;
}

/* Link Styling */
a {
    display: inline-block;
    margin-top: 20px;
    font-size: 1.1rem;
    color: var(--highlight-color);
    text-decoration: none;
    transition: color 0.3s ease;
}

a:hover {
    color:rgb(47, 32, 31);
}

/* Contact Section */
.contact {
    text-align: center;
    margin-top: 40px;
}

.contact h1 {
    color: var(--black-color);
    font-size: 1.5rem;
    margin-bottom: 20px;
}

/* Contact Us Button */
.button {
    background-color: var(---main-color);
    color: white;
    padding: 12px 20px;
    font-size: 1.2rem;
    border-radius: 5px;
    display: inline-block;
    margin-top: 20px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color:rgb(16, 15, 15);
}

/* Responsive Design */
@media (max-width: 768px) {
    form {
        width: 100%;
    }
}

        </style>
    
</body>
</html>
