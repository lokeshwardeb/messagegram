<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagegram</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/sign-in.css"> -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php
require __DIR__ . "/inc/functions.php";

if(isset($_SESSION['username'])){
    echo '
    <script>
    window.location.href = "/dashboard"
    </script>
    ';
}
// echo 'welcome to the view index';

?>

<?php
// require "inc/_header.php";
require __DIR__ . "/../../config/conn.php";
require __DIR__ . "/../../models/model_connect.php";
$sql = new sql_get;

?>

<!-- <div class="container">
    <div class="shadow p-3 mb-5 bg-body-tertiary rounded">Regular shadow <br> fjkfjkdj</div>
    <div class="shadow p-3 mb-5 bg-body-tertiary rounded mt-0">Regular shadow</div>
    </div> -->


<div class="container mt-4">
 <?php
//  this is the main software title bar
require "inc/_title_bar.php";

?>

    <?php
    // this is the view more settings options
// require "inc/_view_more.php";

?>

    <div class="container mt-4">
<?php
// require "inc/navbar.php";


?>
<!-- <a href="/"><i class="fs-4 fa-solid fa-arrow-left mb-5"></i></a> -->

<?php
// this is the loggedin user title bar
// require "inc/_user_loggedin_title_bar.php";

$sql = new sql_get;


if(isset($_POST['create_new_account'])){
    $username = $sql->html_special_chars($_POST['username']);
    $password = $sql->html_special_chars($_POST['password']);

    $result = $sql->show_where("users", "username", "$username");

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $check_password = $row['password'];
            $password_verify = password_verify($password, $check_password);

            if($password_verify == 1){
                echo success_msg("You have been successfully loggedin to messagegram !");

                $_SESSION['username'] = $username;
                $_SESSION['user_email'] = $row['user_email'];
                $_SESSION['user_img'] = $row['img_name'];

                header("location: dashboard");

            }else{
                echo error_msg("Password Wrong ! Please enter correct password to login");
            }

        }
    }else{
        echo error_msg("No user has been found !");
    }

   




}








?>

<div class="container m-4 p-4">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container text-center fs-4 mb-3">
            Login with your account 
        </div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Username</label>
  <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="examplename" required>
</div>

    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Your password" required>
</div>



<button type="submit" name="create_new_account" class="btn btn-outline-primary">Submit</button>

    </form>
</div>

       
    </div>



</div>

    <?php
    require "inc/_footer.php";

    ?>