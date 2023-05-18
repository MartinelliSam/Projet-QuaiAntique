<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditUserType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('ROLE_USER')]
class EditUserController extends AbstractController
{
    #[Route('/editUser/', name: 'app_edit_user', methods: ['POST', 'GET'])]
    public function edit(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher): Response
    {

        $user = $this->getUser();

        if(!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(EditUserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                $user = $form->getData();
                $entityManager->persist($user);
                $entityManager->flush();

                $this->addFlash(
                    'success',
                    'Vos informations ont bien été mises à jour'
                );

                return $this->redirectToRoute('app_user');

        }

        return $this->render('user/editUser.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'EditUserController'
        ]);
    }
}
