<?php

namespace App\Controller;

use App\Entity\Department;
use App\Form\DepartmentType;
use App\Repository\DepartmentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/department')]
class DepartmentController extends AbstractController
{
    #[Route('/', name: 'app_department_index', methods: ['GET'])]
    public function index(DepartmentRepository $repository): Response
    {
        return $this->render('department/index.html.twig', [
            'departments' => $repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_department_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DepartmentRepository $repository): Response
    {
        $department = new Department();
        $form = $this->createForm(DepartmentType::class, $department);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $repository->save($department, true);
            return $this->redirectToRoute(
                'app_department_show',
                ['id' => $department->getId()],
                Response::HTTP_CREATED
            );
        }
        return $this->render('department/new.html.twig', [
            'department' => $department,
            'form' => $form,
        ]);
    }

    #[Route(
        '/{id}',
        name: 'app_department_show',
        methods: ['GET'],
        requirements: ['id' => '[1-9]\d*']
    )]
    public function show(int $id, DepartmentRepository $repository): Response
    {
        $department = $repository->find($id);
        if ($department === null) {
            return $this->redirectToRoute('app_department_index');
        }
        return $this->render('department/show.html.twig', [
            'department' => $department,
        ]);
    }

    #[Route(
        '/{id}/edit',
        name: 'app_department_edit',
        methods: ['GET', 'POST'],
        requirements: ['id' => '[1-9]\d*']
    )]
    public function edit(
        Request $request,
        Department $department,
        EntityManagerInterface $entityManager
    ): Response {
        $form = $this->createForm(DepartmentType::class, $department);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute(
                'app_department_show',
                ['id' => $department->getId()],
                Response::HTTP_SEE_OTHER
            );
        }
        return $this->render('department/edit.html.twig', [
            'department' => $department,
            'form' => $form,
        ]);
    }

    #[Route(
        '/{id}/delete',
        name: 'app_department_delete',
        methods: ['POST'],
        requirements: ['id' => '[1-9]\d*']
    )]
    public function delete(
        Request $request,
        Department $department,
        DepartmentRepository $repository
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $department->getId(), $request->request->get('_token'))) {
            $repository->remove($department, true);
        }
        return $this->redirectToRoute(
            'app_department_index',
            [],
            Response::HTTP_SEE_OTHER
        );
    }
}
