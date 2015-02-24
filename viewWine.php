<?php
require_once 'Wine.php';
require_once 'Connection.php';
require_once 'WineTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new WineTableGateway($connection);

$statement = $gateway->getWineById($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/wine.js"></script>
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
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Name</td>'
                    . '<td>' . $row['Name'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Description</td>'
                    . '<td>' . $row['Description'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Year</td>'
                    . '<td>' . $row['Year'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Type</td>'
                    . '<td>' . $row['Type'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Temperature</td>'
                    . '<td>' . $row['Temperature'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    
                ?>
            </tbody>
        </table>
        <p>
            <a href="editWineForm.php?id=<?php echo $row['Wine_ID']; ?>">
                Edit Wine</a>
            <a class="deleteWine" href="deleteWine.php?id=<?php echo $row['id']; ?>">
                Delete Wine</a>
        </p>
    </body>
</html>

