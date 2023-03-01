<?php

namespace App\Controller;

use App\Repository\SupplierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/supplier")
 */
class SupplierController extends AbstractController
{
    private SupplierRepository $repo;
    public function __construct(SupplierRepository $repo)
   {
      $this->repo = $repo;
   }

   /**
     * @Route("/", name="supplier_show")
     */
    public function readAllAction(): Response
    {
        $suppliers = $this->repo->findAll();
        return $this->render('supplier/index.html.twig', [
            'suppliers'=>$suppliers
        ]);
    }
}
