<?php
/**
 * Created by PhpStorm.
 * User: timotheecorrado
 * Date: 21/12/2017
 * Time: 11:07
 */

error_reporting(E_ALL);                     //Pas mettre en temps normal, juste pour afficher les erreurs sur mac, rien à voir avec composer
ini_set('display_errors', 1);   // Idem

require __DIR__ . "/bootstrap.php";


$event = $_POST['id'];
$event_name = $_POST['name'];
$lien = $_POST['lien'];
$description = $_POST['description'];
$date = $_POST['date'];

$mail = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
$name = $_SESSION['name'];


if (isset($_POST['id']) AND ($_SESSION['isConnected']))
{
    echo $twig->render('event.html.twig', [
        'title' =>  $event_name,
        'name' => $event_name,
        'lien' => $lien,
        'date' => $date,
        'description' => $description,
        'name2' => $name,
        'firstname'=> $firstname,
        'mail' => $mail,
        'isConnected' => isset($_SESSION['isConnected']),
    ]);
}else
{
    /*echo $twig->render('error.html.twig', [
        'title' => 'Erreur',
    ]);*/

    header('Location:login.php');
}