<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/04/18
 * Time: 23:37
 */




?>

<div class="container">
    <h2>Les Forums signalés</h2>
    <?php
    if(empty($forums)){
        echo '<div class="alert alert-info" role="alert">
        Il n\'y a pas d\'alert au niveau des forums ! 
</div>';
    }else
    {
    foreach ($forums as $forum) {
        ?>
        <div class="row">
            <div class="card bg-primary ">
                <div class="card text-center">
                    <div class="card-header">
                        <form action="?task=admin.deleteForum" method="post">
                            <input type="hidden" name="id_forum" value="<?= $forum->id_forum ?>">
                            <button type="submit" class="btn btn-danger">
                                Supprimer
                            </button>
                        </form>

                        <?= $forum->date_creation ?>

                    </div>
                    <div class="card-body ">
                        <h5 class="card-title"><?= $forum->titre ?></h5>
                        <p class="card-text">
                            <blockquote class="blockquote">
                        <p class="mb-0"><?= $forum->contenu ?></p>
                        </blockquote>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    }
    ?>

    <h2>Les Commentaires signalés</h2>
    <?php
    if(empty($comments)) {
        echo '<div class="alert alert-info" role="alert">
            Il n\'y a pas d\'alert au niveau des commentaires ! 
    </div>';
    }
    else {
        foreach ($comments as $comment) {
            ?>
            <div class="row">
                <div class="card bg-primary ">
                    <div class="card text-center">
                        <div class="card-header">
                            <?= $comment->date_com ?>
                            <form action="?task=admin.deleteComment" method="post">
                                <input type="hidden" name="id_commentForum" value="<?= $comment->id_commentForum ?>">
                                <button type="submit" class="btn btn-danger">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                        <div class="card-body ">
                            <p class="card-text">
                                <blockquote class="blockquote">
                            <p class="mb-0"><?= $comment->contenu_com ?></p>
                            <footer class="blockquote-footer"><?= $ObjetUser->find($comment->id_user)->nom . ' ' . $ObjetUser->find($comment->id_user)->prenom ?>
                                <cite title="Source Title"> Auteur</cite></footer>
                            </blockquote>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>





