<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Plat;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/myapi', name: 'api_')]
class PlatController extends AbstractController
{
    #[Route('/plat', name: 'plat_index', methods:['GET'])]
    public function index(EntityManagerInterface $entityManager): JsonResponse
    {
        $plats = $entityManager
        ->getRepository(Plat::class)
        ->findAll();

        $data = [];

        foreach($plats as $plat) {
            $data[] = [
                'id' => $plat->getId(),
                'nom' => $plat->getNom(),
                'prix' => $plat->getPrix(),
            ];
        }

        return $this->json($data);
    }

    #[Route('/plat', name: 'plat_create', methods:['POST'])]
    public function create(EntityManagerInterface $entityManager, Request $request): JsonResponse
    {
        $plat = new Plat();
        $plat->setNom($request->request->get('nom'));
        $plat->setPrix($request->request->get('prix'));

        $entityManager->persist($plat);
        $entityManager->flush();

        $data = [
            'id' => $plat->getId(),
            'nom' => $plat->getNom(),
            'prix' => $plat->getPrix(),
        ];

        return $this->json($data);
    }

    #[Route('/plat/{id}', name: 'plat_show', methods:['GET'])]
    public function show(EntityManagerInterface $entityManager, int $id): JsonResponse
    {
        $plat = $entityManager->getRepository(Plat::class)->find($id);

        if(!$plat) {
            return $this->json("Aucun plat n'a été trouvé avec cet id : $id", 404);
        }

        $data = [
            'id' => $plat->getId(),
            'nom' => $plat->getNom(),
            'prix' => $plat->getPrix(),
        ];

        return $this->json($data);
    }

    #[Route('/plat/{id}', name:'plat_update', methods:['PUT', 'PATCH'])]
    public function update(EntityManagerInterface $entityManager, int $id, Request $request): JsonResponse
    {
        $plat = $entityManager->getRepository(Plat::class)->find($id);

        if(!$plat) {
            return $this->json("Aucun plat n'a été trouvé avec cet id : $id", 404);
        }

        $plat->setNom($request->request->get('nom'));
        $plat->setPrix($request->request->get('prix'));

        $entityManager->flush();

        $data = [
            'id' => $plat->getId(),
            'nom' => $plat->getNom(),
            'prix' => $plat->getPrix(),
        ];

        return $this->json($data);
    }
}
