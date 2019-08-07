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

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$num = $_POST['num'];
$name = $_POST['name'];
$firstname = $_POST['firstname'];

//dump($_POST);

if (isset($_POST['id']) AND isset($_POST['password']) AND isset($_POST['username']) AND !empty($_POST['password']) AND !empty($_POST['username']))
{
    $repo = $entityManager->getRepository(User::class);
    $users = $repo->findOneBy(['id'=>$id]);

    $users->setMail($username);
    $users->setPassword($password);
    $users->setNum($num);
    $users->setName($name);
    $users->setFirstname($firstname);

    $entityManager->persist($users);
    $entityManager->flush();

    header('Location:admin_users_list.php');

}else
{
    echo $twig->render('error.html.twig', [
        'title' => 'Erreur',
    ]);

    header('Location:index.php');
}