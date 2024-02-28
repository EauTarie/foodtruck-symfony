<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Menu;

#[Route('/api', name:'api_')]
class MenuController extends AbstractController
{
    #[Route('/menus', name: 'menu_index', methods:['get'])]
    public function index(EntityManagerInterface $entityManager): JsonResp
    {
        return $this->render('menu/index.html.twig', [
            'controller_name' => 'MenuController',
        ]);
    }
}
