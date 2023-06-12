<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\SousCategorie;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CatalogueController extends AbstractController
{
    #[Route('/', name: 'app_catalogue')]
    public function index(CategorieRepository $repo): Response
    {
        $liste = $repo->findAll();
        // dd($liste);

        return $this->render('catalogue/index.html.twig', [
            'liste' => $liste,
        ]);
    }

    #[Route('/souscategories/{categorie}', name: 'app_catalogue_souscategories')]
    public function souscategories(Categorie $categorie): Response
    {

        return $this->render('catalogue/souscategories.html.twig', [
            'categorie' => $categorie,
        ]);
    }

    #[Route('/produits/{souscategorie}', name: 'app_catalogue_produits', methods: ["GET"])]
    public function produits(SousCategorie $souscategorie): Response
    {
        // $liste = $repo->findAll();
        // $categorie = $repo->find($id);
        // dd($categorie);

        return $this->render('catalogue/produits.html.twig', [
            'souscategorie' => $souscategorie
        ]);
    }
}
