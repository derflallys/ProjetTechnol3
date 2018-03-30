<?php
if(isset($connect) ) {
    if (!$connect) {
        echo "<div class=\"alert alert-info\" role=\"alert\">
                                Vous devriez vous connecter pour ajouter un forum !
                             </div>";
    }
}
if(isset($addforum) ) {
    if (!$addforum) {
        echo "<div class=\"alert alert-info\" role=\"alert\">
                                Erreur lors de l'ajout du forum!
                             </div>";
    }
    else
    {
        echo "<div class=\"alert alert-success\" role=\"alert\">
                                Forum bien ajouté !
                             </div>";
    }
}
?>
<div class="container">
    <a class="btn btn-primary btn-sm" href="?task=addforum" role="button">Ajouter un forum</a>

    <h1 class="text-center"> Liste des forums </h1>
<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 09/03/18
 * Time: 00:01
 */
foreach ($forums as $forum) {
    ?>
<div class="row">
    <div class="card bg-primary ">
        <div class="card text-center">
            <div class="card-header">
                <?=$forum->titre?>
            </div>
            <div class="card-body ">
                <h5 class="card-title"><?=$forum->titre?></h5>
                <p class="card-text">
                    <?=$forum->contenu?>
                </p>
                <a href="<?=$forum->getUrl()?>" class="btn btn-primary">Consulter</a>
            </div>
            <div class="card-footer text-muted">
                <?=$forum->date_creation?>
            </div>
        </div>
    </div>
</div>
    <br>
    <?php
}
?>
</div>