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

use App\Entity\User;

//dump($_POST);

$usernameinit = isset($_POST['mail']) ? $_POST['mail'] : null; // Si Isset username existe sinon on retourne null
$passwordinit = isset($_POST['password']) ? $_POST['password'] : null;


if (!empty($usernameinit) && !empty($passwordinit)) //si username et password sont différents de vide
{
    /** @var \App\Repository\UserRepository $repo */

    $repo = $entityManager->getRepository(User::class);
    $users = $repo->findAll();

    foreach ($users AS $user) {

        if ($usernameinit === $user->getMail() && password_verify($passwordinit, $user->getPassword())) {
            echo 'connecté';

            $_SESSION['isConnected']= true;
            $_SESSION['id'] = $user->getId();
            $_SESSION['username'] = $user->getMail();//$user['username']
            $_SESSION['password'] = $user->getPassword();//$user['password']
            $_SESSION['firstname'] = $user->getFirstname();
            $_SESSION['name'] = $user->getName();


            //dump($_SESSION);
            header('Location: admin_dashboard.php');

        } else
        {
            echo 'mauvais identifiants ';
            header("Location:login.php");


        }

       // die();

    }
} else
{
    header("Location:login.php");
}


