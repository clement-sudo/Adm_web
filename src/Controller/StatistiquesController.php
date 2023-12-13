<?php

namespace App\Controller;

use App\Repository\HabitantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatistiquesController extends AbstractController
{
    #[Route('/statistiques', name: 'statistiques_index')]
    public function index(HabitantRepository $habitantRepository): Response
    {
        
        $moyenneAge = $habitantRepository->getAverageAge();

        return $this->render('statistiques/index.html.twig', [
            'moyenneAge' => $moyenneAge,
        ]);
    }
}
