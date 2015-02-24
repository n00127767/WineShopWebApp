<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
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
        <h1>Create Wine Form</h1>
        <?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="createWineForm" action="createWine.php" method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" value="" />
                            <span id="nameError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <input type="text" name="description" value="" />
                            <span id="descriptionError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Year</td>
                        <td>
                            <input type="text" name="year" value="" />
                            <span id="yearError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>
                            <input type="text" name="type" value="" />
                            <span id="typeError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Temperature</td>
                        <td>
                            <input type="text" name="temperature" value="" />
                            <span id="temeratureError" class="error"></span>
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
