<?php
loadModel('Login');
$exception = NULL;

if(count($_POST) > 0); {
    $login = new Login($_POST);
    try {
        $user = $login->checkLogin();
        echo "Usuário {$user->name} logado :D";

    } catch(AppException $e) {
        $exception = $e;
    }
}

loadView('login', $_POST + ['exception' => $exception]);
