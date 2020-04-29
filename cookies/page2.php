<?php
    if(isset($_COOKIE['username'])){
        echo 'User '.$_COOKIE['username'].' is set<br>';
        print_r($_COOKIE);
    }else{
        echo 'User not set';
    }
?>