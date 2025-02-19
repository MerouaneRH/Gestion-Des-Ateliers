<?php

namespace App\Controller;

use App\Entity\Atelier;
use App\Entity\User;
use App\Form\AtelierType;
use App\Repository\AtelierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

#[Route('/atelier')]
final class AtelierController extends AbstractController
{
    #[Route(name: 'app_atelier_index', methods: ['GET'])]
    public function index(AtelierRepository $atelierRepository): Response
    {
        return $this->render('atelier/index.html.twig', [
            'ateliers' => $atelierRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_atelier_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }
        if (!in_array('ROLE_INSTRUCTEUR', $this->getUser()->getRoles())) {
            throw new AccessDeniedException('Vous devez être un instructeur pour créer un atelier.');
        }
        $this->denyAccessUnlessGranted('ROLE_INSTRUCTEUR');
        $users = $entityManager->getRepository(User::class)->findAll();
        $atelier = new Atelier();
        //$atelier->setInstructeur($users[array_rand($users)]);
        $atelier->setInstructeur($this->getUser());
        $form = $this->createForm(AtelierType::class, $atelier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($atelier);
            $entityManager->flush();

            return $this->redirectToRoute('app_atelier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('atelier/new.html.twig', [
            'atelier' => $atelier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_atelier_show', methods: ['GET'])]
    public function show(Atelier $atelier): Response
    {
        $parser = new \cebe\markdown\Markdown();
        $description = $parser->parse($atelier->getDescription());
        $description = str_replace("<p>","",$description);
        $description = str_replace("</p>","",$description);
        return $this->render('atelier/show.html.twig', [
            'atelier' => $atelier,
            'description' => $description
        ]);
    }

    #[Route('/{id}/edit', name: 'app_atelier_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Atelier $atelier, EntityManagerInterface $entityManager): Response
    {
        if ($this->getUser() !== $atelier->getInstructeur()) {
            $this->addFlash('error', 'Vous n\'avez pas le droit de modifier cet atelier.');
            return $this->redirectToRoute('app_atelier_index');
        }

        $form = $this->createForm(AtelierType::class, $atelier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_atelier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('atelier/edit.html.twig', [
            'atelier' => $atelier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_atelier_delete', methods: ['POST'])]
    public function delete(Request $request, Atelier $atelier, EntityManagerInterface $entityManager): Response
    {
        if ($this->getUser() !== $atelier->getInstructeur()) {
            $this->addFlash('error', 'Vous n\'avez pas le droit de supprimer cet atelier.');
            return $this->redirectToRoute('app_atelier_index');
        }
        if ($this->isCsrfTokenValid('delete'.$atelier->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($atelier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_atelier_index', [], Response::HTTP_SEE_OTHER);
    }
}
