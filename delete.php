<?php
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
    exit();
}

if (isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "nintendohub";
    @include 'config.php';

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM games WHERE id=$id";
    $connection->query($sql);
}

header("location: admin_page.php");
exit;

?>