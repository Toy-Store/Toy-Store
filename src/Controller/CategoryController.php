<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/category")
 */
class CategoryController extends AbstractController
{
    private CategoryRepository $repo;
    public function __construct(CategoryRepository $repo)
   {
      $this->repo = $repo;
   }

   /**
     * @Route("/", name="category_show")
     */
    public function readAllAction(): Response
    {
        $categorys = $this->repo->findAll();
        return $this->render('category/index.html.twig', [
            'categorys'=>$categorys
        ]);
    }
    /**
     * @Route("/add", name="category_create")
     */
    public function createAction(Request $req, SluggerInterface $slugger): Response
    {
        
        $cate = new Category();
        $form = $this->createForm(CategoryType::class, $cate);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $this->repo->save($cate,true);
            return $this->redirectToRoute('category_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("category/form.html.twig",[
            'form' => $form->createView()
        ]);
    }
             /**
     * @Route("/edit/{id}", name="category_edit",requirements={"id"="\d+"})
     */
    public function editAction(Request $req, Category $cate,
    SluggerInterface $slugger): Response
    {
        
        $form = $this->createForm(CategoryType::class, $cate);   
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $this->repo->save($cate,true);
            return $this->redirectToRoute('category_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("category/form.html.twig",[
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/delete/{id}",name="category_delete",requirements={"id"="\d+"})
     */
    
     public function deleteAction(Request $request, Category $cate): Response
     {
         $this->repo->remove($cate,true);
         return $this->redirectToRoute('category_show', [], Response::HTTP_SEE_OTHER);
     }
}
