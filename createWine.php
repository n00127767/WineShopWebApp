<?php
require_once 'Wine.php';
require_once 'Connection.php';
require_once 'WineTableGateway.php';


$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new WineTableGateway($connection);

$name = $_POST['name'];
$description = $_POST['description'];
$year = $_POST['year'];
$type = $_POST['type'];
$temperature= $_POST['temperature'];



// validate form data

// if valid {

//$wine = new Wine($name, $description, $year, $type, $temperature);

//$wines[] = $wine;

//$_SESSION['wines'] = $wines;

//$message = "Wine created successfully";

$id = $gateway->insertWine($name, $description, $year, $type, $temperature);

header('Location: home.php');




