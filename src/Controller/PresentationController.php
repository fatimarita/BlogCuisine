<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PresentationController extends AbstractController
{
    /**
     * @Route("/presentation", name="presentation")
     */
    public function presentation()
    {
        return $this->render('/presentation.html.twig', [
            'controller_name' => 'PresentationController',
        ]);
    }
}
