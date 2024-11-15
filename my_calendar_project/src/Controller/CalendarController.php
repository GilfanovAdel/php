<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CalendarController extends AbstractController
{
    #[Route('/calendar/{view}/{month}', name: 'calendar', defaults: ['view' => 'table', 'month' => null])]
    public function index(string $view, ?int $month): Response
    {
        // Если месяц не указан, используем текущий
        $month = $month ?? date('n');
        $year = date('Y');

        // Передаём данные в шаблон
        return $this->render("calendar/{$view}.html.twig", [
            'month' => $month,
            'year' => $year,
        ]);
    }
    
}
