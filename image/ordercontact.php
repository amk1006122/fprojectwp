<?php
// If the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Web3Forms API URL
    $url = 'https://api.web3forms.com/submit';

    // Prepare data to send to Web3Forms API
    $data = [
        'access_key' => 'e5d0353a-6630-41d5-8285-c9385f2d7138', 
        'name' => $name,
        'email' => $email,
        'message' => $message
    ];

    // Initialize cURL
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    // Execute the request and capture the response
    $response = curl_exec($ch);

    // Close cURL resource
    curl_close($ch);

    // Check if the response is successful and display message
    if ($response) {
        $success_message = "Your message has been sent successfully!";
    } else {
        $error_message = "There was an error submitting the form. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
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

        body {
            font-family: 'Arial', sans-serif;
            color: var(--main-color);
            padding: 0;
            margin: 0;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('image/homebgimage3.jpg') no-repeat center center fixed;
            background-size: cover;
            margin-top: 10%;
        }

        .contact-container {
            max-width: 600px;
            padding: var(--space);
            background: rgba(255, 255, 255, 0.7);
            border-radius: 8px;
            box-shadow: var(--box-shadow);
            backdrop-filter: var(--backdrop-filter);
        }

        .contact-left-title {
            text-align: center;
            margin-bottom: 2rem;
        }

        .contact-left-title h2 {
            color: black;
            font-size: 2rem;
        }

        .contact-inputs {
            width: 100%;
            padding: 1rem;
            margin-bottom: 1.2rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        .contact-inputs:focus {
            border-color: var(--main-color);
            outline: none;
        }

        button {
            padding: 1rem 2rem;
            background-color: var(--main-color);
            color: white;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: var(--black-color);
        }

        .success-message, .error-message {
            text-align: center;
            padding: 1rem;
            margin-bottom: 1rem;
            font-weight: bold;
        }

        .success-message {
            color: green;
        }

        .error-message {
            color: red;
        }
        .back-to-home {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 50%;
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
        

        /* Responsive Styles */
        @media (max-width: 768px) {
            .contact-container {
                width: 90%;
                padding: 1.5rem;
            }

            .contact-left-title h2 {
                font-size: 1.5rem;
            }

            button {
                width: 100%;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <form action="" method="POST" class="contact-left">
            <div class="contact-left-title">
                <h2>Get in Touch</h2>
                <hr>
            </div>

            <!-- Success or error message display -->
            <?php if (isset($success_message)) { ?>
                <div class="success-message">
                    <?php echo $success_message; ?>
                </div>
            <?php } elseif (isset($error_message)) { ?>
                <div class="error-message">
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>

            <!-- Form Inputs -->
            <input type="text" name="name" placeholder="Your Name" class="contact-inputs" required>
            <input type="email" name="email" placeholder="Your email" class="contact-inputs" required>
            <textarea name="message" placeholder="Your Message" class="contact-inputs" required></textarea>
            <button type="submit">Submit <img src="/arrow_icon.png" alt=""></button>
        </form>
    
            <br>
    <div class="msg">
        <h4>Thank you for contacting us :)</h4>
    </div>
    </div>
    <div class="back-to-home">
        <a href="home.php" class="btn btn-primary">Back to Home</a>
    </div>

</body>
</html>
