<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Getting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet"> 
    <script>
        function updateEmployee() {
            return true;
        }
    </script>

</head>
<body>
<div class="login">
<a href="login.php" class="btn btn-info mt-3">LOG IN</a>
</div>
<div class="container">
    <div class="title">
        <h1>TOKEN</h1>
    </div>
    <form id="employeeForm" method="post" action="data.php" onsubmit="return updateEmployee()">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" placeholder="Your Name" name="name" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" placeholder="xyz@gmail.com" name="email" required>
        </div>

        <div class="form-group">
            <label>password:</label>
            <input type="password" class="form-control" placeholder="Your password" name="password" required>
        </div>

        <div class="form-group">
            <label>phone:</label>
            <input type="text" class="form-control" placeholder="Your phone number" name="phone" required>
        </div>

        <div class="form-group">
            <label>problem:</label>
            <input type="text" class="form-control" placeholder="Your Problem" name="problem" required>
        </div>
           
        <div class="form-group">
            <input type="checkbox" required>
            <p>Agree to terms and conditions</p>   
        </div>
        
        <div>
            <input type="submit" class="btn btn-success" value="Submit" name="insert">
        </div>
        
    </form>
</div>

</body>
</html>

<?php
// error_reporting(0);  // used for not getting any warning

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userlogin";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// $conn = new mysqli($servername, $username, $password, $dbname); // other methode to connect

if (!$conn) {
    die("Connection failed " . mysqli_connect_error());
}

if (isset($_POST['insert'])) {
        
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $problem = $_POST['problem'];
    
    
    $query= "INSERT INTO data_user(name, email, password, phone, problem)
            VALUES ('$name', '$email','$password', '$phone', '$problem')";
        
    $data = mysqli_query($conn,$query);

}

?>


