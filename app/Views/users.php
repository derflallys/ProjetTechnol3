<?php
    if(isset($verified)) {
        if($verified)
        {
            ?>
            <div class="alert alert-info" role="alert">
                Vous avez deja confirmé votre inscription .
            </div>
            <?
        }
        else{
            ?>
            <div class="alert alert-info" role="alert">
                Inscription Confirmé !
            </div>
            <?php
        }

    }
?>

<div>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col"> Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Username</th>
            <th scope="col">Code Postale</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $count = 0; foreach ($users as $userr){ ?>
        <tr>
            <th scope="row"><?=$count?></th>
            <td><?=$userr->nom ?></td>
            <td><?=$userr->prenom ?></td>
            <td><?=$userr->login ?></td>
            <td><?=$userr->codepostale ?></td>
            <td>
                <form action="?task=delete" method="post" style="display:inline-block;">
                    <input type="hidden" name="id_user" value="<?=$userr->id_user?>">
                    <button type="submit" href="?task=delete&id=<?=$userr->id_user; ?>" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php $count++; } ?>
        </tbody>
    </table>

</div>