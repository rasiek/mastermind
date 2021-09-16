<?php
require_once('Mastermind.php');
session_start();

    if (!isset($_SESSION['game'])){

        $_SESSION['game'] = new Mastermind();

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/style.css">
    <script src="static/script.js" defer></script>
    <title>MasterMind</title>
</head>

<body>
    <div class="container">
        <h1>MasterMind</h1>
        <div class="res">
            <table id="table-props">
                <tr>
                    <th>Numéro</th>
                    <th>Proposition</th>
                    <th>Bien placé(s)</th>
                    <th>Mal placé(s)</th>
                </tr>

                <?php 
                if ($_SESSION['game']->tries > 0) {
                    
                    foreach ($_SESSION['game']->tries as $key => $value) {
                        
                        echo '<tr>';
                        echo '<th>' . ($key+1) . '</th>';
                        echo '<th>' . $value[0] . '</th>';
                        echo '<th>'. $value[1] . '</th>';
                        echo '<th>' . $value[2] . '</th>';
                        echo '</tr>';

                    }
                }
                ?>
            </table>

            <form id="form-try" method="POST" class="form-try">
                <label for="try">Saisir une proposition</label>
                <input type="text" name="try" id="num_try" pattern="[\d]{<?php echo $_SESSION['game']->getTaille(); ?>}"required>
                <button form="form-try" type="submit">Ok</button>
            </form>

            <form class="no-active" id="new-game">
                <p>Felicitations vous avez gagné</p>
                <button form="new-game" type="submit" formaction='webservices/wsDestroy.php'>New game</button>
            </form>
        </div>
    </div>
</body>

</html>