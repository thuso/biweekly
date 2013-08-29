<?php
    include_once 'user.php';
 
    $username = "thuso";
    $email = "mokgatlhe@gmail.com";
       $use = new user($username, $email);
   // $use->user($username, $email);
    echo $use->displayUserInfo(); 
?>
