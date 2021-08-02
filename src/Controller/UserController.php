<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController.
 *
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("", name="user.index", methods={"GET"})
     */
    public function index(): Response
    {
        $users = $this->userRepository->findAll();

        return $this->render(
            'user/index.html.twig',
            [
                'users' => $users,
            ]
        );
    }

    /**
     * @Route("/create", name="user.create")
     */
    public function create(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(
            UserType::class,
            $user,
            [
                'action' => $this->generateUrl('user.create'),
            ]
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }

        return $this->render(
            'user/create.html.twig',
            [
                'user_create_form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/edit/{id}", name="user.edit")
     */
    public function edit(Request $request, $id): Response
    {
        $user = $this->userRepository->find($id);
        $form = $this->createForm(
            UserType::class,
            $user,
            [
                'action' => $this->generateUrl('user.edit', ['id' => $id]),
            ]
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }

        return $this->render(
            'user/create.html.twig',
            [
                'user_create_form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/delete/{id}", name="user.delete")
     */
    public function delete($id): Response
    {
        $user = $this->userRepository->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('user.index');
    }

}
