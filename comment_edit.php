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

$id = $_POST['id'];
$validate = $_POST['validate'];
$page_actuelle = intval($_POST['page_actuelle']);

//dump($_POST);

if (isset($_POST['id']) AND isset($_POST['validate']) AND isset($_POST['page_actuelle']))
{
    $repo = $entityManager->getRepository(Comment::class);
    $comments = $repo->findOneBy(['id'=>$id]);

    $comments->setValidate($validate);

    $entityManager->persist($comments);
    $entityManager->flush();

    header('Location:admin_dashboard.php?page='.$page_actuelle);

}else
{
    echo $twig->render('error.html.twig', [
        'title' => 'Erreur',
    ]);

    header('Location:index.php');
}