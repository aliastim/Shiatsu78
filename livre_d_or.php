<?php

//session_start();

error_reporting(E_ALL);                     //Pas mettre en temps normal, juste pour afficher les erreurs sur mac, rien à voir avec composer
ini_set('display_errors', 1);   // Idem

require __DIR__ . "/bootstrap.php";

use App\Entity\Comment;

if (isset($_GET['comment']))
{
    if($_GET['comment']=="validate")
    {
        $status="validate";
    }
}


$repo     = $entityManager->getRepository(Comment::class);
$commentaires = $repo->findBy(
    array(
        'validate' => 'Validé',
    ),
    array
    (
        'id' => 'DESC',
    ),
    15,
    0

);


echo $twig->render('livre_d_or.html.twig', [
    'title' => 'SHIATSU 78 | St Léger en Yvelines / Maurepas - Livre d\'or',
    'isConnected' => isset($_SESSION['isConnected']),
    'commentaires' => $commentaires,
    'status'=> isset($status),
    //'username' => $_SESSION['username'],
]);
