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
for ($i=0;$i<10;$i++) {
    ?>
<div class="row">
    <div class="card bg-primary ">
        <div class="card text-center">
            <div class="card-header">
                Auteur
            </div>
            <div class="card-body ">
                <h5 class="card-title">Titre Forum</h5>
                <p class="card-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est ex expedita laboriosam, magni natus nesciunt non odio provident quas qui quia, quod saepe ut. Architecto ipsa maiores nulla odio quae?
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad adipisci aspernatur dicta error esse exercitationem, explicabo harum libero maiores molestiae nesciunt nostrum nulla odio quis quod temporibus totam unde!
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium at corporis culpa, illo impedit labore, magnam minima nam neque possimus provident quae quasi quia quod ratione repudiandae soluta tenetur veniam.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa doloremque eligendi minima natus nesciunt optio velit! Alias consequatur, est et hic, illo ipsum labore maxime minus mollitia nisi, provident unde.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci animi commodi corporis cum dicta explicabo magnam minima modi natus nesciunt non odio porro, praesentium recusandae, repellat rerum sequi vel?
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam asperiores aspernatur at, culpa cumque debitis dicta iure iusto modi necessitatibus recusandae, repellat tempora unde velit? Aliquam aperiam consectetur perferendis?
                </p>
                <a href="#" class="btn btn-primary">Consulter</a>
            </div>
            <div class="card-footer text-muted">
                27-03-2017
            </div>
        </div>
    </div>
</div>
    <br>
    <?php
}
?>
</div>