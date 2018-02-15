<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/02/18
 * Time: 03:15
 */
if(isset($forgot))
{
    if(!$forgot)
    {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                              Ce email n'existe pas !
                             </div>";
    }
}
?>


<div class="row ">

    <div class="col-md-8 offset-md-2">
        <div class="card ">
            <div class="card-header">
               Mot de Passe oublié !
            </div>
            <div class="card-body">
                <h5 class="card-title">Veillez saisir vote email  </h5>
                <form method="post" id="signin">
                    <div class="container">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-10">
                                <?php echo $form->input('login','Email',['type'=>'email']); ?>
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
