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

$id = $_POST['id'];
$name = $_POST['Name'];
$description = $_POST ['Description'];
$type = $_POST['Type'];
$year = $_POST['Year'];
$temperature = $_POST['Temperature'];

echo '<pre>';
print_r($_POST);
echo '</pre>';

$gateway->updateWine($id, $name, $description, $year, $type, $temperature);

header('Location: home.php');
