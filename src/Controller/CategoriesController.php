<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Recette;
use App\Form\CategoriesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    /**
     * @Route("/categories/{id}", name="categories")
     */
    public function categories($id)
    {
$repo = $this->getDoctrine()->getRepository(Recette::class);
$recette = $repo->find($id);
        return $this->render('categories/categories.html.twig', [
            'controller_name' => 'CategoriesController',
            'recette' => $recette
        ]);
    }





}


