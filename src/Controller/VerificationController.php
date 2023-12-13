<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\HabitantRepository;

class VerificationController extends AbstractController
{
    #[Route('/verification', name: 'verification_index')]
    public function index(HabitantRepository $habitantRepository): Response
    {
        $habitantsPlusDeCentAns = $habitantRepository->findHabitantsPlusDeCentAns();
        return $this->render('verification/index.html.twig', [
            'controller_name' => 'VerificationController',
            'habitantsPlusDeCentAns' => $habitantsPlusDeCentAns,
        ]);
    }
}
