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
           Bienvenue dans votre session </div>";
}
else
{
    echo "<div class=\"alert alert-danger\" role=\"alert\">
  Logging ou mot de passe incorrect !
    </div>";
}
?>
</div>