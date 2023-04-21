<?php

namespace App\Controller;

use App\Entity\Artwork;
use App\Form\ArtworkType;
use App\Repository\ArtworkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/artwork')]
class ArtworkController extends AbstractController
{
    #[Route('/', name: 'app_artwork_index', methods: ['GET'])]
    public function index(ArtworkRepository $repository): Response
    {
        return $this->render('artwork/index.html.twig', [
            'artworks' => $repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_artwork_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ArtworkRepository $repository): Response
    {
        $artwork = new Artwork();
        $form = $this->createForm(ArtworkType::class, $artwork);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $repository->save($artwork, true);

            return $this->redirectToRoute(
                'app_artwork_show',
                ['id' => $artwork->getId()],
                Response::HTTP_CREATED
            );
        }
        return $this->render('artwork/new.html.twig', [
            'artwork' => $artwork,
            'form' => $form,
        ]);
    }

    #[Route(
        '/{id}',
        name: 'app_artwork_show',
        methods: ['GET'],
        requirements: ['id' => '[1-9]\d*']
    )]
    public function show(int $id, ArtworkRepository $repository): Response
    {
        $artwork = $repository->find($id);
        if ($artwork === null) {
            return $this->redirectToRoute('app_artwork_index');
        }
        return $this->render('artwork/show.html.twig', [
            'artwork' => $artwork,
        ]);
    }

    #[Route(
        '/{id}/edit',
        name: 'app_artwork_edit',
        methods: ['GET', 'POST'],
        requirements: ['id' => '[1-9]\d*']
    )]
    public function edit(
        Request $request,
        Artwork $artwork,
        EntityManagerInterface $entityManager
    ): Response {
        $form = $this->createForm(ArtworkType::class, $artwork);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute(
                'app_artwork_show',
                ['id' => $artwork->getId()],
                Response::HTTP_SEE_OTHER
            );
        }
        return $this->render('artwork/edit.html.twig', [
            'artwork' => $artwork,
            'form' => $form,
        ]);
    }

    #[Route(
        '/{id}/delete',
        name: 'app_artwork_delete',
        methods: ['POST'],
        requirements: ['id' => '[1-9]\d*']
    )]
    public function delete(
        Request $request,
        Artwork $artwork,
        ArtworkRepository $repository
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $artwork->getId(), $request->request->get('_token'))) {
            $repository->remove($artwork, true);
        }
        return $this->redirectToRoute(
            'app_artwork_index',
            [],
            Response::HTTP_SEE_OTHER
        );
    }
}
