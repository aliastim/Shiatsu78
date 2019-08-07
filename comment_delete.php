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

if (isset($_SESSION['isConnected']))
{

    $id = $_POST['id'];
    $page_actuelle = intval($_POST['page_actuelle']);

    if (isset($_POST['id']))
    {
        $repo = $entityManager->getRepository(Comment::class);
        $comment = $repo->find(['id'=>$id]);

        $entityManager->remove($comment);
        $entityManager->flush();

        header('Location:admin_dashboard.php?page='.$page_actuelle);

    } else

    {
        echo $twig->render('error.html.twig', [
            'title' => 'Erreur',
        ]);

        header('Location:index.php');
    }

}
else
{
    header('Location:login.php');
}