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

$statement = $gateway->getWines();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php 
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Year</th>
                    <th>Type</th>
                    <th>Temperature</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                    echo '<tr>';
                    echo '<td>' . $row['Name'] . '</td>';
                    echo '<td>' . $row['Description'] . '</td>';
                    echo '<td>' . $row['Year'] . '</td>';
                    echo '<td>' . $row['Type'] . '</td>';
                    echo '<td>' . $row['Temperature'] . '</td>';
                     echo '<td>'
                    . '<a href="viewWine.php?id='.$row['Wine_ID'].'">View</a> '
                    . '<a href="editWineForm.php?id='.$row['Wine_ID'].'">Edit</a> '
                    . '<a class="deleteWine" href="deleteWine.php?id='.$row['Wine_ID'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createWineForm.php">Create Wine</a></p>
    </body>
</html>
