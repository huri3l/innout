<?php
$errors = [];

if($exception) {
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];

    if(get_class($exception) === 'ValidationException') {
        $errors = $exception->getErrors();
    }
}

$alertType = '';

if($message['type'] === 'error') {
    $alertType = 'danger';
} else if($message['type'] === 'info') {
    $alertType = 'info';
} else if($message['type'] === 'warning') {
    $alertType = 'warning';
} else {
    $alertType = 'success';
}
?>
<?php if($message): ?>
    <div role="alert"
    class="my-3 alert alert-<?= $alertType ?>">
        <?= $message['message'] ?>
    </div>
<?php endif ?>