<?php

namespace App\Controller;

use App\Entity\StatutLigne;
use App\Form\LigneStatutType;
use App\Repository\StatutLigneRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/ligne/statut")
 */
class LigneStatutController extends AbstractController
{
    /**
     * @Route("/", name="ligne_statut_index", methods={"GET"})
     */
    public function index(StatutLigneRepository $statutLigneRepository): Response
    {
        return $this->render('ligne_statut/index.html.twig', [
            'ligne_statutes' => $statutLigneRepository->findAll(),
            'mon_nom' => "de.sam"
        ]);
    }

    /**
     * @Route("/new", name="ligne_statut_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ligneStatut = new StatutLigne();
        $form = $this->createForm(LigneStatutType::class, $ligneStatut);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ligneStatut);
            $entityManager->flush();

            return $this->redirectToRoute('ligne_statut_index');
        }

        return $this->render('ligne_statut/new.html.twig', [
            'ligne_statut' => $ligneStatut,
            'form' => $form->createView(),
            
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_statut_show", methods={"GET"})
     */
    public function show(StatutLigne $statutLigne): Response
    {
        return $this->render('ligne_statut/show.html.twig', [
            'ligne_statut' => $statutLigne,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ligne_statut_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StatutLigne $statutLigne): Response
    {
        $form = $this->createForm(LigneStatutType::class, $statutLigne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ligne_statut_index');
        }

        return $this->render('ligne_statut/edit.html.twig', [
            'ligne_statut' => $statutLigne,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_statut_delete", methods={"POST"})
     */
    public function delete(Request $request, StatutLigne $statutLigne): Response
    {
        if ($this->isCsrfTokenValid('delete'.$statutLigne->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($statutLigne);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ligne_statut_index');
    }
}
