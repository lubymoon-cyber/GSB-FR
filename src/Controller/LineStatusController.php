<?php

namespace App\Controller;

use App\Entity\LineStatus;
use App\Form\LineStatusType;
use App\Repository\LineStatusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/line/status")
 */
class LineStatusController extends AbstractController
{
    /**
     * @Route("/", name="line_status_index", methods={"GET"})
     */
    public function index(LineStatusRepository $lineStatusRepository): Response
    {
        return $this->render('line_status/index.html.twig', [
            'line_statuses' => $lineStatusRepository->findAll(),
            'mon_nom' => "de.sam"
        ]);
    }

    /**
     * @Route("/new", name="line_status_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lineStatus = new LineStatus();
        $form = $this->createForm(LineStatusType::class, $lineStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lineStatus);
            $entityManager->flush();

            return $this->redirectToRoute('line_status_index');
        }

        return $this->render('line_status/new.html.twig', [
            'line_status' => $lineStatus,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="line_status_show", methods={"GET"})
     */
    public function show(LineStatus $lineStatus): Response
    {
        return $this->render('line_status/show.html.twig', [
            'line_status' => $lineStatus,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="line_status_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LineStatus $lineStatus): Response
    {
        $form = $this->createForm(LineStatusType::class, $lineStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('line_status_index');
        }

        return $this->render('line_status/edit.html.twig', [
            'line_status' => $lineStatus,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="line_status_delete", methods={"POST"})
     */
    public function delete(Request $request, LineStatus $lineStatus): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lineStatus->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lineStatus);
            $entityManager->flush();
        }

        return $this->redirectToRoute('line_status_index');
    }
}
