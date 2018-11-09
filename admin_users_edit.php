<?php
/**
 * Created by PhpStorm.
 * User: timotheecorrado
 * Date: 28/12/2017
 * Time: 15:29
 */

error_reporting(E_ALL);                     //Pas mettre en temps normal, juste pour afficher les erreurs sur mac, rien à voir avec composer
ini_set('display_errors', 1);   // Idem

require __DIR__ . "/bootstrap.php";

if (isset($_SESSION['isConnected']))
{

    $id = $_GET['id'];
    $username = $_GET['mail'];
    $password = $_GET['password'];
    $firstname = $_GET['firstname'];
    $name = $_GET['name'];
    $num = $_GET['num'];


    if (isset($_GET['id']) AND isset($_GET['mail']) AND isset($_GET['password']) AND !empty($_GET['mail']) AND !empty($_GET['password']))
    {
        echo $twig->render('admin_users_edit.html.twig', [
            'title' => 'Modification d\'Utilisateurs',
            'id' => $id,
            'username' => $username,
            'password' => $password,
            'firstname' => $firstname,
            'name' => $name,
            'num' => $num,

            'isConnected' => isset($_SESSION['isConnected']),
        ]);
    }else
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