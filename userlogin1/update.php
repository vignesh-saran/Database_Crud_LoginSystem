<?php 
include("crud.php");
error_reporting(0); 


    $id = $_GET['id'];


    //echo $_GET['id'];
    
    $query="SELECT * FROM data_user WHERE id='$id' ";
    $data =mysqli_query($conn,$query);
    
    $result= mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet"> 

</head>
<body>
<div class="container">
    <div class="title">
        <h1>Tocken List Update</h1>
    </div>
  
    <form id="employeeForm" method="post" action="" onsubmit="return updateEmployee()">

        <div class="form-group">
            <label>Name:</label>
            <input type="text" value="<?php echo $result['name']; ?>" class="form-control" placeholder="Your Name" name="name" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" value="<?php echo $result['email']; ?>" placeholder="xyz@gmail.com" name="email" required>
        </div>
        <div class="form-group">
            <label>password:</label>
            <input type="text" class="form-control" value="<?php echo $result['password']; ?>" placeholder="Your Password" name="password" required>
        </div>
        <div class="form-group">
            <label>Phone:</label>
            <input type="text" class="form-control" value="<?php echo $result['phone']; ?>" placeholder="your phone number" name="phone" required>
        </div>
        <div class="form-group">
            <label>problem:</label>
            <input type="text" class="form-control" value="<?php echo $result['problem']; ?>" placeholder="Your problem" name="problem" required>
        </div>
        </div>
        <div class="form-group">
            <input type="checkbox" required>
            <p>Agree to terms and conditions</p>   
        </div>
        <div>
            <input type="submit" class="btn btn-success" value="Update Details" name="update">
        </div>
    </form>
</div>

</body>
</html>


<?php 
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $problem = $_POST['problem'];
 
    $update_query = "UPDATE data_user SET name='$name', email='$email', password='$password', phone='$phone', problem='$problem'  WHERE id='$id'";

    $update_data = mysqli_query($conn, $update_query);
    if ($update_data) {
        echo "<script>window.location.href = 'admin_display.php';</script>";
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

?>
