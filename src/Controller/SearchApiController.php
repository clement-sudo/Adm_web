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

        $connection = $entityManager->getConnection();

        $sql = "SELECT * FROM habitant WHERE nom LIKE :nom"; 

        $stmt = $connection->prepare($sql);
        $stmt->bindValue('nom', '%' . $nom . '%');
        

        $results = $stmt->executeQuery();
        


        return $this->json($results);
    }
}