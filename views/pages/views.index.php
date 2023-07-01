<?php
// echo 'welcome to the view index';
require __DIR__ . "/../../config/conn.php";

?>

<?php
require "inc/_header.php";
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
require "inc/navbar.php";


?>


<?php
// this is the loggedin user title bar
require "inc/_user_loggedin_title_bar.php";

?>
<style>
    a{
        color: black;
        text-decoration: none;
    }
</style>

        <table class="table table-hover">
            <thead>
                <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col"></th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
              
                    <?php

// getting the loggedin username
                    $username = $_SESSION['username'];

                    // joining the tables chat_users and username by matching the $username
                    $result = $sql->join_sql_where("chat_users", "users", "ch", "u", "username", "$username");
                    // $result = $sql->join_2_sql_all("chat_users", "users", "messages", "cu", "u", "m", "username", "sender_username");
                    // $result = $sql->show_where('chat_users', "username", "$username");
                    // $result = $sql->show_where('messages', "sender_username", "$username");
                    

                    // if there has any data on the database
if($result->num_rows > 0){
    // then getting all the data as associative array with the help of the while loops
    while($row = $result->fetch_assoc()){
        // getting the reciver username from the connected_username row
        $reciver_username = $row['connected_username'];

        // displaying the username and the userimage from the row
        echo '
       
        
        <tr>
     

        <td>
        <a href = "/inbox_check?username='.$row['connected_username'].'">
        <img src="'.$row['img_name'].'" width="50px" height="50px" alt="" srcset="" class="rounded-circle">'.$row['connected_username'].'
        </a>
        </td>';?>

        <?php

// gettting the messages table datas with the msg_inbox sql function order by desc
        $result_msg = $sql->msg_inbox("$username", "$reciver_username", "DESC");

        // if there has any data in the database
        if($result_msg->num_rows > 0){

            // then getting all the data as an associtive array
            $row = $result_msg->fetch_assoc();
            //  $row['message'];
            
            // getting the reciver seen status from the database
             $reciver_seen_status = $row['reciver_seen_status'];
            //  getting the sender seen status from the database
             $sender_seen_status = $row['sender_seen_status'];
            //  getting the reciver username from the database
             $reciver_username_table = $row['reciver_username'];
            //  getting the sender username from the database
             $sender_username_table = $row['sender_username'];
        }
// $reciver_username

// checking if the current loggedin username is equals to the table reciver username
if($username == $reciver_username_table){
    
        
        // then show the message with the bold style
        echo '

        <td class="fw-bold">
        <a href = "/inbox_check?username='.$reciver_username.'">
        '.$row['message'].'
        </a>
        </td>
        </tr>
        
        
        </a>
        
        
        '
        
        ;
    
}

// if loggedin username is equals to sender username from table
if($username == $sender_username_table){

    // then show the message as normal style
    echo '

    <td class="fw-normal">
    <a href = "/inbox_check?username='.$reciver_username.'">
    '.$row['message'].' <span class="text-secondary">(me)</span>
    </a>
    </td>
    </tr>
    
    
    </a>
    
    
    '
    
    ;

}
        
     
    }
}

                 
                    ?>
              
            </tbody>
        </table>
    </div>



</div>

    <?php
    require "inc/_footer.php";

    ?>