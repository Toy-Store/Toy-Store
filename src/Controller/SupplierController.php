<?php

namespace App\Controller;

use App\Entity\Supplier;
use App\Form\SupplierType;
use App\Repository\SupplierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

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
    /**
     * @Route("/add", name="supplier_create")
     */
    public function createAction(Request $req, SluggerInterface $slugger): Response
    {
        
        $s = new Supplier();
        $form = $this->createForm(SupplierType::class, $s);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $this->repo->save($s,true);
            return $this->redirectToRoute('supplier_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("supplier/form.html.twig",[
            'form' => $form->createView()
        ]);
    }
}
