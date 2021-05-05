<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
        //dd($users);
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        return JsonResponse::fromJsonString($serializer->serialize($users, 'json'));
        
        //return JsonResponse::fromJsonString($this->serializer->serialize($users, 'json'));
    }
}