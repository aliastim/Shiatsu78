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

use App\Entity\User;

$name = $_POST['name'];
$firstname = $_POST['firstname'];
$num = $_POST['num'];
$email = $_POST['mail'];
$password = $_POST['password'];

if (isset($_POST['name']) AND isset($_POST['password']) AND isset($_POST['firstname']) AND isset($_POST['num']) AND isset($_POST['mail']) AND !empty($_POST['name']) AND !empty($_POST['password']) AND !empty($_POST['firstname']) AND !empty($_POST['num']) AND !empty($_POST['mail']))
{

    $repo = $entityManager->getRepository(User::class);

    $user = new User();

    $user->setName($name);
    $user->setFirstname($firstname);
    $user->setNum($num);
    $user->setMail($email);
    $user->setPassword($password);

    $entityManager->persist($user);
    $entityManager->flush();

    header('Location:admin_users_list.php');

}else
{
    echo $twig->render('error.html.twig', [
        'title' => 'Erreur',
    ]);

    header('Location:index.php');
}