<?php

namespace App\Controller;

use App\Entity\LigneStatus;
use App\Form\LigneStatusType;
use App\Repository\LigneStatusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ligne/status")
 */
class LigneStatusController extends AbstractController
{
    /**
     * @Route("/", name="ligne_status_index", methods={"GET"})
     */
    public function index(LigneStatusRepository $ligneStatusRepository): Response
    {
        return $this->render('ligne_status/index.html.twig', [
            'ligne_statuses' => $ligneStatusRepository->findAll(),
            'mon_nom' => "de.sam"
        ]);
    }

    /**
     * @Route("/new", name="ligne_status_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ligneStatus = new LigneStatus();
        $form = $this->createForm(LigneStatusType::class, $ligneStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ligneStatus);
            $entityManager->flush();

            return $this->redirectToRoute('ligne_status_index');
        }

        return $this->render('ligne_status/new.html.twig', [
            'ligne_status' => $ligneStatus,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_status_show", methods={"GET"})
     */
    public function show(LigneStatus $ligneStatus): Response
    {
        return $this->render('ligne_status/show.html.twig', [
            'ligne_status' => $ligneStatus,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ligne_status_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LigneStatus $ligneStatus): Response
    {
        $form = $this->createForm(LigneStatusType::class, $ligneStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ligne_status_index');
        }

        return $this->render('ligne_status/edit.html.twig', [
            'ligne_status' => $ligneStatus,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_status_delete", methods={"POST"})
     */
    public function delete(Request $request, LigneStatus $ligneStatus): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneStatus->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ligneStatus);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ligne_status_index');
    }
}
