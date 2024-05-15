<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link  rel="stylesheet" href="basic.css">

    <style>
        body {
            background-image: url("hi1.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 90%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        #error-message {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<center><ul class="blue" ><h1 style=" color:whitesmoke ;text-shadow: 2px 2px 2px black;"> Sri Sabari Pipes</h1></ul></center>
<ul>
    <li><a  href="mini project.html">Home</a></li>
    <li class="dropdown">
        <a   class="dropbtn" href="Untitled-1.html">Product</a>
        <div class="dropdown-content">
            <a href="#"> HDPE PIPE</a>
            <a href="#"> PVC PIPE</a>
            <a href="#"> WATER TANKS</a>
            <a href="#"> PIPE FITTINGS</a>
            <a href="#"> CLAMPS</a>
        </div>
    </li>
    <li><a href="contact.html">Contact</a></li>
    <li><a class="active" href="order.php">Place order</a></li>
    <li><a href="calculator.html">Price Calculator</a></li>
    <li style="float:right"><a href="about.html">About us</a></li>
</ul>
<div class="container">
    <h2>ORDER REGISTRATION FORM</h2>
    <form id="validationForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
        </div>
        <div class="form-group">
            <label for="product">Product:</label>
            <input type="checkbox" id="product1" name="product1" value="HDPE">
            <center><label for="product1">HDPE PIPES</label></center>
            <input type="text" id="product1_quantity" name="product1_quantity" placeholder="Quantity">
            <br>
            <input type="checkbox" id="product2" name="product2" value="PVC">
            <center><label for="product2"> PVC PIPES </label></center>
            <input type="text" id="product2_quantity" name="product2_quantity" placeholder="Quantity">
            <br>
            <input type="checkbox" id="product3" name="product3" value="WATER">
            <center><label for="product3"> WATER TANK </label></center>
            <input type="text" id="product3_quantity" name="product3_quantity" placeholder="Quantity">
            <br>
            <input type="checkbox" id="product4" name="product4" value="PIPE">
            <center><label for="product4"> PIPE FITTINGS </label></center>
            <input type="text" id="product4_quantity" name="product4_quantity" placeholder="Quantity">
            <br>
            <input type="checkbox" id="product5" name="product5" value="CLAMP">
            <center><label for="product5"> CLAMPS </label></center>
            <input type="text" id="product5_quantity" name="product5_quantity" placeholder="Quantity">
            <br><br>
        </div>

        <div class="form-group">
            <label for="message">Address:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <button type="submit">Submit</button>
        </div>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $message = $_POST["message"];

        
        $selectedProducts = [];


        if(isset($_POST["product1"])) {
            $selectedProducts[] = $_POST["product1"];
        }
        if(isset($_POST["product2"])) {
            $selectedProducts[] = $_POST["product2"];
        }
        if(isset($_POST["product3"])) {
            $selectedProducts[] = $_POST["product3"];
        }
        if(isset($_POST["product4"])) {
            $selectedProducts[] = $_POST["product4"];
        }
        if(isset($_POST["product5"])) {
            $selectedProducts[] = $_POST["product5"];
        }

        $errorMessage = "";

        if (empty($name)) {
            $errorMessage .= "Please enter your name.<br>";
        }
        if (empty($email)) {
            $errorMessage .= "Please enter your email.<br>";
        }

        if (empty($phone)) {
            $errorMessage .= "Please enter your phone number.<br>";
        }

        if (empty($selectedProducts)) {
            $errorMessage .= "Please select at least one product.<br>";
        }

        if (empty($message)) {
            $errorMessage .= "Please enter your message.<br>";
        }

        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessage .= "Please enter a valid email address.<br>";
        }

        if (!empty($phone) && !preg_match("/^\d{10}$/", $phone)) {
            $errorMessage .= "Please enter a valid phone number.<br>";
        }

        if (!empty($errorMessage)) {
            echo '<div id="error-message" style="color: red; margin-top: 10px; text-align: center;">';
            echo $errorMessage;
            echo '</div>';
        } else {
            echo '<div id="error-message" style="color: green; margin-top: 10px; text-align: center;">';
            echo '</div>';
        }
    }
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "pipe"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $phone = $conn->real_escape_string($_POST["phone"]);
    $product = $conn->real_escape_string($_POST["product"]);
    $message = $conn->real_escape_string($_POST["message"]);
    $terms = isset($_POST["terms"]);

    $errorMessage = "";

    if (empty($name)) {
        $errorMessage .= "Please enter your name.<br>";
    }
    if (empty($email)) {
        $errorMessage .= "Please enter your email.<br>";
    }

    if (empty($phone)) {
        $errorMessage .= "Please enter your phone number.<br>";
    }

    if (empty($product)) {
        $errorMessage .= "Please select a product.<br>";
    }

    if (empty($message)) {
        $errorMessage .= "Please enter your message.<br>";
    }

    if (!$terms) {
        $errorMessage .= "Please accept the terms and conditions.<br>";
    }

    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage .= "Please enter a valid email address.<br>";
    }

    if (!empty($phone) && !preg_match("/^\d{10}$/", $phone)) {
        $errorMessage .= "Please enter a valid phone number.<br>";
    }

    if (empty($errorMessage)) {
        $sql = "INSERT INTO user (name, email, phone, product, address) VALUES ('$name', '$email', '$phone', '$product', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo '<div id="error-message" style="color: green; margin-top: 10px; text-align: center;">';
            echo "Form submitted successfully!";
            echo '</div>';
        } else {
            echo '<div id="error-message" style="color: red; margin-top: 10px; text-align: center;">';
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo '</div>';
        }
    } else {
        echo '<div id="error-message" style="color: red; margin-top: 10px; text-align: center;">';
        echo $errorMessage;
        echo '</div>';
    }
}

$conn->close();
?>


    <div id="error-message"></div>
    </div>
    <footer>
      <p>&copy; 2024 Sri Sabari pipes</p>
    </footer>
</body>
</html>
