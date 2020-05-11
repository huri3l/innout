<?php
session_start();
requireValidSession();

$exception = NULL;


if(count($_POST) > 0 ){
    try {
        $newUser = new User($_POST);
        $newUser->insert();
        addSuccessMsg('Usuário cadastrado com sucesso!');
        $_POST = [];
    } 
    catch(Exception $e) {
        $exception = $e;
    }
}

loadTemplateView('save-user', $_POST + ['exception' => $exception]);