<?php

namespace App\Controller;

use App\Service\CalendlyApiService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CalendlyController extends AbstractController
{
    #[Route('/calendly', name: 'app_calendly')]
    public function index(CalendlyApiService $calendlyApiService): Response
    {
        $eventTypes = $calendlyApiService->getEventTypes();
        // Process the event types data as needed
        return $this->render('home/index.html.twig', ['eventTypes' => $eventTypes]);
    }
}
