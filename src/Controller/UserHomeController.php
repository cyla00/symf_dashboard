<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Book;
use App\Form\AddBookFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\ORM\EntityManagerInterface;


class UserHomeController extends AbstractController
{
    /**
     * @Route("/user/home", name="user_home")
     */

    public function index()
    {

        $repository = $this->getDoctrine()->getRepository(Book::class);
        $book = $repository->findAll();

        return $this->render('user_home/index.html.twig', [
            'books' => $book,

            // 'booklistForm' =>createView(), 'css' =>"css/UserHome.css", 'js' =>"script/UserHome.js"


        ]);
    }
}
