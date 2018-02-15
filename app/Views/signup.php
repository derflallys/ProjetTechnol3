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
    S'inscrire
      </div>
      <div class="card-body">
        <h5 class="card-title">Veillez saisir vos informations</h5>
          <form method="post" id="signup">
              <div class="container">
                  <div class="row">
                      <div class="col"></div>
                      <div class="col-12">
                          <?php echo $form->input('nom','Nom'); ?>
                          <?php echo $form->input('prenom','Prenom'); ?>
                          <?php echo $form->input('codepostale','Code Postal'); ?>
                          <?php echo $form->input('login','Email',['type'=>'email']); ?>
                          <?php echo $form->input('password','Mot de passe ',['type'=>'password']); ?>
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