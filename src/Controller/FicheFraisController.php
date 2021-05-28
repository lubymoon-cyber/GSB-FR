<?php

namespace App\Controller;

use DateTime;
use Exception;
use DateTimeZone;
use App\Entity\EtatFiche;
use App\Entity\FicheFrais;
use App\Entity\StatutLigne;
use App\Entity\FraisForfait;
use App\Entity\Justificatif;
use App\Entity\LigneFraisForfait;
use App\Entity\LigneFraisHorsForfait;
use App\Repository\FicheFraisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
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
    public function newFicheFrais(EntityManagerInterface $manager): Response
    {
        $fraisForfaits = $manager->getRepository(FraisForfait::class)->findAll();
        return $this->render('fiche_frais/new.html.twig', [
            'fraisForfaits' => $fraisForfaits
        ]);
    }

    // /**
    //  * @Route("/fiche/frais/hors/forfait", name="fiche_frais_hors_forfait")
    //  */
    // public function index(FicheFraisRepository $repo): Response
    // {
    //     $liste = $repo->findAll();

    //     return $this->render('fiche_frais_hors_forfait/index.html.twig', [
    //         'controller_name' => 'FicheFraisController',
    //         'liste_fiche_frais' => $liste,
    //     ]);
    // }

    // /**
    //  * @Route("/fiche/frais/hors/forfait/new", name="fiche_frais_hors_forfait_new")
    //  * @param EntityManagerInterface $manager
    //  * @return Response
    //  */
    // public function newFicheFrais(EntityManagerInterface $manager): Response
    // {
    //     $fraisForfaits = $manager->getRepository(FraisForfait::class)->findAll();
    //     return $this->render('fiche_frais_hors_forfait/new.html.twig', [
    //         'fraisForfaits' => $fraisForfaits
    //     ]);
    // }

    /**
     * @Route("/fiche/frais/store", name="store_fiche_frais", methods={"GET","POST"})
     * @param EntityManagerInterface $manager
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function storeFicheFrais(EntityManagerInterface $manager, Request $request): Response
    {
	dd($request);
        $user = $this->getUser();
        $dateNow = new DateTime(null, new DateTimeZone('Europe/Paris'));
        $dateEemission = DateTime::createFromFormat('Y-m-d', $request->get('dateFicheFrais'));
        $ficheFrais = new FicheFrais();
        $ficheFrais->setDateCreationFicheFrais($dateNow);
        $ficheFrais->setDateFicheFrais($dateEemission);
        $ficheFrais->setDateModificationFicheFrais($dateNow);
        $ficheFrais->setEtatFicheFrais($manager->getRepository(EtatFiche::class)->find(1));
        $ficheFrais->setNbJustificatif(1);
        $ficheFrais->setUtilisateurFicheFrais($user);
        $manager->persist($ficheFrais);
        $manager->flush();
        $dateJustificatifs = $request->request->get('dateJustificatifs');
        $quantites = $request->request->get('quantites');
        $montants = $request->request->get('montants');
        $forfaits = $request->request->get('forfaits');

        foreach ($request->files->get('files') as $key => $file){

            $filesystem = new Filesystem();

            try {
                $filesystem->mkdir('uploads/tmp/');
                $filesystem->mkdir('uploads/justificatif/');
            } catch (IOExceptionInterface $exception) {
                echo "An error occurred while creating your directory at ".$exception->getPath();
            }

            $tempFile = $filesystem->tempnam($this->getParameter('uploads_directory') . '/tmp', 'justif_');
            $finalFile = $filesystem->tempnam($this->getParameter('uploads_directory') . '/justificatif', 'justif_');
            $filesystem->remove($tempFile);
            $orinalNameFile = $file->getClientOriginalName();
            $justifacatif = new Justificatif();
            $justifacatif->setChemin($finalFile);
            $justifacatif->setDateCreationJustificatif($dateNow);
            $justifacatif->setDateProductionJustificatif(DateTime::createFromFormat('Y-m-d', $dateJustificatifs[$key]));
            $justifacatif->setMontant($montants[$key]);
            $justifacatif->setUtilisateurJustificatif($user);
            $manager->persist($justifacatif);
            $manager->flush();
            $ligneFraisForfait = new LigneFraisForfait();
            $ligneFraisForfait->setDateCreationLigneFraisForfait($dateNow);
            $ligneFraisForfait->setDateLigneFraisForfait($dateEemission);
            $ligneFraisForfait->setFicheFrais($ficheFrais);
            $ligneFraisForfait->setFraisForfait($manager->getRepository(FraisForfait::class)->findOneBy(['libelle' => $forfaits[$key]]));
            $ligneFraisForfait->setDateCreationLigneFraisForfait($dateNow);
            $ligneFraisForfait->setQuantite($quantites[$key]);
            $ligneFraisForfait->setUtilisateurLigneFraisForfait($user);
            $ligneFraisForfait->setStatutLigneFraisForfait($manager->getRepository(StatutLigne::class)->find(1));
            $manager->persist($ligneFraisForfait);
            $manager->flush();
            $ficheFrais->setNbJustificatif($key + 1);
            $manager->flush();
        }

        return $this->redirectToRoute('fiche_frais_new');
    }
}
