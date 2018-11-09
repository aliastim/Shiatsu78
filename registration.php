<?php
/**
 * Created by PhpStorm.
 * User: timotheecorrado
 * Date: 27/12/2017
 * Time: 16:36
 */

error_reporting(E_ALL);                     //Pas mettre en temps normal, juste pour afficher les erreurs sur mac, rien à voir avec composer
ini_set('display_errors', 1);   // Idem

require __DIR__ . "/bootstrap.php";


    echo $twig->render('registration.html.twig', [
        'title' => 'Inscription',
        'isConnected' => isset($_SESSION['isConnected']),

    ]);
