<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
final class IndexController extends AbstractController
{
    /**
     * @Route("/{vueRouting}", name="index", requirements={"vueRouting"="^(?!api|_(profiler|wdt)).*"})
     * @Route("/", name="index_empty")
     * @return Response
     */
    public function indexAction($vueRouting): Response
    {
        return $this->render('base.html.twig', []);
    }
}