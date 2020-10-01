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

class AddBookController extends AbstractController
{
    /**
     * @Route("/AddBook", name="AddBook")
     */
    public function register(Request $request): Response
    {
        $user = $this->getUser();
        $book = new Book();
        $form = $this->createForm(AddBookFormType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->addBook($book);
            $book->setName($form->get('name')->getData())
            ->setReference($form->get('reference')->getData());

            //to erase don't forget put back the coma
            $wd = $form->getData()->getWrittingDate();
            $book->setWrittingDate(new \DateTime('now'));
            // ->setEditionDAte($form->getData()->getEditingDAte())
            $book->setEditionDAte(new \DateTime('now + 1 month'));
            $book->setTitle($form->get('title'));


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($book);
            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email


        }

        return $this->render('index/AddBook.html.twig', [
            'addbookForm' => $form->createView(), 'css' => 'css/AddBook.css', 'js' => 'script/AddBook.js'
        ]);
    }
}
