<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MasterMindController extends AbstractController
{
    /**
     * @Route("/master/mind", name="master_mind")
     */
    public function index(): Response
    {
        return $this->render('master_mind/index.html.twig', [
            'controller_name' => 'MasterMindController',
        ]);
    }
}
