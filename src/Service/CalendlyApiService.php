<?php 



namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class CalendlyApiService
{
    private $httpClient;
    private $accessToken = "j2twvN_aFlcNkgqZ3FkaST2AofbMLxyyuoqKRjY-Eao";

    public function __construct()
    {
        $this->httpClient = HttpClient::create([
            'base_uri' => 'https://api.calendly.com',
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Accept' => 'application/json'
            ]
        ]);
    }

    public function getEventTypes()
    {
        $response = $this->httpClient->request('GET', '/event_types');
        return $response->getContent();
    }
}
