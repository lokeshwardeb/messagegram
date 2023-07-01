
<?php
// require __DIR__ . "/inc/functions.php";


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
$active_class = 'my_profile';
require "inc/navbar.php";


?>
<a href="/"><i class="fs-4 fa-solid fa-arrow-left mb-5"></i></a>

<?php
// this is the loggedin user title bar
// require "inc/_user_loggedin_title_bar.php";

$sql = new sql_get;

 $username = $_SESSION['username'];

$result_show = $sql->show_where("users", "username", "$username");

if($result_show->num_rows > 0){
    while($row = $result_show->fetch_assoc()){
        $show_username = $row['username'];
        $show_user_email = $row['user_email'];
    }
}else{
    $show_username = '';
    $show_user_email = '';
    echo error_msg("No user information hasbeen found !");
}


if(isset($_POST['create_new_account'])){
    // getting the new update values from the post
    $update_username = $sql->html_special_chars($_POST['update_username']);
    $update_user_email = $sql->html_special_chars($_POST['update_user_email']);

    $user_img = $_FILES['user_img']['name'];

    $user_img_tmp = $_FILES['user_img']['tmp_name'];

    // checking if there any users exist on the database with the loggedin username
    $result = $sql->show_where("users", "username", "$username");

    if($result->num_rows > 0){
        // if exist then checking if there any users exist on the chat_users table with the loggedin username
    $result_check_chat_users_username = $sql->show_where("chat_users", "username", "$username");

    if($result_check_chat_users_username->num_rows > 0){
        // if exist then will update all the users with the new username with help of while loops
        while($row = $result_check_chat_users_username->fetch_assoc()){
            $sql->update_all("chat_users", "`username`='$update_username'", "username", "$username");
        }
        
    }
    // checking if there any user exist on the chat_users table where the connected_username table is equals to the loggedin username
    $result_check_chat_users_c_username = $sql->show_where("chat_users", "connected_username", "$username");

    if($result_check_chat_users_c_username->num_rows > 0){
        // if exists then will update all the users with the help of the while loops
        while($row = $result_check_chat_users_c_username->fetch_assoc()){
            $sql->update_all("chat_users", "`connected_username`='$update_username'", "connected_username", "$username");

        }
    }
    // checking if there any user exist on the messages table where the sender_username table is equals to the loggedin username
    $result_check_messages_sender_username = $sql->show_where("messages", "sender_username", "$username");

    if($result_check_messages_sender_username->num_rows > 0){
        // if exists then will update all the users with the help of the while loops
        while($row = $result_check_messages_sender_username->fetch_assoc()){
            $sql->update_all("messages", "`sender_username`='$update_username'", "sender_username", "$username");

        }
    }
    // checking if there any user exist on the messages table where the reciver_username table is equals to the loggedin username
    $result_check_messages_reciver_username = $sql->show_where("messages", "reciver_username", "$username");

    if($result_check_messages_reciver_username->num_rows > 0){
        // if exists then will update all the users with the help of the while loops
        while($row = $result_check_messages_reciver_username->fetch_assoc()){
            $sql->update_all("messages", "`reciver_username`='$update_username'", "reciver_username", "$username");

        }
    }
        

    $new_img_name = $username . "_" . time() . ".jpeg";

    
    if($user_img !== ''){
        
// update the users table where the username equals to the loggedin username
      $sql->update_all("users", "`username`='$update_username', `user_email`='$update_user_email', `img_name`='$new_img_name'", "username", "$username");


      $desc_img = "assets/img/users_img/img/" . $username . "_" . time() . ".jpeg";

      compress_image($user_img_tmp, "$desc_img", 60);
      
      

      $_SESSION['username'] = $update_username;
      $_SESSION['user_img'] = $new_img_name;


      echo success_msg("All Information has been updated successfully");
    }else{
        
// update the users table where the username equals to the loggedin username
      $sql->update_all("users", "`username`='$update_username', `user_email`='$update_user_email'", "username", "$username");


      

      $_SESSION['username'] = $update_username;
      
    //   $_SESSION['user_img'] = $new_img_name;


      echo success_msg("All Information has been updated successfully");
    }


    }else{
        echo error_msg("No user has been found !");
    }

   




}



// echo $_SESSION['username'];




?>

<div class="container m-4 p-4">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container text-center fs-4 mb-3">
            Update your information 
        </div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Username</label>
  <input value="<?php echo $show_username ?>" type="text" name="update_username" class="form-control" id="exampleFormControlInput1" placeholder="examplename" required>
</div>

    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email</label>
  <input value="<?php echo $show_user_email ?>" type="email" name="update_user_email" class="form-control" id="exampleFormControlInput1" placeholder="Your email" required>
</div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">User Image</label>
  <input  type="file" name="user_img" class="form-control" id="exampleFormControlInput1" placeholder="Your password" >
</div>



<button type="submit" name="create_new_account" class="btn btn-outline-primary">Submit</button>

    </form>
</div>

       
    </div>



</div>

    <?php
    require "inc/_footer.php";

    ?>