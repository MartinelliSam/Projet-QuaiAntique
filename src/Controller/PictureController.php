<?php

namespace App\Controller;

use App\Entity\Picture;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PictureController extends AbstractController
{
    #[Route('/picture', name: 'app_picture')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $pictures = $entityManager->getRepository(Picture::class)->findAll();
        return $this->render('picture/picture.html.twig', [
            'pictures' => $pictures,
            'controller_name' => 'PictureController'
        ]);
    }
}
