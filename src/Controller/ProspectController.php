<?php

namespace App\Controller;

use App\Entity\Prospect;
use App\Form\ProspectType;
use App\Repository\ProspectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProspectController extends AbstractController
{
    #[Route('/prospects', name: 'app_prospect_index')]
    public function index(ProspectRepository $prospectRepository): Response
    {
        $prospects = $prospectRepository->findAll();

        return $this->render('prospect/index.html.twig', [
            'prospects' => $prospects,
        ]);
    }

    #[Route('/prospect/new', name: 'app_prospect_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $prospect = new Prospect();
        $form = $this->createForm(ProspectType::class, $prospect);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($prospect);
            $entityManager->flush();

            $this->addFlash('success', 'Prospect created successfully.');

            return $this->redirectToRoute('app_prospect_index');
        }

        return $this->render('prospect/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('prospect/{id}/edit', name: 'app_prospect_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Prospect $prospect, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProspectType::class, $prospect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_Prospect_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('prospect/edit.html.twig', [
            'prospect' => $prospect,
            'form' => $form,
        ]);
    }
}
