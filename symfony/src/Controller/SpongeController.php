<?php

namespace App\Controller;

use App\Repository\SpongeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SpongeController extends AbstractController
{
    /**
     * @Route("/sponge", name="show_sponge")
     */
    #[Route('/sponge', name: 'show_sponge')]
    public function show(SpongeRepository $spongeRepository): Response
    {
        // Récupérer toutes les éponges
        $sponges = $spongeRepository->findAll();

        // Passer les éponges à la vue
        return $this->render('sponge/show.html.twig', [
            'sponges' => $sponges,
        ]);
    }
}