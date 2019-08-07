<?php
/**
 * Created by PhpStorm.
 * User: timotheecorrado
 * Date: 28/12/2017
 * Time: 16:39
 */

error_reporting(E_ALL);                     //Pas mettre en temps normal, juste pour afficher les erreurs sur mac, rien à voir avec composer
ini_set('display_errors', 1);   // Idem

require __DIR__ . "/bootstrap.php";

use App\Entity\Comment;

$text = $_POST['comment'];
$commenter = $_POST['commenter'];

if (isset($_POST['commenter']) AND isset($_POST['comment']) AND !empty($_POST['commenter']) AND !empty($_POST['comment']))
{

    $repo = $entityManager->getRepository(Comment::class);

    $comment = new Comment();

    $comment->setCommenter($commenter);
    $comment->setText($text);
    $comment->setValidate("Non validé");

    $entityManager->persist($comment);
    $entityManager->flush();

    header('Location:livre_d_or.php?comment=validate');

}else
{

    header('Location:livre_d_or.php?erreur=1');
}