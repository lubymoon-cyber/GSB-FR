<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiPostController extends AbstractController
{
     public $serializer;

    /**
     * Permet de récupérer la liste des users.
     * @Route("/api/user/list", name="api_user_list", methods={"GET", "POST"})
     */
    
    public function apiGetUser(UserRepository $userRepository): Response
    {
        $userRepository = new Response();
        return $this->json($userRepository);
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
    }
}