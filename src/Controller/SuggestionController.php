<?php

namespace App\Controller;

use App\Entity\Suggestion;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

class SuggestionController extends AbstractController
{

    #[Route('/suggestion', name: 'app_suggestion')]
    public function suggest(Request $request, PersistenceManagerRegistry $doctrine): Response
    {
        $suggestion = new Suggestion();

        $form = $this->createForm(SuggestionType::class, $suggestion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->$doctrine->getManager();
            $suggestion->setCreationDateTime(new \DateTime());
            $entityManager->persist($suggestion);
            $entityManager->flush();

            return $this->redirectToRoute('suggest');
        }

        return $this->render('suggestion/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
