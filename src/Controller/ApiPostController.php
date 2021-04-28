<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiPostController extends AbstractController
{
    public $serializer;

    public function __construct()
    {
        $this->serializer = \JMS\Serializer\SerializerBuilder::create()->build();
    }
    /**
     * Permet de récupérer la liste des users.
     * @Route("/api/user/list", name="api_user_list", methods={"GET", "POST"})
     */
    public function apiGetUser(UserRepository $userRepository): JsonResponse
    {
        $users = $userRepository->findAll();
        
        return JsonResponse::fromJsonString($this->serializer->serialize($users, 'json'));
    }
}
