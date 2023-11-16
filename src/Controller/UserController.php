<?php

namespace App\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Form\UserType;

class UserController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/user', name: 'app_user')]
    //route index 
    #[Route('/user/create', name: 'user_create')]
//to create a user
    public function create(Request $request): Response
    {

        $user = new User();
//used to create a form 
$form = $this->createForm(UserType::class, $user);

        return $this->render('user/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
//storing function 
#[Route('/user/form/store', name: 'form_store')]
public function store(Request $request): Response
{
    $user = new User();
    $form = $this->createForm(UserType::class, $user); 

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $this->redirectToRoute('form_success');
    }

    return $this->render('user/create.html.twig', [
        'form' => $form->createView(),
    ]);
}

#[Route('/user', name: 'form_success')]
public function success(): Response
{
    return $this->render('user_form/index.html.twig');
}
}
