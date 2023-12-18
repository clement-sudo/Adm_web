<?php

namespace App\Controller;

use App\Entity\Habitant;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse; 


class SearchApiController extends AbstractController
{
    #[Route('/api/search', name: 'api_search')]
    public function search(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        
        $term = $request->query->get('term', '');
        $type = $request->query->get('type', 'nom');

        $repository = $entityManager->getRepository(Habitant::class);
        switch ($type) {
            case 'prenom':
                $habitants = $repository->findBy(['prenom' => $term]);
            break;
            case 'genre':
                $habitants = $repository->findBy(['genre' => $term]);
                break;
            case 'nom':
            default:
                $habitants = $repository->findBy(['nom' => $term]);
                break;
    }
        return $this->json($habitants);
        
    }
}