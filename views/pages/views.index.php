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

                    $username = $_SESSION['username'];

                    $result = $sql->join_sql_where("chat_users", "users", "ch", "u", "username", "$username");
                    // $result = $sql->join_2_sql_all("chat_users", "users", "messages", "cu", "u", "m", "username", "sender_username");
                    // $result = $sql->show_where('chat_users', "username", "$username");
                    // $result = $sql->show_where('messages', "sender_username", "$username");
                    
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo '
       
        
        <tr>
     

        <td>
        <a href = "/inbox_check?username='.$row['connected_username'].'">
        <img src="'.$row['img_name'].'" width="50px" height="50px" alt="" srcset="" class="rounded-circle">'.$row['connected_username'].'
        </a>
        </td>

        <td class="fw-bold">
        <a href = "/inbox_check?username='.$row['connected_username'].'">
        '.$row['message'].'
        </a>
        </td>
        </tr>
        
        
        </a>
        
        
        '
        
        ;
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