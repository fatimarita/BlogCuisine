<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class NavbarController extends AbstractController
{

    public function navbar(categoriesRepository $categoriesRepository): Response
    {
        return $this->render('/navbar.html.twig', [
            'categories' => $categoriesRepository->findAll(),
        ]);
    }
}