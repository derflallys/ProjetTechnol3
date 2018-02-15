<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/08/17
 * Time: 11:21
 */
namespace core;
class Fonctions{
public function test_taille_fichier($fichier,$taille_permis){

    if( isset($fichier) ) // si formulaire soumis
    {

        $tmp_file = $fichier['tmp_name'];

        if( !is_uploaded_file($tmp_file) )
        {
            return 3;
        }

        // on vérifie maintenant l'extension
        $taille_file = $fichier['size'];


        if(  $taille_file > $taille_permis){

            return 0;

        }else{

            return 1;

        }
    }
}

public function traitement_fichier($id,$fichier,$type,$repertoire){

    if( isset($fichier) ) // si formulaire soumis
    {
        $content_dir = $repertoire; // dossier où sera déplacé le fichier

        $tmp_file = $fichier['tmp_name'];

        $extension = strrchr($fichier['name'], '.');

        $name_file = $id.$type.$extension;

        if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
        {
            return 'erreur';
            exit();
            //exit("Impossible de copier le fichier dans $content_dir");
        }
        return  $name_file;

    }
}

public function test_extension($fichier,$extension_permis){

    if( isset($fichier) ) // si formulaire soumis
    {

        $tmp_file = $fichier['tmp_name'];

        if( !is_uploaded_file($tmp_file) )
        {
            return 3;
        }

        // on vérifie maintenant l'extension
        $type_file = $fichier['type'];

        if($extension_permis=="im"){

            if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') && !strstr($type_file, 'png'))
            {
                return 0;
            }else{
                return 1;
            }

        } else if ($extension_permis=="pdf") {

            if( !strstr($type_file, 'pdf'))
            {
                return 0;
            }else{
                return 1;
            }

        }

    }
}

    public function sendmailconfim($post,$hashmail)
    {
        if (isset($post['nom']) && isset($post['prenom']) && isset($post['login']) )
        {

                $to = $post['login'];
                $subject = ' Confirmation de mail projettechno';
                $message ='Bonjour '.$post['nom'].'   '.$post['prenom'].'Veillez confirmer votre inscription en cliquant sur ce link :'.$hashmail;

                $headers = 'From: a.aboubacar.sylla@gmail.com';
                if(mail($to, $subject, $message, $headers))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }

    }

}

