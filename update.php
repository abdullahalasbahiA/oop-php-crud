<?php

include 'connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM `crud` WHERE id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "UPDATE `crud` set id=$id, name='$name', email='$email', mobile='$mobile', password='$password'
    WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if($result){
        header("location: display.php");
        // echo "Data updated successfully";
    } else {
        die(mysqli_error($con));
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud operation</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
</head>
<body>
    <div class="container my-5">         
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" value="<?php echo $name; ?>" autocomplete="off" name="name" class="form-control" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" value="<?php echo $email; ?>" autocomplete="off" name="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label>Mobile number</label>
                <input type="text" value="<?php echo $mobile; ?>" autocomplete="off" name="mobile" class="form-control" placeholder="Enter your mobile number">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" value="<?php echo $password; ?>" name="password" class="form-control" placeholder="Enter your password">
            </div>            
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>