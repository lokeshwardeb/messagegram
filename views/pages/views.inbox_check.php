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

    <style>
        @media screen and (min-width: 1400px){
            /* .my_class{
                margin-top: 500px !important;
            } */
        }
    </style>

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
<a href="/"><i class="fs-4 fa-solid fa-arrow-left"></i></a>

<?php
// this is the loggedin user title bar
require "inc/_user_loggedin_title_bar.php";

?>

<div class="container mt-4">

    <div class="container msg-section mt-4 pt-5 pb-5">
        <!-- hi welcome to msg -->
        <div class="container">
            <!-- <div class="d-flex">
            <img src="d.png" class="rounded-circle"  width="50px" height="50px" alt="" srcset="">
    <div class="shadow p-3 mb-5 bg-body-tertiary rounded">hi</div>
            </div> -->

           
           
            <div class="my_class ">
                <!-- initialized the row class and the col-12 class on the children div to maintain design -->
                <div class="row">

<?php

 $get_username = $sql->html_special_chars($_GET['username']);

 $username = $_SESSION['username'];



//  initializing all the message datas with the username and the reciver username
        // $result_msg = $sql->msg_inbox("$username", "$get_username");
        $result_msg_sender = $sql->msg_inbox("$username", "$get_username");

        // if there contains any data to the database
        if($result_msg_sender->num_rows > 0){
            // then get all the data as associative array and show this with the help of while loop
            while($row = $result_msg_sender->fetch_assoc()){
                // check if the sender username is matching with the current loggedin username
               if($row['sender_username'] == $username) {
                // if it is matching then show its data with the text-primary color
                echo '
                <div class="col-12 ">
                <div class = "d-flex float-end">
                <div class="shadow p-3 mb-5 me-4 text-primary bg-body-tertiary rounded mt-0">sender '.$row['message'].'</div>
                <img src="../../assets/img/IMG_20230214_124527_9 - Copy.png" class="rounded-circle" width="50px" height="50px" alt="" srcset="">
                </div>
              </div>
    ';
            }
            // or else it is not matching that means the data is not send by the loggedin user but it has been sent from the connected user and recived by the current loggedin user
            else{
                // in that case show the data with the text-dark color
                echo '
                <div class="col-12 ">
                <div class = "d-flex float-start">
                <img src="../../assets/img/IMG_20230214_124527_9 - Copy.png" class="me-4 rounded-circle" width="50px" height="50px" alt="" srcset="">

                    <div class="shadow p-3 mb-5 text-dark bg-body-tertiary rounded mt-0">sender '.$row['message'].'</div>
                </div>
               
               
              </div>
    ';
            }
             
       
        }
       
       
    // }
    

  

}
 // and if there is no data found on the database then show the message that no data found
 else{
    error_msg("No message data found !");
 }




if(isset($_POST['send'])){
    $sender_name = $sql->html_special_chars($_POST['sender_name']);
    $reciver_name = $sql->html_special_chars($_POST['reciver_name']);
    $message = $sql->html_special_chars($_POST['message']);
    // $sender_name = $sql->html_special_chars($_POST['sender_name']);

    $sql->insert_all("messages", "`sender_username`, `reciver_username`, `message`", "'$sender_name', '$reciver_name', '$message'");

    // header("location: inbox?username=$get_username");

    echo '
    <script>
    window.location.href = "inbox?username='.$get_username.'"
    </script>
    ';




}




         

            ?>
      
</div>
                </div>
      <!-- </div> -->
            
    </div>
    </div>
    <div class="container repl-section m-5">
        
<form action="" method="post">

<div class="mb-3">
    <input type="hidden" name="sender_name" value="<?php echo $username ?>">
    <input type="hidden" name="reciver_name" value="<?php echo $get_username ?>">
  <!-- <label for="exampleFormControlTextarea1" class="form-label">Write you message</label> -->
  <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<button type="submit" name="send" class="btn btn-primary">Send</button>
</form>
    </div>
</div>

       
    </div>



</div>

    <?php
    require "inc/_footer.php";

    ?>