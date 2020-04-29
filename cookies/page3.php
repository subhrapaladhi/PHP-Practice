<?php 
$user = ['name' => 'subhra', 'email' =>"subhrapaladhi9@gmail.com",
    'age' => 20];

$user = serialize($user);
setcookie('user', $user, time()+86400);
print_r($_COOKIE);
echo 'name of user'.$_COOKIE['user'];