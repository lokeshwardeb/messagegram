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
    @media screen and (min-width: 1400px) {
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

                            // getting the reciver username by the get method
                            $get_username = $sql->html_special_chars($_GET['username']);

                            //  getting the current loggedin username by session method
                            $username = $_SESSION['username'];


                            //  select from messages order by desc where username = current loggedin username and recived username = get username by get method
                            $result_msg_status = $sql->msg_inbox("$username", "$get_username", "DESC");

                            //  get all the values as the associative array
                            $row = $result_msg_status->fetch_assoc();

                            // get the id value from the previous query
                            $check_user_id = $row['id'];

                            //  check from the table messages where id = check user id which was gotten by the previous query
                            $select_seen_status_by_id = $sql->show_where("messages", "id", "$check_user_id");


                            // get the values as an associative array
                            $row = $select_seen_status_by_id->fetch_assoc();

                            // get the values of seen_status row
                            $select_seen_status_by_id_value = $row['id'];
                            // $select_seen_status_by_id_value_reciever = $row['reciver_seen_status'];
                            // get the values of seen_status row
                            $select_seen_status_by_id_value_sender = $row['sender_seen_status'];
                            $select_seen_status_by_id_value_reciever = $row['reciver_seen_status'];
                           
                            // get the  username values of seen_status row
                           echo $sender_username_from_table = $row['sender_username'];
                            echo $reciver_username_from_table = $row['reciver_username'];


                            if($username == $sender_username_from_table){
   // check if the seen_status row is blank then update the row of that id as seen_status = seen or if the seen_status row is not equals to blank then there nothing will be updated
//    if ($select_seen_status_by_id_value == '') {
    $sql->update_all("messages", "`sender_seen_status` = 'seen'", "id", "$check_user_id");
// }
                            }

                            if($username == $reciver_username_from_table){
                                // check if the seen_status row is blank then update the row of that id as seen_status = seen or if the seen_status row is not equals to blank then there nothing will be updated
                                // if ($select_seen_status_by_id_value == '') {
                                 $sql->update_all("messages", "`reciver_seen_status` = 'seen'", "id", "$check_user_id");
                            //  }
                                                         }

                         






                            //  initializing all the message datas with the username and the reciver username
                            // $result_msg = $sql->msg_inbox("$username", "$get_username");
                            $result_msg_sender = $sql->msg_inbox("$username", "$get_username");
                            $result_msg_sender2 = $sql->msg_inbox("$username", "$get_username", "DESC");

                          $row =   $result_msg_sender2->fetch_assoc();
                        $sender_seen_new_status = $row['sender_seen_status'];
                            

                            // if there contains any data to the database
                            if ($result_msg_sender->num_rows > 0) {
                                // then get all the data as associative array and show this with the help of while loop
                                while ($row = $result_msg_sender->fetch_assoc()) {
                                    // check if the sender username is matching with the current loggedin username
                                    if ($row['sender_username'] == $username) {

                                        if($row['sender_seen_status'] !== 'seen'){
                                             // if it is matching then show its data with the text-primary color
                                        echo '
                                        <div class="col-12 ">
                                           
                                        <div class = "d-flex float-end">
                                        <div class="shadow p-3 mb-5 me-4 text-primary bg-body-tertiary rounded mt-0"> ' . $row['message'] . '</div>
                                        <img src="../../assets/img/IMG_20230214_124527_9 - Copy.png" class="rounded-circle" width="50px" height="50px" alt="" srcset="">
                                        </div>
                                       
                                        </div>
                                        <div class="row">
                                            <div class="col-12 " style="margin-top: -40px;">
                                            <div class="float-end text-secondary">
                                                (unseen by '.$username.')
                                            </div>    
                                            </div>

                                        </div>

                                     
                                    ';
                                        }else{
                                             // if it is matching then show its data with the text-primary color
                                        echo '
                                        <div class="col-12 ">
                                         

                                        <div class = "d-flex float-end">
                                        <div class="shadow p-3 mb-5 me-4 text-primary bg-body-tertiary rounded mt-0"> ' . $row['message'] . '</div>
                                        <img src="../../assets/img/IMG_20230214_124527_9 - Copy.png" class="rounded-circle" width="50px" height="50px" alt="" srcset="">
                                        </div>
                                        

                                       
                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-12 " style="margin-top: -40px;">
                                            <div class="float-end text-secondary">
                                                (seen by '.$username.')
                                            </div>    
                                            </div>

                                        </div>
                                    ';
                                        }
                                        

                                       
                                    }
                                    // or else it is not matching that means the data is not send by the loggedin user but it has been sent from the connected user and recived by the current loggedin user
                                    else {


                                        if($row['reciver_seen_status'] !== 'seen'){
                                            // if it is matching then show its data with the text-primary color
                                       echo '
                                       <div class="col-12 ">
                                          
                                       <div class = "d-flex float-start">
                                       <div class="shadow p-3 mb-5 me-4 text-dark bg-body-tertiary rounded mt-0"> ' . $row['message'] . '</div>
                                       <img src="../../assets/img/IMG_20230214_124527_9 - Copy.png" class="rounded-circle" width="50px" height="50px" alt="" srcset="">
                                       </div>
                                      
                                       </div>
                                       <div class="row">
                                           <div class="col-12 " style="margin-top: -40px;">
                                           <div class="float-start text-secondary">
                                               (unseen by '.$get_username.')
                                           </div>    
                                           </div>

                                       </div>

                                    
                                   ';
                                       }else{
                                            // if it is matching then show its data with the text-primary color
                                       echo '
                                       <div class="col-12 ">
                                        

                                       <div class = "d-flex float-start">
                                       <div class="shadow p-3 mb-5 me-4 text-dark bg-body-tertiary rounded mt-0"> ' . $row['message'] . '</div>
                                       <img src="../../assets/img/IMG_20230214_124527_9 - Copy.png" class="rounded-circle" width="50px" height="50px" alt="" srcset="">
                                       </div>
                                       

                                      
                                       
                                       </div>
                                       <div class="row">
                                           <div class="col-12 " style="margin-top: -40px;">
                                           <div class="float-start text-secondary">
                                               (seen by '.$get_username.')
                                           </div>    
                                           </div>

                                       </div>
                                   ';
                                       }
                                       







                                        // in that case show the data with the text-dark color
                                        // echo '
                                        //         <div class="col-12 ">
                                        //         <div class = "d-flex float-start">
                                        //         <img src="../../assets/img/IMG_20230214_124527_9 - Copy.png" class="me-4 rounded-circle" width="50px" height="50px" alt="" srcset="">

                                        //             <div class="shadow p-3 mb-5 text-dark bg-body-tertiary rounded mt-0"> ' . $row['message'] . '</div>
                                        //         </div>
                                            
                                            
                                        //         </div>
                                        //     ';
                                    }
                                }


                                // }
                            



                            }
                            // and if there is no data found on the database then show the message that no data found
                            else {
                                error_msg("No message data found !");
                            }




                            if (isset($_POST['send'])) {
                                $sender_name = $sql->html_special_chars($_POST['sender_name']);
                                $reciver_name = $sql->html_special_chars($_POST['reciver_name']);
                                $message = $sql->html_special_chars($_POST['message']);
                                // $sender_name = $sql->html_special_chars($_POST['sender_name']);
                            
                                $sql->insert_all("messages", "`sender_username`, `reciver_username`, `message`", "'$sender_name', '$reciver_name', '$message'");

                                // header("location: inbox?username=$get_username");
                            
                                echo '
                                        <script>
                                        window.location.href = "inbox_check?username=' . $get_username . '"
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
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
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