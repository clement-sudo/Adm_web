<?php

namespace App\Controller;

use App\Entity\Habitant;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchApiController extends AbstractController
{
    #[Route('/api/search', name: 'api_search')]
    public function search(Request $request, EntityManagerInterface $entityManager): Response
    {
        
        $nom = $request->query->get('nom');

        // Obtenez le repository de l'entité Habitant
        $repository = $entityManager->getRepository(Habitant::class);

        // Utilisez la méthode personnalisée pour la recherche
        $habitants = $repository->findByNom($nom);
        

        var_dump($nom);
        var_dump($this->json($habitants));
        return $this->json($habitants);
    }
}