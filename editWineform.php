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
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/wine.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Edit Wine Form</h1>
        <?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editWineForm" name="editWineForm" action="EditWine.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="Name" value="<?php
                                if (isset($_POST) && isset($_POST['name'])) {
                                    echo $_POST['Name'];
                                }
                                else echo $row['Name'];
                            ?>" />
                            <span id="nameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['name'])) {
                                    echo $errorMessage['name'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <input type="text" name="Description" value="<?php
                                if (isset($_POST) && isset($_POST['description'])) {
                                    echo $_POST['Description'];
                                }
                                else echo $row['Description'];
                            ?>" />
                            <span id="descriptionError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['description'])) {
                                    echo $errorMessage['Description'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Year</td>
                        <td>
                            <input type="text" name="Year" value="<?php
                                if (isset($_POST) && isset($_POST['year'])) {
                                    echo $_POST['Year'];
                                }
                                else echo $row['Year'];
                            ?>" />
                            <span id="yearError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['year'])) {
                                    echo $errorMessage['year'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>
                            <input type="text" name="Type" value="<?php
                                if (isset($_POST) && isset($_POST['type'])) {
                                    echo $_POST['Type'];
                                }
                                else echo $row['Type'];
                            ?>" />
                            <span id="typeError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['type'])) {
                                    echo $errorMessage['type'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Temperature</td>
                        <td>
                            <input type="text" name="Temperature" value="<?php
                                if (isset($_POST) && isset($_POST['temperature'])) {
                                    echo $_POST['Temperature'];
                                }
                                else echo $row['Temperature'];
                            ?>" />
                            <span id="temeratureError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['temperature'])) {
                                    echo $errorMessage['Temperature'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create Wine" name="createWine" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>

