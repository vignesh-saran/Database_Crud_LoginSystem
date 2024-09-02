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
    if ($data) {
        echo "data is stored";
    }
      
    else {
        echo "Failed".mysqli_connect_error();
    }

}

?>


