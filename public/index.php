<?php

require_once(dirname(__FILE__, 2). '/src/config/config.php');
require_once(dirname(__FILE__, 2). '/src/models/User.php');

$user = new User(['name' => 'Lucas', 'email' => 'lucas@cod3r.com.br']);
// echo $user->getSelect();

foreach (User::get([], 'name') as $user) {
    echo $user->name;
    echo '<br>'; 
}
