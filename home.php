<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IITG Hospital Home</title>
    <style>
        p {
        background-image: url('iitgh.jpg');
        }
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center; /* Ensure items are aligned vertically in the center */
            background-color: #f0f0f0;
            padding: 20px;
        }
        .navbar a, .navbar div {
            text-decoration: none;
            color: green;
            flex: 1; /* This ensures that the space is evenly distributed */
            text-align: center; /* Center the text */
        }
        .logo {
            flex: 0; /* Do not allow the logo to grow, keeping it to its content size */
            text-align: left; /* Align the logo to the left */
        }
        .main-body {
            display: flex;
            margin-top: 20px;
        }
        .main-body img {
            float: left;
            margin-right: 20px;
        }
        .registration-links {
            margin-left: 20px;
            display: flex;
            flex-direction: column;
        }
        .registration-links a {
            text-decoration: none;
            color: blue;
            margin: 5px 0;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">
        <!-- Replace `path_to_logo_image.jpg` with the path to your actual logo image -->
        <img src="iitgh.jpg" alt="IITG" width="250">
    </div>
    <h1>IITG Hospital</h1>
    <div><a href="about.php">About</a></div>
</div>

<div class="main-body">
    <img src="logo.png" alt="IITG Hospital" width="500">
    <div class="registration-links">
    <!-- <a href="admin_registration.php">Admin    Registration</a> -->
    <h2>Registration</h2>
    <a href="new_registration.php">New Registration</a>
        <!-- <a href="pat_registration.php">Patient Registration</a>
        <a href="doc_registration.php">Doctor Registration</a>
        <a href="pharmacy_registration.php">Pharmacy Registration</a>
        <a href="pharmaceutical_company_registration.php">Pharmaceutical Company Registration</a> -->
        <br><br><br>
    <h2>Already Registered, Login here</h2>
    <a href="login.php">Login</a>
    
    </div>
</div>

</body>
</html>
