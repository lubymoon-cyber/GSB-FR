<?php

namespace App\Controller;

use App\Entity\Messaging;
use App\Form\MessagingType;
use App\Repository\MessagingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/messaging")
 */
class MessagingController extends AbstractController
{
    /**
     * @Route("/", name="messaging_index", methods={"GET"})
     */
    public function index(MessagingRepository $messagingRepository): Response
    {
        return $this->render('messaging/index.html.twig', [
            'messagings' => $messagingRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="messaging_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $messaging = new Messaging();
        $form = $this->createForm(MessagingType::class, $messaging);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($messaging);
            $entityManager->flush();

            return $this->redirectToRoute('messaging_index');
        }

        return $this->render('messaging/new.html.twig', [
            'messaging' => $messaging,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="messaging_show", methods={"GET"})
     */
    public function show(Messaging $messaging): Response
    {
        return $this->render('messaging/show.html.twig', [
            'messaging' => $messaging,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="messaging_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Messaging $messaging): Response
    {
        $form = $this->createForm(MessagingType::class, $messaging);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('messaging_index');
        }

        return $this->render('messaging/edit.html.twig', [
            'messaging' => $messaging,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="messaging_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Messaging $messaging): Response
    {
        if ($this->isCsrfTokenValid('delete'.$messaging->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($messaging);
            $entityManager->flush();
        }

        return $this->redirectToRoute('messaging_index');
    }
}
