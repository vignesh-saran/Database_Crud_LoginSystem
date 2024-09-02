<?php 

include("crud.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problem List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet"> 
    <script>
        function updateEmployee() {
            return true;
        }
    </script>
</head>
<body>
    
<?php

error_reporting(0);

//$query="SELECT * FROM data_user WHERE email = '$email' AND password = '$pass_word'";
$query="SELECT * FROM data_user";


$data =mysqli_query($conn,$query);

$total = mysqli_num_rows($data);
//echo $total;

$result= mysqli_fetch_assoc($data);



if ($total !=0)
{
 ?>



<div class="title">
        <h1>Problem List</h1>
</div>


<div class="container">
    <table class="table table-bordered" id="employeeTable">
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Problem</th>
        
    <?php

    while($result= mysqli_fetch_assoc($data))
    {
        echo "<tr>
              <td>" . $result['id'] ."</td>
              <td>" . $result['name'] ."</td>
              <td>" . $result['email'] ."</td>
              <td>" . $result['phone'] ."</td>
              <td>" . $result['problem'] . "</td>
              </tr>";
                                    
    }
}

else
{
    echo "No records found";
}


// echo $result['name']." ".$result['email']." "
        // .$result['phone']." ".$result['job']." ".$result['bank_no']." ".$result['date_joining']
        // ." ".$result['salary']." ".$result['gender']."<br>" ;

        
?>

</table>

</div>

</body>
</html>


