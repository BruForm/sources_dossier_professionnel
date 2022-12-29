<?php

namespace App\Controller;

use App\Entity\Music;
use App\Form\MusicFilterType;
use App\Form\MusicType;
use App\Repository\MusicRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MusicController extends AbstractController
{
    #[Route('/musics', name: 'app_music')]
    public function index(Request $request, MusicRepository $musicRepository): Response
    {
        $form = $this->createForm(MusicFilterType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $form->get('musicFilter')->getData() != '') {
            $musics = $musicRepository->filterByTitle($form->get('musicFilter')->getData());
        }else{
            $musics = $musicRepository->findAll();
        }

        return $this->render('music/music.html.twig', [
            'musics' => $musics,
            'musicFilterForm' => $form->createView(),
        ]);
    }

    #[Route('/music/new', name: 'app_music_new')]
    #[Security("is_granted('ROLE_ADMIN')")]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $music = new Music();
        $form = $this->createForm(MusicType::class, $music);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($music);
            $entityManager->flush();

            $this->addFlash('success', 'La nouvelle musique "' . $music->getTitle() . '" a été créée !');

            return $this->redirectToRoute('app_music');
        }

        return $this->render('music/musicNew.html.twig', [
            'musicForm' => $form->createView(),
        ]);
    }

    #[Route('/music/{id}/details', name: 'app_music_details')]
    public function details(Music $music): Response
    {
        return $this->render('music/musicDetails.html.twig', [
            'music' => $music,
        ]);
    }

    #[Route('/music/{id}/edit', name: 'app_music_edit')]
    #[Security("is_granted('ROLE_ADMIN')")]
    public function edit(Request $request, EntityManagerInterface $entityManager, Music $music): Response
    {
        $form = $this->createForm(MusicType::class, $music);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'La musique "' . $music->getTitle() . '" a été mise à jour !');

            return $this->redirectToRoute('app_music');
        }

        return $this->render('music/musicEdit.html.twig', [
            'musicForm' => $form->createView(),
        ]);
    }

    #[Route('/music/{id}/delete', name: 'app_music_delete')]
    #[Security("is_granted('ROLE_ADMIN')")]
    public function delete(MusicRepository $musicRepository, Music $music): Response
    {
        $musicRepository->remove($music, true);
        $this->addFlash('success', 'La musique "' . $music->getTitle() . '" a été supprimée !');

        $musics = $musicRepository->findAll();

        return $this->render('music/music.html.twig', [
            'musics' => $musics,
        ]);
    }
}
