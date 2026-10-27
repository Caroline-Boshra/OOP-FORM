<?php
session_start();
include_once "../core/Validation.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $password = $_POST['password'] ?? '';

    $v = new Validation();

    $v->required('name', $name);

    $v->required('email', $email);
    $v->email('email', $email);

    $v->required('phone', $phone);

    $v->required('password', $password);
    $v->min('password', $password, 3);

    if ($v->hasError()) {
        $_SESSION['errors'] = $v->getErrors();
        $_SESSION['old'] = $_POST;
        
        header("Location: ../index.php");
        exit;
    }

    echo "Data sent Successfuly ";

} else {
    header("Location: ../index.php");
    exit;
}