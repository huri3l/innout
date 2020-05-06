<?php
session_start();
requireValidSession();

$user = $_SESSION['user'];

$registries = WorkingHOurs::getMonthlyReport($user->id, new DateTime());

loadTemplateView('monthly_report', [
    'registries' => $registries
]);