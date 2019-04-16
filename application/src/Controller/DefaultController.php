<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{

    /**
    * @Route("/tests")
    */
    public function index(): Response
    {
        $number = random_int(0, 100);
        return $this->render('examples/test.html.twig', [
            'number' => $number,
        ]);
    }

    /**
    * @Route("/blog")
    */
    public function blog(): Response
    {
        $number = random_int(0, 100);
        return $this->render('examples/blog.html.twig', [
            'number' => $number,
        ]);
    }

    /**
    * @Route("/lucky/number")
    */
    public function number()
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}