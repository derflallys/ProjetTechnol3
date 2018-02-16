<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/02/18
 * Time: 00:08
 */
if(isset($updatemdp))
{
    if(!$updatemdp)
    {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                                Les deux mots de passes ne sont pas identifques ! 
                             </div>";
    }
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
                                <?php echo $form->input('password','Mot de passe ',['type'=>'password']); ?>
                                <?php echo $form->input('confirmpassword','Corfimation Mot de passe ',['type'=>'password']); ?>
                                <?php echo $form->submit(); ?>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
