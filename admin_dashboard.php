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

use App\Entity\Comment;

if (isset($_SESSION['isConnected']))
{
    $page = intval($_GET['page'] ?? 1);

    if (is_int($page) AND $page !== 0) {
        /*dump('test');*/


        /** @var \App\Repository\CommentRepository $repo */
        $repo          = $entityManager->getRepository(Comment::class);
        /*$comments      = $repo->loadAll(Comment::MAX_PER_PAGE, ($page - 1) * Comment::MAX_PER_PAGE);*/
        /*Chargement en sens inverse :*/
        $comments = $repo->findBy(
            array(),
            array('id' => 'DESC'),
            Comment::MAX_PER_PAGE,
            ($page - 1) * Comment::MAX_PER_PAGE
        );
        $count         = $repo->count(); //Nombre de commentaires
        $maxPagination = (int)ceil($count / Comment::MAX_PER_PAGE);
        $minPage       = (int)max(1, ($page - 1));
        $maxPage       = (int)max($maxPagination, ($page + 1));
        $max           = 0;

        while (abs($minPage - $maxPage) < 15) {

            if ($minPage > 1) {
                $minPage--;
            }

            if ($maxPage < $maxPagination) {
                $maxPage++;
            }

            $max++;

            if ($max > 10) {
                break;
            }
        }
    } else
    {
        header('Location:admin_dashboard.php?page=1');
    }

    echo $twig->render('admin_dashboard.html.twig', [
        'title' => 'Admin - Tableau de bord',
        //'extract' => $extract,
        'currentPage' => $page,
        'maxPagination' => $maxPagination,
        'minPage' => $minPage,
        'maxPage' => $maxPage,
        'comments' => $comments,
        'isConnected' => isset($_SESSION['isConnected']),


    ]);

}
else
{
    header('Location:login.php');
}