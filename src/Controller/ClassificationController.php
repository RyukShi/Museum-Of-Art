<?php

namespace App\Controller;

use App\Entity\Classification;
use App\Form\ClassificationType;
use App\Repository\ClassificationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/classification')]
class ClassificationController extends AbstractController
{
    #[Route('/', name: 'app_classification_index', methods: ['GET'])]
    public function index(ClassificationRepository $repository): Response
    {
        return $this->render('classification/index.html.twig', [
            'classifications' => $repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_classification_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ClassificationRepository $repository): Response
    {
        $classification = new Classification();
        $form = $this->createForm(ClassificationType::class, $classification);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $repository->save($classification, true);
            return $this->redirectToRoute(
                'app_classification_index',
                [],
                Response::HTTP_CREATED
            );
        }
        return $this->render('classification/new.html.twig', [
            'classification' => $classification,
            'form' => $form,
        ]);
    }

    #[Route(
        '/{id}',
        name: 'app_classification_show',
        methods: ['GET'],
        requirements: ['id' => '[1-9]\d*']
    )]
    public function show(int $id, ClassificationRepository $repository): Response
    {
        $classification = $repository->find($id);
        if ($classification === null) {
            return $this->redirectToRoute('app_classification_index');
        }
        return $this->render('classification/show.html.twig', [
            'classification' => $classification,
        ]);
    }

    #[Route(
        '/{id}/edit',
        name: 'app_classification_edit',
        methods: ['GET', 'POST'],
        requirements: ['id' => '[1-9]\d*']
    )]
    public function edit(
        Request $request,
        Classification $classification,
        EntityManagerInterface $entityManager
    ): Response {
        $form = $this->createForm(ClassificationType::class, $classification);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute(
                'app_classification_index',
                [],
                Response::HTTP_SEE_OTHER
            );
        }
        return $this->render('classification/edit.html.twig', [
            'classification' => $classification,
            'form' => $form,
        ]);
    }

    #[Route(
        '/{id}/delete',
        name: 'app_classification_delete',
        methods: ['POST'],
        requirements: ['id' => '[1-9]\d*']
    )]
    public function delete(
        Request $request,
        Classification $classification,
        ClassificationRepository $repository
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $classification->getId(), $request->request->get('_token'))) {
            $repository->remove($classification, true);
        }
        return $this->redirectToRoute(
            'app_classification_index',
            [],
            Response::HTTP_SEE_OTHER
        );
    }
}
