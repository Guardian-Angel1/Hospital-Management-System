<?php
$insert=false;
if(isset($_POST['name']))
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $database= "hospital"; 

    $con = mysqli_connect($server, $username ,$password, $database);

    if(!$con){
        die("connection to this database failed due to". mysqli_connect_error());
    }
    // echo "Success Connecting to db";

    $patno = $_POST['patno']; 
    $name = $_POST['name'];  
    $age = $_POST['age'];
    $address = $_POST['address'];
    $pri_phy = $_POST['pri_phy'];
    $sql= "INSERT INTO `patient`(`pat_ssn`,`pat_name`,`pat_age`,`pat_add`,`pri_physician`) VALUES ('$patno', '$name', '$age', '$address', '$pri_phy');";
    //echo $sql


    if($con->query($sql)==true)
    {
        // echo "Successfully Inserted";
        $insert=true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
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

<div class="form-container">
<h2>Username Created!!!</h2>
    <h3>Enter following details to complete your Registration</h3>
    <h2>Patient Registration Form</h2>
    <?php
    if($insert)
    {
    echo '<p class="SubmitMsg">Thanks for submitting your form. Hope you get well soon!</p>';
    }
    ?>
    <form action="pat_registration.php" method="post">
        <label for="patno">SSN:</label>
        <input type="text" id="patno" name="patno" required>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" >

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" ></textarea>

        <label for="pri_phy">Prescribed Physician:</label>
        <input type="text" id="pri_phy" name="pri_phy" required>

        <div class="button-group">
            <button type="button" class="back-btn" onclick="window.history.back();">Previous Page</button>
            <button type="submit" class="submit-btn">Submit Registration</button>
        </div>
    </form>
</div>

</body>
</html>
