<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GamesController extends AbstractController
{

    /**
    * @Route("/games")
    */
    public function list(): Response
    {
        $games = ['example'];
        return $this->render('games/example.html.twig', [
            'games' => $games,
        ]);
    }

    /**
    * @Route("/games/example")
    * @Route("/")
    */
    public function index(): Response
    {
        return $this->render('games/example.html.twig');
    }
}