<?php
require_once 'Connection.php';
require_once 'ManagerTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$wineryGateway = new WineryTableGateway($connection);

$winery = $wineryGateway->getWinery();
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
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h2>View Winery</h2>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact Name</th>
                    <th>Contact Phone</th>
                    <th>Email</th>
                    <th>Web Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $winery->fetch(PDO::FETCH_ASSOC);
                while ($row) {


                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['contact name'] . '</td>';
                    echo '<td>' . $row['contact phone'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['web address'] . '</td>';
                    echo '<td>'
                    . '<a href="viewWinery.php?id='.$row['id'].'">View</a> '
                    . '<a href="editWineryForm.php?id='.$row['id'].'">Edit</a> '
                    . '<a class="deleteWinery" href="deleteWinery.php?id='.$row['id'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';

                    $row = $winery->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createWineryForm.php">Create Winery</a></p>
        <?php require 'footer.php'; ?>
    </body>
</html>

