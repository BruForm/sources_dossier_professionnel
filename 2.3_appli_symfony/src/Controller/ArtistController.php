<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Form\ArtistFilterType;
use App\Form\ArtistType;
use App\Repository\ArtistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    #[Route('/artist', name: 'app_artist')]
    public function index(Request $request, ArtistRepository $artistRepository): Response
    {
        $form = $this->createForm(ArtistFilterType::class);
        $form->handleRequest($request);

        $nicknameFilter = $form->get('nicknameFilter')->getData()??'';
        $lastnameFilter = $form->get('lastnameFilter')->getData()??'';
        $firstnameFilter = $form->get('firstnameFilter')->getData()??'';

        if ($form->isSubmitted() && $form->isValid()
            && ($nicknameFilter != ''
                || $lastnameFilter != ''
                || $firstnameFilter != '')
        ) {
            $artists = $artistRepository->filterByNames(
                $nicknameFilter,
                $lastnameFilter,
                $firstnameFilter
            );

        } else {
            $artists = $artistRepository->findAll();
        }

        return $this->render('artist/artist.html.twig', [
            'artists' => $artists,
            'artistFilterForm' => $form->createView(),
        ]);
    }

    #[
        Route('/artist/new', name: 'app_artist_new')]
    #[Security("is_granted('ROLE_ADMIN')")]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $artist = new Artist();

        $form = $this->createForm(ArtistType::class, $artist);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($artist);
            $entityManager->flush();

            $this->addFlash('success', 'Le nouvel artiste "' . $artist->getNickname() . '" a été créé !');

            return $this->redirectToRoute('app_artist');
        }

        return $this->render('artist/artistNew.html.twig', [
            'artistForm' => $form->createView(),
        ]);
    }

    #[Route('/artist/{id}/details', name: 'app_artist_details')]
    public function details(Artist $artist): Response
    {
        return $this->render('artist/artistDetails.html.twig', [
            'artist' => $artist,
        ]);
    }

    #[Route('/artist/{id}/edit', name: 'app_artist_edit')]
    #[Security("is_granted('ROLE_ADMIN')")]
    public function edit(Request $request, EntityManagerInterface $entityManager, Artist $artist): Response
    {
        $form = $this->createForm(ArtistType::class, $artist);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'L\'artiste "' . $artist->getNickname() . '" a été modifié !');

            return $this->redirectToRoute('app_artist');
        }

        return $this->render('artist/artistEdit.html.twig', [
            'artistForm' => $form->createView(),
        ]);
    }

    #[Route('/artist/{id}/delete', name: 'app_artist_delete')]
    #[Security("is_granted('ROLE_ADMIN')")]
    public function delete(ArtistRepository $artistRepository, Artist $artist): Response
    {
        $artistRepository->remove($artist, true);
        $this->addFlash('success', 'L\'artiste "' . $artist->getNickname() . '" a été supprimé !');

        $artists = $artistRepository->findAll();

        return $this->render('artist/artist.html.twig', [
            'artists' => $artists,
        ]);
    }
}
