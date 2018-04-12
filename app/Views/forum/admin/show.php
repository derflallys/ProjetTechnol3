<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 30/03/18
 * Time: 01:42
 */
if(isset($commentforum))
{
    if($commentforum)
    {
        echo '<div class="alert alert-success" role="alert">
        Commentaire Bien ajouté
</div>';
    }
    else
    {
        echo '<div class="alert alert-success" role="alert">
        Erreur lors de l\'ajout du commentaire
</div>';
    }
}


?>
<h1>Details Forum <?=$forum->titre?></h1>
<div class="container">
    <div class="row">
        <div class="card bg-primary ">
            <div class="card text-center">
                <div class="card-header">
                    <form action="?task=admin.deleteForum" method="post">
                        <input type="hidden" name="id_forum" value="<?=$forum->id_forum?>">
                        <button type="submit" class="btn btn-danger" >
                            Supprimer
                        </button>
                    </form>

                    <?=$forum->date_creation?>

                </div>
                <div class="card-body ">
                    <h5 class="card-title"><?=$forum->titre?></h5>
                    <p class="card-text">
                        <blockquote class="blockquote">
                    <p class="mb-0"><?=$forum->contenu?></p>
                    <footer class="blockquote-footer"><?=$user->nom.'  '.$user->prenom?><cite title="Source Title"> Auteur</cite></footer>
                    </blockquote>

                    </p>
                    <button type="button" class="btn btn-primary"   id="addcommentaire">
                        Ajouter un Commentaire
                    </button>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <div class="card text-white bg-success mb-3" id="commentaire" >

                                <div class="card-body">
                                    <h5 class="card-title">Votre Commentaire</h5>
                                    <form method="post" >
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-10">
                                                    <?php echo $form->input('contenu_com','Commentaire',['type'=>'textarea']); ?>
                                                    <input type="text" name="id_parent" value="" hidden>

                                                    <?php echo $form->submit(); ?>
                                                </div>
                                                <div class="col-sm-1">

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>


                    <h3>Reponses</h3>
                    <?php foreach ($comments as $comment): if(is_null($comment->id_parent)) :?>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <div class="card border-success mb-3">
                                    <div class="card-header">
                                        <?=$comment->date_com?>
                                        <form action="?task=admin.deleteComment" method="post">
                                            <input type="hidden" name="id_commentForum" value="<?=$comment->id_commentForum?>">
                                            <button type="submit" class="btn btn-danger" >
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                    <div class="card-body text-success">
                                        <h5 class="card-title"></h5>
                                        <p class="card-text">
                                            <blockquote class="blockquote">
                                        <p class="mb-0"><?=$comment->contenu_com?></p>
                                        <footer class="blockquote-footer"><?=$ObjetUser->find($comment->id_user)->nom  .' '. $ObjetUser->find($comment->id_user)->prenom?><cite title="Source Title"> Auteur</cite></footer>
                                        </blockquote>

                                        </p>
                                        <button type="button" class="btn btn-primary btnreponse"   id="<?=$comment->id_commentForum?>">
                                            Ajouter une reponse
                                        </button>
                                        <div class="row">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-10">
                                                <div class="card text-white bg-info mb-3 reponse " id="<?='rep'.$comment->id_commentForum?>"  >
                                                    <div class="card-body">
                                                        <h5 class="card-title">Votre Commentaire</h5>
                                                        <form method="post" >
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-sm-1"></div>
                                                                    <div class="col-sm-10">
                                                                        <?php echo $form->input('contenu_com','Commentaire',['type'=>'textarea']); ?>
                                                                        <input type="text" name="id_parent" value="<?=$comment->id_commentForum?>" hidden>

                                                                        <?php echo $form->submit(); ?>
                                                                    </div>
                                                                    <div class="col-sm-1">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-1"></div>
                                        </div>
                                        <?php foreach ($ObjetComment->findAnswer($comment->id_commentForum) as $answer) {?>
                                            <div class="row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-8">
                                                    <div class="card border-info mb-3" >
                                                        <div class="card-header">
                                                            <?=$answer->date_com?>
                                                            <form action="?task=admin.deleteComment" method="post">
                                                                <input type="hidden" name="id_commentForum" value="<?=$answer->id_commentForum?>">
                                                                <button type="submit" class="btn btn-danger" >
                                                                    Supprimer
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="card-body text-info">
                                                            <h5 class="card-title"></h5>
                                                            <p class="card-text">
                                                                <blockquote class="blockquote">
                                                            <p class="mb-0"><?=$answer->contenu_com?></p>
                                                            <footer class="blockquote-footer"><?=$ObjetUser->find($answer->id_user)->nom  .' '. $ObjetUser->find($answer->id_user)->prenom?><cite title="Source Title"> Auteur</cite></footer>
                                                            </blockquote>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2"></div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-1"></div>

                        </div>
                    <?php endif; endforeach?>

                </div>

                <div class="card-footer text-muted">

                </div>
            </div>
        </div>
    </div>
</div>

