<?php

namespace App\Controller;

use App\Repository\HabitantRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ControllerSearchController extends AbstractController
{
    #[Route('/search', name: 'controller_search_index')]
       
    public function index(HabitantRepository $habitantRepository): Response
    {
    
    return $this->render('controller_search/index.html.twig', [
        'controller_name' => 'Searchcontroller',
        
    ]);
    
}
}
