<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet"> 
</head>
<body>
<div class="container">
    <div class="row top-nav">
        <!-- Navigation Buttons -->
        <div class="col-12 text-center mt-4">
            <button class="btn btn-primary" onclick="showForm('userLoginContainer')">User Login</button>
            <button class="btn btn-danger" onclick="showForm('adminLoginContainer')">Admin Login</button>
        </div>
    </div>
    
    <div class="row mt-4">
        <!-- User Login Container -->
        <div class="col-md-6 offset-md-3" id="userLoginContainer" style="display: none;">
            <div class="card">
                <div class="card-header">
                    <h2>User Login</h2>
                </div>
                <div class="card-body">
                    <form id="userLoginForm" method="post" action="">
                        <div class="form-group">
                            <label>User Email</label>
                            <input type="email" class="form-control" placeholder="Your Name" name="useremail" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Your Password" name="userpassword" required>
                        </div>
                        <div class="">
                            <a href="data.php" >New Registration</a>
                        </div>
                        
                        <div>
                            <input type="submit" class="btn btn-primary" value="Login" name="user">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Admin Login Container -->
        <div class="col-md-6 offset-md-3" id="adminLoginContainer" style="display: none;">
            <div class="card">
                <div class="card-header">
                    <h2>Admin Login</h2>
                </div>
                <div class="card-body">
                    <form id="adminLoginForm" method="post" action="">
                        <div class="form-group">
                            <label>Admin Email</label>
                            <input type="email" class="form-control" placeholder="Enter Admin Email" name="adminEmail" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Admin Password" name="adminPassword" required>
                        </div>
                        <div class="">
                            <a href="data.php" >New Registration</a>
                        </div>
                        
                        <div>
                            <input type="submit" class="btn btn-danger" value="Login" name="admin">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showForm(formId) {
        // Hide both forms first
        document.getElementById('userLoginContainer').style.display = 'none';
        document.getElementById('adminLoginContainer').style.display = 'none';
        
        // Show the selected form
        document.getElementById(formId).style.display = 'block';
    }
</script>

</body>
</html>



<?php
include("crud.php"); // Include your database connection file

// Hardcoded admin credentials
$adminEmail = "admin@example.com";
$adminPassword = "Admin123"; // Use a strong password

// Check if the admin login form is submitted
if (isset($_POST['admin'])) {
    // Retrieve the entered email and password from the form
    $email = $_POST['adminEmail'];
    $password = $_POST['adminPassword'];

    // Verify the entered email and password against the hardcoded credentials
    if ($email === $adminEmail && $password === $adminPassword) {
        // Redirect to the admin_display.php page
        header("Location: admin_display.php");
        exit(); // Stop further script execution
    } else {
        //echo "Invalid admin credentials. Please try again.".mysqli_connect_error();
        $error = "Invalid admin credentials. Please try again.";
    }
}
?>


<?php
include("crud.php");

// Handle user login
if (isset($_POST['user'])) {
    $useremail = $_POST['useremail'];
    $userpassword = $_POST['userpassword'];

    // Prevent SQL injection by using prepared statements
    $stmt = $conn->prepare("SELECT * FROM data_user WHERE email = ?");
    $stmt->bind_param("s", $useremail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch user data from the database
        $user = $result->fetch_assoc();
        // Verify the entered password with the password stored in the database
        if ($userpassword === $user['password']) {
            // Redirect to user display page
            header("Location: clint_display.php");
            exit();
        } else {
            $user_error = "Invalid password. Please try again.";
        }
    } else {
        $user_error = "Invalid email. Please try again.";
    }

    $stmt->close();
}


?>





