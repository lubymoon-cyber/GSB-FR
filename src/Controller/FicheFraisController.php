<?php

namespace App\Controller;

use Exception;
use App\Entity\FraisForfait;
use App\Repository\FicheFraisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
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
     * @Route("/fiche/frais/new", name="fiche_frais_new")
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function FicheFraisnew(EntityManagerInterface $manager): Response
    {
        $fraisForfaits = $manager->getRepository(FraisForfait::class)->findAll();
//         $newFileName = tempnam(sys_get_temp_dir(), 'myAppNamespace');

        return $this->render('fiche_frais/new.html.twig', [
            'fraisForfaits' => $fraisForfaits
        ]);
    }

/**
     * @Route("/fiche/frais/hors/forfait", name="fiche_frais_hors_forfait")
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function FicheFraisHorsForfait(EntityManagerInterface $manager): Response
    {
        $fraisForfaits = $manager->getRepository(FraisForfait::class)->findAll();
//         $newFileName = tempnam(sys_get_temp_dir(), 'myAppNamespace');

        return $this->render('fiche_frais/new.html.twig', [
            'fraisForfaits' => $fraisForfaits
        ]);
    }

/**
     * @Route("/fiche/frais/hors/forfait/new", name="fiche_frais_hors_forfait_new")
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function FicheFraisHorsForfaitNew(EntityManagerInterface $manager): Response
    {
        $fraisForfaits = $manager->getRepository(FraisForfait::class)->findAll();
//         $newFileName = tempnam(sys_get_temp_dir(), 'myAppNamespace');

        return $this->render('fiche_frais/new.html.twig', [
            'fraisForfaits' => $fraisForfaits
        ]);
    }

    /**
     * @Route("/fiche/frais/store", name="store_fiche_frais", methods={"GET","POST"})
     * @param EntityManagerInterface $manager
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function storeFicheFrais(EntityManagerInterface $manager, Request $request): Response
    {
        foreach ($request->files->get('files') as $file){

            $filesystem = new Filesystem();

            try {
                $filesystem->mkdir(sys_get_temp_dir().'/'.random_int(0, 1000));
            } catch (IOExceptionInterface $exception) {
                echo "An error occurred while creating your directory at ".$exception->getPath();
            }

            dd($request);

            $orinalNameFile = $file->getClientOriginalName();

        }

        dd($request->files);

        return $this->render('fiche_frais/new.html.twig', []);
    }
}
