<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function categories()
    {
        return $this->render('blog/categories.html.twig', [
            'controller_name' => 'CategoriesController',
        ]);
    }
}
