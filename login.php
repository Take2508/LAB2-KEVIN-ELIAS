<?php
include('config.php');
session_start();
if (isset($_POST['login'])) {

    $username = $_POST['usuario'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM usuarios WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        header("location: index.php");
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            header("location: principal.php");
        } else {
            header("location: index.php");
        }
    }
}
