<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryFilterType;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function index(Request $request, CategoryRepository $categoryRepository): Response
    {
        $form = $this->createForm(CategoryFilterType::class);
        $form->handleRequest($request);

        $nameFilter = $form->get('nameFilter')->getData() ?? '';

        if ($form->isSubmitted() && $form->isValid() && $nameFilter != '') {
            $categories = $categoryRepository->filterByName($nameFilter);
        } else {
            $categories = $categoryRepository->findAll();
        }

        return $this->render('category/category.html.twig', [
            'categories' => $categories,
            'categoryFilterForm' => $form->createView(),
        ]);
    }

    #[Route('/category/new', name: 'app_category_new')]
    #[Security("is_granted('ROLE_ADMIN')")]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $category = new Category();

        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($category);
            $entityManager->flush();

            $this->addFlash('success', 'La nouvelle catégorie "' . $category->getName() . '" a été créée !');

            return $this->redirectToRoute('app_category');
        }

        return $this->render('category/categoryNew.html.twig', [
            'categoryForm' => $form->createView(),
        ]);
    }

    #[Route('/category/{id}/details', name: 'app_category_details')]
    public function details(Category $category): Response
    {
        return $this->render('category/categoryDetails.html.twig', [
            'category' => $category,
        ]);
    }

    #[Route('/category/{id}/edit', name: 'app_category_edit')]
    #[Security("is_granted('ROLE_ADMIN')")]
    public function edit(Request $request, EntityManagerInterface $entityManager, Category $category): Response
    {
        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'La categorie "' . $category->getName() . '" a été modifiée !');

            return $this->redirectToRoute('app_category');
        }

        return $this->render('category/categoryEdit.html.twig', [
            'categoryForm' => $form->createView(),
        ]);
    }

    #[Route('/category/delete/{id}', name: 'app_category_delete')]
    #[Security("is_granted('ROLE_ADMIN')")]
    public function delete(CategoryRepository $categoryRepository, Category $category): Response
    {
        $categoryRepository->remove($category, true);
        $this->addFlash('success', 'La categorie "' . $category->getName() . '" a été supprimée !');

        $categories = $categoryRepository->findAll();

        return $this->render('category/category.html.twig', [
            'categories' => $categories,
        ]);
    }
}
