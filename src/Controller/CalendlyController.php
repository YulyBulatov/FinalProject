<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use GuzzleHttp\Client;
use Symfony\Component\Routing\Annotation\Route;

class CalendlyController extends AbstractController
{
    #[Route('/calendly', name: 'app_calendly')]
    public function index(): Response
    {
        $calendlyApi = $this->getParameter('app.calendly_api');

        $response = $calendlyApi->get('/event_types');
        $eventTypes = json_decode($response->getBody()->getContents(), true);

        return $this->render('calendly/list_event_types.html.twig', [
            'eventTypes' => $eventTypes['collection'],
        ]);
    }
}
