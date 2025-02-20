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

// Handle form submission to add a customer
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_customer'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Insert new customer into the Customers table
    $insert_customer_sql = "INSERT INTO Customers (name, email, phone, address) 
                            VALUES ('$name', '$email', '$phone', '$address')";
    
    if ($conn->query($insert_customer_sql) === TRUE) {
        echo "New customer added successfully!<br>";
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
    <title>Add Customer</title>
</head>
<body>
    <h1>Add New Customer</h1>

    <!-- Form to add new customer -->
    <form action="customers.php" method="POST">
        <label for="name">Customer Name:</label>
        <input type="text" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br>

        <label for="address">Address:</label>
        <input type="text" name="address" required><br>

        <button type="submit" name="add_customer">Add Customer</button>
    </form>

    <br><br>

    <!-- Link to go to the Orders page -->
    <a href="admin_order.php">Go to Order Form</a>

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
    box-shadow:var(--box-shadow) ;
    background-color: transparent;
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
    background-image: url(image/bgimagecos.jpg);
    font-family: Arial, sans-serif;
    scroll-behavior: smooth;
    background-color:transparent;
    padding: 20px;
}

body {
    background-color:transparent;
    font-family: 'Arial', sans-serif;
    margin: 0;
    color: #333;
}

/* Heading and Form Title */
h1 {
    font-size: 2rem;
    color: var(--main-color);
    margin-bottom: 1rem;
    text-align: center;
}

/* Form Container Styling */
form {
    background-color:transparent;
    border-radius: 8px;
    box-shadow: var(--box-shadow);
    padding: 20px;
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
    margin-top: 30px;
}

/* Form Label and Input Styling */
label {
    font-size: 1rem;
    color: var(--black-color);
    margin-bottom: 8px;
    display: block;
}

input[type="text"], input[type="email"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
    color: #333;
}

/* Submit Button Styling */
button {
    background-color: var(--main-color);
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #3a1d0f;
}

/* Link Styling */
a {
    color: var(--main-color);
    font-size: 1rem;
    margin-top: 20px;
    display: inline-block;
    text-align: center;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
/* Button Styling */
.btn {
    background-color: var(--white-alpha-25);
    border: 2px solid var(--white-alpha-40);
    backdrop-filter: var(--backdrop-filter);
    box-shadow: var(--box-shadow);
    text-transform: capitalize;
    color: var(--main-color);
    padding: 0.8rem 2rem;
    border-radius: 1.5rem;
    font-size: 20px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: color 0.3s ease; /* Added transition for text color change */
}

/* Button inside form (to add consistency) */
button[type="submit"] {
    background-color: var(--main-color);
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Hover effects for form submit button */
button[type="submit"]:hover {
    background-color: #3a1d0f; /* Slightly darker color on hover */
}


/* Responsive Styling */
@media (max-width: 600px) {
    h1 {
        font-size: 1.5rem;
    }
    form {
        padding: 15px;
        width: 90%;
    }
    input[type="text"], input[type="email"] {
        padding: 8px;
        font-size: 0.9rem;
    }
    button {
        padding: 10px;
    }
}

    </style>
</body>
</html>
