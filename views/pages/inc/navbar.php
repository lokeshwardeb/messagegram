<?php

 

?>
<div class="container text-center fs-2">
<a href="/dashboard"><i class="fa-solid fa-house <?php


 if($active_class == 'dashboard'){
    echo 'text-primary';
 }else{
    echo 'text-dark';
 }

//  text-primary 
 
 ?> me-4"></i></a>

<a href=""><i class="fa-solid fa-people-group me-4 text-dark <?php



if($active_class == 'find_user'){
    echo 'text-primary';
 }else{
    echo 'text-dark';
 }

//  text-primary 

?>"></i></a>
<a href="/my_profile"><i class="fa-solid fa-user me-4  <?php



if($active_class == 'my_profile'){
    echo 'text-primary';
 }else{
    echo 'text-dark';
 }

//  text-primary 

?>"></i></a>

</div>