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
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $name= $_POST['name'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    if (!empty($_POST['role'])) 
    {
        $role = $_POST['role'];
   
        $conn->begin_transaction();

    
        $sql = $conn->prepare("INSERT INTO Users (username, password_hash, name,  role) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $user, $password_hash, $name, $role);
        $sql->execute();
        $conn->commit();

        $_SESSION['id'] = $sql->insert_id;
        $_SESSION['role'] = $role;
        $_SESSION['name'] = $name;
        

        $sql->close();
        $conn->close();

        switch ($role) {
            case 'doctor':
                header('Location: doc_registration.php');
                break;
            case 'patient':
                header('Location: pat_registration.php');
                break;
            case 'company':
                header('Location: pharmaceutical_company_registration.php');
                break;
            case 'pharmacy':
                header('Location: pharmacy_registration.php');
                break;
            default:
                echo"Invalid Role<br>";
                break;
        }



    
}

    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Registration</title>
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
            <h2>New Registration Form</h2>
                <!-- <hgroup>
                    <h2>Create Your Account</h2>
                    <h3>Join us today!</h3>
                </hgroup> -->
                <form action="new_registration.php" method="POST">

                    <input type="text" id="name" name="name" placeholder="Name" aria-label="Name" required>
                    
                    <input type="text" id="user" name="user" placeholder="Username" aria-label="User" required>

                    <input type="password" id="password" name="password" placeholder="Password" aria-label="Password" required><br><br>

                    <select id="role" name="role" aria-label="Role" required>
                        <option value="">Select Role</option>
                        <option value="patient">Patient</option>
                        <option value="doctor">Doctor</option>
                        <option value="pharmacist">Pharmacist</option>
                        <option value="company">Pharma Company Employee</option>
                        
                        
                    </select>
                    <div class="button-group">
            <button type="button" class="back-btn" onclick="window.history.back();">Previous Page</button>
            <button type="submit" class="submit-btn">Submit Registration</button>
        </div>                </form>

            </section>
        </div>
    </main>

</body>
</html>
