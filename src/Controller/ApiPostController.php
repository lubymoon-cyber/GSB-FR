<?php

namespace App\Controller;

use App\Entity\FicheFrais;
use App\Entity\EtatFiche;
use App\Entity\StatutLigne;
use App\Entity\LigneFraisForfait;
use App\Entity\LigneFraisHorsForfait;
use App\Repository\FicheFraisRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use JMS\Serializer\SerializationContext;
use App\Entity\User;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiPostController extends AbstractController

{
    /**
     * @Route("/api/user/list/{id}", name="api_user_list", methods={"POST","GET"})
     */
    public function index(UserRepository $userRepository, User $user): Response
    {

    //si nous sommes connecté en tant qu'admin et superadmin, nous pouvons tout voir, sinon, nous ne voyons rien.
        if (in_array("ROLE_ADMIN", $user->getRoles()) || in_array("ROLE_SUPER_ADMIN", $user->getRoles())){

        $data = $userRepository->findAll();
    } else {
        $data = ["user"=>false];
    }

    //retour en json de notre public function.
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        $serializer->serialize($data, 'json');

        return JsonResponse::fromJsonString($serializer->serialize($data, 'json'));
    }
  
      /**
     * @Route("/api/fiche/frais/list/{id}", name="api_fiche_frais_list", methods={"POST","GET"})
     */
    public function apiListFicheFrais(FicheFraisRepository $ficheFraisRepository,User $user)
    {
        if (in_array("ROLE_ADMIN", $user->getRoles()) || in_array("ROLE_SUPER_ADMIN", $user->getRoles()) || in_array("ROLE_COMPTABLE", $user->getRoles()) ) {

            $data = $ficheFraisRepository->findAll();
        } else  {
            $data = $ficheFraisRepository->findByUtilisateurFicheFrais($user);
        }
        
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        $serializer->serialize($data, 'json');

        return JsonResponse::fromJsonString($serializer->serialize($data, 'json', SerializationContext::create()->enableMaxDepthChecks()));
    }
  
      /**
     * @Route("/api/fiche/frais/detail/{id}", name="api_fiche_frais_detail", methods={"POST","GET"})
     */
    public function apiDetailFicheFrais(FicheFrais $ficheFrais)
    {
        
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        $serializer->serialize($ficheFrais, 'json');

        return JsonResponse::fromJsonString($serializer->serialize($ficheFrais, 'json'));
    }

    /**
     * @Route("/api/user/data/{id}", name="api_user_data")
     */
    public function apiUserData(User $user): Response
    {

    //retour en json de notre public function.
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        $serializer->serialize($user, 'json');

    return JsonResponse::fromJsonString($serializer->serialize($user, 'json'));
    }

    /**
     * Permet de tester la connexion sur la page de login del'API Java.
     *
     * @Route("/api/connexion", name="api_connexion", methods={"POST","GET"})
     * @return void
     */
    public function apiConnexion(UserRepository $userRepo,Request $request,UserPasswordEncoderInterface $encoder)
    {
        $connexion = json_decode($request->getContent());

        $user = $userRepo->findOneByEmail($connexion->email);
        // $encodedPassword=
        // $encoder->encodePassword(
        // $user,
        // $connexion->password
        // );
            
        $isPasswordValid = $encoder->isPasswordValid($user, $connexion->password);
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        if (!$isPasswordValid) {
            return JsonResponse::fromJsonString($serializer->serialize(['user'=> false], 'json'));
        } else {

            $utilisateur["nom"]=$user->getNom();
            $utilisateur["prenom"]=$user->getPrenom();
            $utilisateur["id"]=$user->getId();

            return JsonResponse::fromJsonString($serializer->serialize($utilisateur, 'json'));
        }
    }

    /**
     * créer une fiche de frais et ensuite une lignefraisforfait et lignefraishorsforfait
     *
     * @Route("/api/fiche/frais/new/{id}", name="api_new_fichefrais",methods={"PUT","POST"})
     * @return JSON
     */
    public function apiNewfichefrais(Request $request, User $user)
    {
        //dd($request);
        $data = json_decode(utf8_encode($request->getContent()));
        
        $manager = $this->getDoctrine()->getManager();
        $fichefrais = new FicheFrais();
        $dateNow = new \DateTime('NOW');
        $fichefrais->setDateFicheFrais($dateNow);

        $fichefrais->setDateFicheFrais($dateNow);
        $fichefrais->setDateCreationFicheFrais($dateNow);
        $fichefrais->setDateModificationFicheFrais($dateNow);
        $fichefrais->setEtatFicheFrais($manager->getRepository(EtatFiche::class)->findOneByLibelle("Fiche créée, saisie en cours"));
        $fichefrais->setUtilisateurFicheFrais($user);
        $fichefrais->setNbJustificatif(0);
        //$manager->persist($ficheFrais);
        //$manager->flush();
        $manager->persist($fichefrais);
        $manager->flush();

        $lignefhf = new LigneFraisHorsForfait();
        $lignefhf->setDateCreationLigneFraisHorsForfait($dateNow);

        $lignefhf->setMontant($data->montant_hors_forfait);

        $lignefhf->setDateLigneFraisHorsForfait($dateNow);
        $lignefhf->setUtilisateurLigneFraisHorsForfait($user);
        $lignefhf->setStatutLigneFraisHorsForfait($manager->getRepository(StatutLigne::class)->findOneByLibelle("Saisie"));
        $lignefhf->setHorsClassification(false);

        $lignefhf->setLibelle($data->libelle_hors_forfait);

        $lignefhf->setFicheFrais($fichefrais);
        $manager->persist($lignefhf);
        $manager->flush();

        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        
        return JsonResponse::fromJsonString($serializer->serialize([], 'json', SerializationContext::create()->enableMaxDepthChecks()));
    }
}