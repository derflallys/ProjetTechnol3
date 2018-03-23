<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/01/18
 * Time: 22:16
 */

?>


<div class="container">
<?php
if(!$errors)
{

    echo "<div class=\"alert alert-success\" role=\"alert\">
           Bienvenue dans votre session ".$user->nom."</div>";
}
var_dump($user);
?>

    <ul>
        <li>Nom: <?=$user->nom?></li>
        <li>Prenom:</li>
        <li>Pseudo: </li>
        <li>Email: </li>
        <li>Code Postale: </li>
    </ul>

</div>