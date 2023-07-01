<?php
// echo 'welcome to the view index';

?>

<?php
require "inc/_header.php";
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
require "inc/_view_more.php";

?>

    <div class="container mt-4">
<?php
// require "inc/navbar.php";


?>
<a href="/"><i class="fs-4 fa-solid fa-arrow-left mb-5"></i></a>

<?php
// this is the loggedin user title bar
// require "inc/_user_loggedin_title_bar.php";

$sql = new sql_get;


if(isset($_POST['create_new_account'])){
    $username = $sql->html_special_chars($_POST['username']);
    $user_email = $sql->html_special_chars($_POST['user_email']);
    $password = $sql->html_special_chars($_POST['password']);
    $cpassword = $sql->html_special_chars($_POST['cpassword']);
    $user_img_main = $_FILES['user_img'];
    $user_img = $_FILES['user_img']['name'];
    $user_img_tmp = $_FILES['user_img']['tmp_name'];

    $result = $sql->show_where("users", "username", "$username");

    if($cpassword == $password){
        if($result->num_rows > 0){
            echo error_msg("User already exist with the username !");
        }else{
    
            if($user_img !== ''){
                $hash = password_hash($password, PASSWORD_DEFAULT);
    
                $sql->insert_all("users", "`username`, `user_email`, `password`, `img_name`", "'$username','$user_email', '$hash', '$user_img'");
                
                $desc_img = "assets/img/users_img/img/" . $username . "_" . time() . ".jpeg";

                compress_image($user_img_tmp, "$desc_img", 60);
    
                echo success_msg("Account has been created successfully");
            }else{
                $hash = password_hash($password, PASSWORD_DEFAULT);
    
                $sql->insert_all("users", "`username`, `user_email`, `password`", "'$username','$user_email', '$hash'");
    
                echo success_msg("Account has been created successfully");
            }

         

        }
    }else{
        echo error_msg("Password does not match !");
    }




}








?>

<div class="container m-4 p-4">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container text-center fs-4 mb-3">
            Create a new account 
        </div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Username</label>
  <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="examplename" required>
</div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" name="user_email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
</div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Your password" required>
</div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
  <input type="password" name="cpassword" class="form-control" id="exampleFormControlInput1" placeholder="Your confirm password" required>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">User Image</label>
  <input type="file" name="user_img" class="form-control" id="exampleFormControlTextarea1">
  
</div>

<button type="submit" name="create_new_account" class="btn btn-outline-primary">Submit</button>

    </form>
</div>

       
    </div>



</div>

    <?php
    require "inc/_footer.php";

    ?>