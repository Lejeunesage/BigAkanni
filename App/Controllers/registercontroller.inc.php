<?php
require "RegisterController.php";

if($_SERVER["REQUEST_METHOD"] === "POST" & isset($_POST["inscription"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $confirm_pwd = $_POST["confirm_pwd"];

$controller = new Controller($fname, $lname, $email, $pwd, $confirm_pwd);
$controller->verifyControl();
} 
else {
    header("Location:../../public/sign_up.php?msg=error");
    exit();
}