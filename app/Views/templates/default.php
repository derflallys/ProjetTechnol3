<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Projet Techologique</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<nav>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="?task=home">Home</a>
        </li>
        <?php
        if(isset($_SESSION['auth']))
        {

            if(strcmp($_SESSION['role'],'admin')==0)
            {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="?task=forum.admin.index">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?task=admin.alerts">Alerts</a>
                </li>

        <?php

        }
        else
        {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="?task=forum">Forum</a>
            </li>
            <?php
        }
        }
        else{
            ?>
            <li class="nav-item">
                <a class="nav-link" href="?task=forum">Forum</a>
            </li>
            <?php
        }



        ?>

        <?php
        if(isset($_SESSION['auth']))
        {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="?task=disconnect">Disconnect</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?task=signin">Mon Compte</a>
            </li>

            <?php
        }
        ?>


    </ul>
</nav>
<div class="container">
    <?=$content?>



</div>


<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="<?= RACINE."app/Views/templates/myjs.js"?>" ></script>
</body>
</html>