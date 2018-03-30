<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 30/03/18
 * Time: 01:42
 */



?>
<div class="container">
    <div class="row">
        <div class="card bg-primary ">
            <div class="card text-center">
                <div class="card-header">
                    <?=$user->nom.'  '?> <?=$user->prenom?>
                </div>
                <div class="card-body ">
                    <h5 class="card-title"><?=$forum->titre?></h5>
                    <p class="card-text">
                        <?=$forum->contenu?>
                    </p>
                    <h3>Reponses</h3>
                    <?php foreach ($comments as $comment): if(is_null($comment->id_parent)) :?>
                    <div class="row">
                        <div class="card bg-primary ">
                            <div class="card text-center">
                                <div class="card-header">
                                    <?=$ObjetUser->find($comment->id_user)->nom  . $ObjetUser->find($comment->id_user)->prenom?>
                                </div>
                                <div class="card-body ">
                                    <h5 class="card-title"><?=$comment->date_com?></h5>
                                    <p class="card-text">
                                        <?=$comment->contenu?>
                                    </p>
                                    <?php array_splice($comments, 0,1); foreach ($comments as $answer):if(is_null($answer->id_parent)) break;?>
                                    <div class="row">
                                        <div class="card bg-primary ">
                                            <div class="card text-center">
                                                <div class="card-header">
                                                    <?=$ObjetUser->find($answer->id_user)->nom  . $ObjetUser->find($answer->id_user)->prenom?>
                                                </div>
                                                <div class="card-body ">
                                                    <h5 class="card-title"><?=$answer->date_com?></h5>
                                                    <p class="card-text">
                                                        <?=$answer->contenu?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <?php array_splice($comments, 1,1); endforeach;?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php endif; endforeach?>
                </div>
                <div class="card-footer text-muted">
                    <?=$forum->date_creation?>
                </div>
            </div>
        </div>
    </div>
</div>
