<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Form\RegistrationFormType;

class IndexController extends AbstractController
{
    /**
     * @Route("", name="index")
     */
    public function index($otherParameters = false)
    {
        if ($this->getUser())
        {
          return $this->redirectToRoute('user_home');
        }

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);

        $parameters = ['registrationForm' => $form->createView()];

        if (isset($_GET) === TRUE)
        {
          $parameters = array_merge($parameters, $_GET);
        }

        return $this->render('index/index.html.twig', $parameters);
    }
}
