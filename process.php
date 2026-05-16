<!DOCTYPE html>
<html>
<!-- deschide cu Php-Server:Serve project -->
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleddd.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Webysther_20160423_-_Elephpant.svg/1280px-Webysther_20160423_-_Elephpant.svg.png">
    <title>Contact form | Baicu Denis</title>
</head>

<body>
    <div class="container">
        <div class="contact-box">
            <div class="left"></div>
            <form id="right" method="post" action="process.php">
                <h2>Contact Us</h2>
                <input type="text" id="field1" placeholder="Your Name" required>
                <input type="email" id="field2" placeholder="Your Email" required>
                <input type="tel" id="field3" placeholder="Phone" required>
                <textarea id="field4" placeholder="message" required></textarea>
                <button class="btn" type="button" onclick="submitForm()">Send</button>
        </div>
    </div>
    </div>
    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $phone = test_input($_POST["phone"]);
        $message = test_input($_POST["message"]);

        $errors = array();

        if (empty($name)) 
        {
            $errors[] = "Name is required";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $errors[] = "Invalid email format";
        }

        if (!preg_match("/^[0-9]+$/", $phone)) 
        {
            $errors[] = "Invalid phone number";
        }

        if (!empty($errors)) 
        {
            foreach ($errors as $error) 
            {
                echo $error . "\n";
            }
        } 
        else {
            echo "Name: " . $name . "\n";
            echo "Email: " . $email . "\n";
            echo "Phone: " . $phone . "\n";
            echo "Message: " . $message . "\n";
        }
    } 
    else {
        echo "Error: Invalid request.";
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <script src="script3.js"></script>
</body>

</html>