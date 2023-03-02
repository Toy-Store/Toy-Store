<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private ProductRepository $repo;
    public function __construct(ProductRepository $repo)
   {
      $this->repo = $repo;
   }
    /**
     * @Route("/", name="homepage")
     */
    public function indexPageAction(): Response
    {
        $products = $this->repo->findAll();
        return $this->render('home.html.twig', [
            'products'=>$products
        ]);
    }
     /**
     * @Route("/admin", name="adminPage")
     */
    public function adminPageAction(): Response{
        return $this->render('admin.html.twig', [
            
        ]);
    }
    /**
     * @Route("/detail/{id}", name="product_read",requirements={"id"="\d+"})
     */
    public function showAction(Product $p): Response
    {
        return $this->render('detail.html.twig', [
            'p'=>$p
        ]);
    }
    // /**
    //  * @Route("/search", name="home_search")
    //  */
    // public function seacrchProduct(ProductRepository $repo, Request $req): Response
    // {
    //     $search = $req->request->get('search');
    //     if($search != "")
    //     {
    //         $products = $repo->searchPro($search);
    //         return $this->render('search/index.html.twig',[
    //             'products'=>$products,
    //             'search' =>$search
    //         ]);
    //     }else{
    //         return $this->redirectToRoute('homepage');
    //     }
        
    // }
}