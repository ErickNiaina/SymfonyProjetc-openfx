<?php

namespace App\Controller;

use stdClass;
use App\Entity\RightsDef;
use App\Entity\UserRights;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;






/**
 * @Route("/permission")
 */
class RightsDefController extends AbstractController
{
    /**
     * @Route("/droit/{rowid}/user", name="activation_droit", methods={"GET"})
     */
    public function listUserDroit($rowid)
    {   
        $session = new Session();
        $session->set('iduser',$rowid);
        $sessioniduser = $session->get('iduser');
        //var_dump($sessioniduser);die;
        $repository = $this->getDoctrine()->getRepository(RightsDef::class);
        $rightsDefs = $repository->listTousDroitParUtilisateur();
        $activedroit = $repository->listDroitActiver($rowid);
       
        return $this->render('rights_def/droitParutilisateur.html.twig', [
            'rights_defs' => $rightsDefs,
            'droitactiver'=>$activedroit,
            'sessionuser'=>$sessioniduser,
            
        ]);
    }

    /**
     * @Route("droit/{fk_id}/desactiver/{fk_user}/user}", name="desactiver_droit", methods={"GET"})
     */
    public function desactiverDroit($fk_id,$fk_user){
        $repository = $this->getDoctrine()->getRepository(RightsDef::class);
        $active = $repository->activerDeasctiverDroitUtilisateur($fk_id,$fk_user);
        
        return $this->redirectToRoute('activation_droit',[
            'rowid'=>$fk_user,
        ]);
    }


    /**
     * @Route("droit/{fk_id}/activer/{fk_user}/user}", name="activer_droit", methods={"GET"})
     */
    public function activerDroit($fk_id,$fk_user){
        
        $em = $this->getDoctrine()->getManager();
        $user = new UserRights();
        $user->setFkId($fk_id);
        $user->setFkUser($fk_user);
        
        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('activation_droit',[
            'rowid'=>$fk_user,
        ]);
    }


    /**
     * @Route("/convert", name="droit_converted", methods={"GET"})
     */
    public function userHaveDroit()
    {
        $userconnect = $this->getUser();
        $userconnect->getrowid();
        $iduser = $userconnect->getrowid();
        
        $repository = $this->getDoctrine()->getRepository(RightsDef::class);
        $activedroit = $repository->listDroitActiver($iduser);

       

        return $this->render('default/testdroit.html.twig');

    }
        
}