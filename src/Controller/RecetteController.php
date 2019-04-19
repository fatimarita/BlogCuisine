<?php
namespace App\Controller;
use App\Entity\Recette;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class RecetteController extends AbstractController
{
    /**
     * @Route("/recette", name="recette_list")
     */
    public function index()
    {
        // Récupération du Repository
        $repository = $this->getDoctrine()->getRepository(\App\Entity\Recette::class);
        // Récupération des articles
        $recette = $repository->findAll();
        return $this->render('recette/recette.html.twig', [
            'recette' => $recette
        ]);
    }
    /**
     * @Route("/recette/{id}", name="recette_show")
     */
    public function show($id)
    {
        // Récupération du Repository
        $repository = $this->getDoctrine()->getRepository(Recette::class);
        // Récupération de l'article lié à l'id
        $recette = $repository->findOneBy([
            'id' => $id
        ]);
        return $this->render('recette/show.html.twig', [
            'recette' => $recette
        ]);
        return $this->render('recette/show.html.twig', [
            'recette' => $recette
        ]);
    }
    }
