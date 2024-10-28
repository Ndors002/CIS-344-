
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Scroll Reveal -->
    <link rel="stylesheet" href="css/scrollreveal.min.js">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Contact Us</title>
    <style>
        body {
            background-color: #2C3034; 
            background-image: url('./images/about.jpg'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            padding-top: 80px; 
        }
        .contact-form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .time-topic {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            display: block;
            text-align: center;
            color: #fff;
        }
        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }
        .form-label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            justify-content: center;
        }
        .submit-button {
            padding: 10px 15px;
            background-color: #561C24;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            margin: auto;
        }
        .submit-button:hover {
            background-color: #6c202a;
        }
    </style>
    <script src="./js/sweetalert.min.js"></script>
</head>
<body>
    <header class="header">
        <nav class="nav container flex">
                <a href="index.html" class="logo-content flex">
                    <i class='bx bx-coffee logo-icon'></i>
                    <span class="logo-text">Winery</span>
                </a>

                <div class="menu-content">
                        <ul class="menu-list flex">
                                <li><a href="index.html" class="nav-link active-navlink">home</a></li>
                                <li><a href="about.html" class="nav-link">about</a></li>
                                <li><a href="lists.html" class="nav-link">lists</a></li>
                                <li><a href="contact.php" class="nav-link">contact</a></li>
                        </ul>

                        </div>

                        <i class='bx bx-x navClose-btn'></i>
                    </div>
                    
                    <div class="contact-content flex">
                        <i class='bx bx-phone phone-icon' ></i>
                        <span class="phone-number">646-498-2030</span>
                    </div>

                    <i class='bx bx-menu navOpen-btn'></i>
            </nav>
    </header>

    <main>
        <div class="contact-form">
            <span class="time-topic">Contact Us</span>
            <form id="contactForm" action="" method="POST">
                <div class="form-group">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" required class="form-input">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" required class="form-input">
                </div>
                <div class="form-group">
                    <label for="message" class="form-label">Message:</label>
                    <input id="message" name="message" rows="4" required class="form-input"></input>
                </div>
                <button type="submit" class="submit-button">Submit</button>
            </form>
        </div>

        <footer class="section footer">
            <div class="footer-container container">
              <div class="footer-content">
                <div class="footer-location flex">
                  <i class="bx "></i>
                </div>
              </div>
    
              <div class="footer-linkContent">
                <ul class="footer-links">
                </ul>
              </div>
            </div>
            <div class="footer">
                &#169; 
            </div>
        </footer>
    </main>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve form data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // SweetAlert success popup
        echo "<script src='./js/sweetalert.min.js'></script>";
        echo "<script>
            swal({
                title: 'Form submitted successfully!',
                icon: 'success',
                button: 'OK',
            }).then(() => {
                window.location.href = 'contact.php'; 
            });
        </script>";
    }
    ?>
</body>
</html>
