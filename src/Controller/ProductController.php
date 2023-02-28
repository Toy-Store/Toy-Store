<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/product")
 */
class ProductController extends AbstractController
{
    private ProductRepository $repo;
    public function __construct(ProductRepository $repo)
   {
      $this->repo = $repo;
   }

   /**
     * @Route("/", name="product_show")
     */
    public function readAllAction(): Response
    {
        $products = $this->repo->findAll();
        return $this->render('product/index.html.twig', [
            'products'=>$products
        ]);
    }
}
