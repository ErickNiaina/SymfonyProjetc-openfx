<?php

namespace App\Controller;

use App\Entity\UserOrigin;
use App\Form\UserOriginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/user/origin")
 */
class UserOriginController extends AbstractController
{
    /**
     * @Route("/list", name="user_origin_index", methods={"GET"})
     */
    public function index(): Response
    {
        $userOrigins = $this->getDoctrine()
            ->getRepository(UserOrigin::class)
            ->findAll();

        return $this->render('user_origin/user_list.html.twig', [
            'user_origins' => $userOrigins,
        ]);
    }

    /**
     * @Route("/registration", name="user_origin_new", methods={"GET","POST"})
     */
    public function registration(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $userOrigin = new UserOrigin();
        $form = $this->createForm(UserOriginType::class, $userOrigin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $hash = $encoder->encodePassword($userOrigin, $userOrigin->getPassCrypted());
            $crypt = $userOrigin->setPassCrypted($hash);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($userOrigin);
            $entityManager->flush();

            return $this->redirectToRoute('user_origin_index');
        }

        return $this->render('user_origin/new_user.html.twig', [
            'user_origin' => $userOrigin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/view/user/{rowid}", name="user_origin_show", methods={"GET"})
     */
    public function show(UserOrigin $userOrigin): Response
    {
        return $this->render('user_origin/show_user.html.twig', [
            'user_origin' => $userOrigin,
        ]);
    }

    /**
     * @Route("/user/{rowid}/edit", name="user_origin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UserOrigin $userOrigin): Response
    {
        $form = $this->createForm(UserOriginType::class, $userOrigin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_origin_index');
        }

        return $this->render('user_origin/edit_user.html.twig', [
            'user_origin' => $userOrigin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/delete/{rowid}", name="user_origin_delete", methods={"DELETE"})
     */
    public function delete(Request $request, UserOrigin $userOrigin): Response
    {
        if ($this->isCsrfTokenValid('delete' . $userOrigin->getRowid(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($userOrigin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_origin_index');
    }

    /**
     * @Route("/connecter", name="user_connected", methods={"GET"})
     */
   /* public function userConnecter()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        var_dump($user);
        die;
    }*/
}
