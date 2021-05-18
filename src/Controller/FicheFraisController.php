<?php

namespace App\Controller;

use App\Repository\FicheFraisRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FicheFraisController extends AbstractController
{
    /**
     * @Route("/fiche/frais", name="fiche_frais")
     */
    public function index(FicheFraisRepository $repo): Response
    {
        $liste = $repo->findAll();

        return $this->render('fiche_frais/index.html.twig', [
            'controller_name' => 'FicheFraisController',
            'liste_fiche_frais' => $liste,
        ]);
    }

    /**
     * @Route("/fiche/frais/creer", name="creer_fiche_frais")
     */
     public function newFicheFrais()
     {
         return $this->render('fiche_frais/new.html.twig');
     }
}
