<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Form\ArtistType;
use App\Repository\ArtistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/artist')]
class ArtistController extends AbstractController
{
    #[Route('/', name: 'app_artist_index', methods: ['GET'])]
    public function index(ArtistRepository $repository): Response
    {
        return $this->render('artist/index.html.twig', [
            'artists' => $repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_artist_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN', statusCode: 403, message: 'Access denied, you are not an admin')]
    public function new(Request $request, ArtistRepository $repository): Response
    {
        $artist = new Artist();
        $form = $this->createForm(ArtistType::class, $artist);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $repository->save($artist, true);
            return $this->redirectToRoute(
                'app_artist_show',
                ['id' => $artist->getId()],
                Response::HTTP_CREATED
            );
        }
        return $this->render('artist/new.html.twig', [
            'artist' => $artist,
            'form' => $form,
        ]);
    }

    #[Route(
        '/{id}',
        name: 'app_artist_show',
        methods: ['GET'],
        requirements: ['id' => '[1-9]\d*']
    )]
    public function show(int $id, ArtistRepository $repository): Response
    {
        $artist = $repository->find($id);
        if ($artist === null) {
            return $this->redirectToRoute('app_artist_index');
        }
        return $this->render('artist/show.html.twig', [
            'artist' => $artist,
        ]);
    }

    #[Route(
        '/{id}/edit',
        name: 'app_artist_edit',
        methods: ['GET', 'POST'],
        requirements: ['id' => '[1-9]\d*']
    )]
    #[IsGranted('ROLE_ADMIN', statusCode: 403, message: 'Access denied, you are not an admin')]
    public function edit(
        Request $request,
        Artist $artist,
        EntityManagerInterface $entityManager
    ): Response {
        $form = $this->createForm(ArtistType::class, $artist);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute(
                'app_artist_show',
                ['id' => $artist->getId()],
                Response::HTTP_SEE_OTHER
            );
        }
        return $this->render('artist/edit.html.twig', [
            'artist' => $artist,
            'form' => $form,
        ]);
    }

    #[Route(
        '/{id}/delete',
        name: 'app_artist_delete',
        methods: ['POST'],
        requirements: ['id' => '[1-9]\d*']
    )]
    #[IsGranted('ROLE_ADMIN', statusCode: 403, message: 'Access denied, you are not an admin')]
    public function delete(
        Request $request,
        Artist $artist,
        ArtistRepository $repository
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $artist->getId(), $request->request->get('_token'))) {
            $repository->remove($artist, true);
        }
        return $this->redirectToRoute(
            'app_artist_index',
            [],
            Response::HTTP_SEE_OTHER
        );
    }
}
