<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/weather')]
class WeatherController extends AbstractController {

    private array $data = [
        [
            "date" => "2024-01-01",
            "temperature" => 17,
            "feels_like" => 16,
            "pressure" => 1000,
            "humidity" => 64,
            "wind" => 3.2,
            "cloudiness" => 75,
            "icon" => 'sun'
        ],
        [
            "date" => "2024-01-02",
            "temperature" => 12,
            "feels_like" => 13,
            "pressure" => 1100,
            "humidity" => 75,
            "wind" => 2.2,
            "cloudiness" => 50,
            "icon" => 'rain'
        ],
    ];

    #[Route('/{country_code}/{city}')]
    function forecast(string $country_code, string $city): Response {
        return $this->render('weather/forecast.html.twig', [
            "country_code" => $country_code,
            "city" => $city,
            "data" => $this->data,
        ]);
    }

}