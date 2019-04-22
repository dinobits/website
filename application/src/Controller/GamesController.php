<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GamesController extends AbstractController
{
    /**
    * @Route("/games", name="games")
    */
    public function list(): Response
    {
        $games = ['example'];
        return $this->render('default/pages/games.html.twig', [
            'games' => $games,
        ]);
    }

    /**
    * @Route("/games/example")
    */
    public function index(): Response
    {
        return $this->render('games/example.html.twig');
    }
}