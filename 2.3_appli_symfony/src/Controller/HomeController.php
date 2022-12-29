<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use App\Repository\CategoryRepository;
use App\Repository\MusicRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(MusicRepository $musicRepository, ArtistRepository $artistRepository, CategoryRepository $categoryRepository): Response
    {

        $lastAddedMusics = $musicRepository->getLast3();
        $topLongest5 = $musicRepository->getLongest5();
        $ones5MoreMusics = $artistRepository->ones5MoreMusics();
        $ones3MoreMusics = $categoryRepository->ones3MoreMusics();

//        dd($ones5MoreMusics);

        return $this->render('home/index.html.twig', [
            'last3Musics' => $lastAddedMusics,
            'topLongest5' => $topLongest5,
            'ones5MoreMusics' => $ones5MoreMusics,
            'ones3MoreMusics' => $ones3MoreMusics,
        ]);
    }
}
