<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
final class IndexController extends AbstractController
{
    /**
     * @Route("/api", name="ok")
     */
    public function ok() {
        return Response::create('ok', 200);
    }
    /**
     * @Route("/{vueRouting}", name="index", requirements={"page"="/^((?!^api\/).)*$/igm"})
     * @Route("/", name="index_empty")
     * @return Response
     */
    public function indexAction(): Response
    {
        return $this->render('base.html.twig', []);
    }
}