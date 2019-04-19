<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/home", name="blog")
     */
    public function blog()
    {
        return $this->render('/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
}
