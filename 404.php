<?php

//session_start();

error_reporting(E_ALL);                     //Pas mettre en temps normal, juste pour afficher les erreurs sur mac, rien à voir avec composer
ini_set('display_errors', 1);   // Idem

require __DIR__ . "/bootstrap.php";

/*Redirige l'utilisateur après 5 secondes*/
header('refresh: 5; url=index.php');

echo $twig->render('404.html.twig', [
    'title' => 'SHIATSU 78 | Page inexistante',
    'isConnected' => isset($_SESSION['isConnected']),
]);
