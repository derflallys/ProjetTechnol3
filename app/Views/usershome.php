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
if(isset($errors)){
    if(!$errors)
    {

        echo "<div class=\"alert alert-success\" role=\"alert\">
               Bienvenue dans votre session ".$user->nom."</div>";
    }
    }
if(isset($edit))    {
    if($edit)
    {

        echo "<div class=\"alert alert-success\" role=\"alert\">
               Profile bien edité </div>";
    }
    else
    {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
               Erreur lors de l'edition </div>";
    }
}
?>
    <a href="?task=updtateaccount" class="btn btn-success">Modifier mon Profil</a>
    <ul>
        <li>Nom: <?=$user->nom?></li>
        <li>Prenom: <?=$user->prenom?></li>
        <li>Email:<?=$user->login?> </li>
        <li>Code Postale:<?=$user->codepostale?> </li>
    </ul>

</div>