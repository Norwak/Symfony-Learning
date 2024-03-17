<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/weather')]
class WeatherController extends AbstractController {

    #[Route('/{country_code}/{city}')]
    function forecast(string $country_code, string $city): Response {
        return new Response("<h1>$country_code: $city</h1>");
    }

}