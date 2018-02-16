<?php
if (isset($errors))
{
    if($errors)
    {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                        Logging ou mot de passe incorrect !
                     </div>";
        echo "<div class=\"alert alert-warning\" role=\"alert\">
                       Si vous avez pas encore validé votre email ,vous ne pouvez pas vous connectez !
                        click <a href='index.php?task=resendmail'>ici</a>  pour vous renvoyer le mail de confirmation 
                     </div>";
    }
    unset($errors);
}


?>
<div class="row ">

    <div class="col-md-8 offset-md-2">
        <div class="card ">
            <div class="card-header">
                Se connecter
            </div>
            <div class="card-body">
                <h5 class="card-title">Veillez saisir votre email et votre mot de passe </h5>
                <form method="post" id="signin">
                    <div class="container">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-10">
                                <?php echo $form->input('login','Login'); ?>
                                <?php echo $form->input('password','Mot de passe ',['type'=>'password']); ?>
                                <?php echo $form->submit(); ?>

                            </div>
                            <div class="col">
                                <a href="?task=forget" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Mot de passe oublié ?</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>