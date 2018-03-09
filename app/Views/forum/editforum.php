<?php
if(isset($result))
{
    if(!$result){
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                               l'email que vous avez entré existe deja ! 
                             </div>";
    }

}




?>
<div class="row ">

    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                Ajouter un forum
            </div>
            <div class="card-body">
                <h5 class="card-title">Veillez saisir vos informations</h5>
                <form method="post" id="signup">
                    <div class="container">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-12">
                                <?php echo $form->input('titre','Titre'); ?>
                                <?php echo $form->input('contenu','Contenu',['type'=>'textarea']); ?>
                                <?php echo $form->submit(); ?>
                            </div>
                            <div class="col">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>