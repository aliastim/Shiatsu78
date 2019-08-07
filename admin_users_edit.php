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

    $id = $_POST['id'];
    $username = $_POST['mail'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $name = $_POST['name'];
    $num = $_POST['num'];


    if (isset($_POST['id']) AND isset($_POST['mail']) AND isset($_POST['password']) AND !empty($_POST['mail']) AND !empty($_POST['password']))
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