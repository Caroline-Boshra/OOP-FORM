<?php
session_start();
include_once "../core/Validation.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $validation = new Validation($_POST);

    $validation->validate([
        "name" => ["required", "string"],
        "email" => ["required", "email"],
        "password" => ["required", "string", "min:3"],
        "phone" => ["required", "string"]
    ]);

    if (empty($validation->getErrors())) {
        echo "Data is valid";
    } else {
        $_SESSION['errors'] = $validation->getErrors();
        $_SESSION['old'] = $_POST;
        
        header("Location: ../index.php"); 
        exit;
    }
} else {
    header("Location: ../index.php");
    exit;
}
