<?php

if(isset($signup) )
{
    if($signup )
    {
        echo "<div class=\"alert alert-info\" role=\"alert\">
                                Veillez verifier votre email pour valider votre inscription !
                             </div>";
    }
    elseif(!$mail){
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                                Erreur lors de l'envoie du mail ! 
                             </div>";
    }
}
if(isset($forgot))
{
    if($forgot)
    {
        echo "<div class=\"alert alert-info\" role=\"alert\">
                              Veillez verifier votre email pour  pour changer votre mot de passe !
                             </div>";
    }
}


?>
 <div class="center">


     <div class="jumbotron">
         <h1 class="display-4">Bienvenue dans votre espace d'echange !</h1>
         <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, aperiam cupiditate dolores magnam maxime praesentium sed sit? Commodi consequatur cumque doloremque eligendi explicabo, ipsa iure odit quam repellat, tempora voluptate.</p>
         <hr class="my-4">
         <p>Vous avez un compte? Connecter vous sinon inscriver vous !</p>
         <p class="lead">
            <a  href="<?=RACINE."public/index.php?task=signup"?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"> S'inscrire</a>
            <a   href="<?=RACINE."public/index.php?task=signin"?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Se Connecter</a>
         </p>
     </div>


 </div>
