<?php
session_start();

$servername = "localhost";
$username = "root";
$sPassword = "";
$database = "hospital";

$conn = new mysqli($servername, $username, $sPassword, $database);

if ($conn->connect_error) 
    {
    die("Connection failed: " . $conn->connect_error);
    }
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $result = $sql->get_result();
    
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password_hash'])) 
        {
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['name'] = $row['name'];
            
            header('Location: login2.php');
        } 
        else 
        {
            echo "Invalid Username or Password";
        }
    } 
    else 
    {
        echo "Invalid Username";
    }

    $sql->close();
    $conn->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .navbar {
            width: 100%;
            background-color: #f0f0f0;
            padding: 20px 0;
            position: fixed;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .navbar a {
            text-decoration: none;
            color: black;
            padding: 0 20px;
        }
        .form-container {
            margin: 80px auto 20px auto;
            width: 90%;
            max-width: 500px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            background-color: white;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"], textarea, button {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .button-group {
            display: flex;
            justify-content: space-between;
        }
        button {
            cursor: pointer;
        }
        .submit-btn {
            background-color: Green;
            color: white;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
        .back-btn {
            background-color: red;
            color: black;
        }
        .back-btn:hover {
            background-color: #bbb;
        }
    </style>
</head>
<body>
<div class="navbar">
<div class="logo">
        <!-- Replace `path_to_logo_image.jpg` with the path to your actual logo image -->
        <img src="logo.png" alt="IITG" width="100">
    </div>
    <h2>IITG Hospital </h2>
    <div><a href="home.php">Home</a></div>
    <div><a href="about.html">About</a></div>
</div>
    <main class="container">
        <div class="form-container">
            <section>
                <hgroup>
                    <h2>Login to your account</h2>
                </hgroup>
                <form action="login.php" method="POST">
                   
                <input type="text" id="username" name="username" placeholder="Username" aria-label="Username" required>

                <input type="password" id="password" name="password" placeholder="Password" aria-label="Password" required>
                    
                <div class="button-group">
            <button type="button" class="back-btn" onclick="window.history.back();">Previous Page</button>
            <button type="submit" class="submit-btn">Login</button>
        </div>
            </section>
        </div>
    </main>
</body>
</html>
