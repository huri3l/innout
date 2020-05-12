<?php
session_start();
requireValidSession(true);

$exception = NULL;
$userData = [];

if(count($_POST) === 0 && isset($_GET['update'])) {
    $user = User::getOne(['id' => $_GET['update']]);
    $userData = $user->getValues();
    $userData['password'] = NULL;
}
else if(count($_POST) > 0 ){
    try {
        $dbUser = new User($_POST);
        if(is_null($_POST['id']) || $_POST['id'] === '') {
            unset($_POST['id']);
            var_dump($_POST['id']);
            $dbUser->insert();
            addSuccessMsg('Usuário cadastrado com sucesso!');
        }
        else {
            $dbUser->update();
            addSuccessMsg('Usuário alterado com sucesso!');
            header('Location: users.php');
            exit();
        }
        $_POST = [];
    } 
    catch(Exception $e) {
        $exception = $e;
    }
    finally {
        $userData = $_POST;
    }
}

loadTemplateView('save-user', $userData + ['exception' => $exception]);