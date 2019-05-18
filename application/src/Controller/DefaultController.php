<?php

namespace App\Controller;

use App\Entity\ProductInventory;
use App\Repository\ProductInventoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{


    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render("default/layout.html.twig");
    }

    /**
     * @Route("/giveaways", name="giveaways")
     * @return Response
     */
    public function giveaways(): Response
    {
        /** @var ProductInventoryRepository $pi_repository */
        $pi_repository = $this->getDoctrine()->getRepository(ProductInventory::class);
        $items = $pi_repository->findAllAvailable();


        return $this->render('default/pages/giveaway.html.twig', [
            'items' => $items
        ]);
    }

    /**
     * @Route("/about", name="about")
     * @return Response
     */
    public function about(): Response
    {
        return $this->render('default/pages/about.html.twig');
    }


    /**
     * @Route("/tests")
     */
    public function tests(): Response
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
            '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }
}