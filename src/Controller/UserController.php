<?php

namespace App\Controller;

use App\Entity\UserOrigin;
use App\Form\UserOriginType;
use App\Entity\RightsDef;
use App\Entity\UserRights;
use App\Service\utilityService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Session\Session;


/**
 * @Route("/user/permission")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/list", name="user_origin_index", methods={"GET"})
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function index(utilityService $utilsevice): Response
    {
        $userOrigins = $utilsevice->getAllUser();
       
        return $this->render('user_origin/user_list.html.twig', [
            'user_origins' => $userOrigins,
        ]);

    }

    /**
     * @Route("/registration", name="user_origin_new", methods={"GET","POST"})
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function registration(Request $request, UserPasswordEncoderInterface $encoder,utilityService $utilservice): Response
    {
        $userOrigin = new UserOrigin();
        $form = $this->createForm(UserOriginType::class, $userOrigin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $utilservice->editOrAddUser($userOrigin,$encoder);

            return $this->redirectToRoute('user_origin_index');
        }

        return $this->render('user_origin/new_user.html.twig', [
            'user_origin' => $userOrigin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/view/user/{rowid}", name="user_origin_show", methods={"GET"})
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function show(utilityService $utilsevice,$rowid): Response
    {
        $userOrigin = $utilsevice->getOneUser($rowid);
        
        return $this->render('user_origin/show_user.html.twig', [
            'user_origin' => $userOrigin,
        ]);
    }

    /**
     * @Route("/user/{rowid}/edit", name="user_origin_edit", methods={"GET","POST"})
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function edit(Request $request,UserPasswordEncoderInterface $encoder,utilityService $utilsevice,$rowid): Response
    {
        $userOrigin = $utilsevice->getOneUser($rowid);
        $form = $this->createForm(UserOriginType::class,$userOrigin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $utilsevice->editOrAddUser($userOrigin,$encoder);
        
            return $this->redirectToRoute('user_origin_index');
        }

        return $this->render('user_origin/edit_user.html.twig', [
            'user_origin' => $userOrigin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/delete/{rowid}", name="user_origin_delete", methods={"DELETE"})
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
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
     * @Route("/{rowid}/user", name="list_permission", methods={"GET"})
     */
    public function listUserRight($rowid, utilityService $utilsevice)
    {   
        $session = new Session();
        $session->set('iduser',$rowid);
        $sessioniduser = $session->get('iduser');
       
        $rightsDefs = $utilsevice->getAllRightUser();
        
        $activatedpermission = $utilsevice->getRightActive($rowid);
       
        return $this->render('rights_def/listofpermission.html.twig', [
            'rights_defs' => $rightsDefs,
            'activatedperms'=>$activatedpermission,
            'sessionuser'=>$sessioniduser,
            
        ]);
    }


    /**
     * @Route("/{fk_id}/deactivate/{fk_user}/user}", name="deactivated_permission", methods={"GET"})
     */
    public function unsetRight(utilityService $utilsevice, $fk_id,$fk_user){
        
        $utilsevice->unsetRightUser($fk_id,$fk_user);
       
        return $this->redirectToRoute('list_permission',[
            'rowid'=>$fk_user,
        ]);
    }


    /**
     * @Route("/{fk_id}/activate/{fk_user}/com}", name="permission_activate", methods={"GET"})
     */
    public function setRight(utilityService $utilsevice, $fk_id,$fk_user)
    {
        $utilsevice->setRightUser($fk_id,$fk_user);
        // $em = $this->getDoctrine()->getManager();
        // $user = new UserRights();
        // $user->setFkId($fk_id);
        // $user->setFkUser($fk_user);
        
        // $em->persist($user);
        // $em->flush();

        return $this->redirectToRoute('list_permission',[
            'rowid'=>$fk_user,
        ]);
    }


    /**
     * @Route("/converted", name="permissionof_test", methods={"GET"})
     */
    public function userHavePermission()
    {
        
        return $this->render('default/filtreOfpermission.html.twig');

    }   

}

?>