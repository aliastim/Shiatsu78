<?php

//session_start();

error_reporting(E_ALL);                     //Pas mettre en temps normal, juste pour afficher les erreurs sur mac, rien à voir avec composer
ini_set('display_errors', 1);   // Idem

require __DIR__ . "/bootstrap.php";

echo $twig->render('mentions_legales.html.twig', [
    'title' => 'SHIATSU 78 | Mentions Légales',
    'isConnected' => isset($_SESSION['isConnected']),
]);
