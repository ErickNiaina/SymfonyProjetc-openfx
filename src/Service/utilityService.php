<?php

namespace App\Service;

use App\Entity\RightsDef;
use App\Entity\UserOrigin;
use App\Entity\UserRights;
use App\Form\UserOriginType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class utilityService
{
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function getAllUser()
    {
      $userlist = $this->em->getRepository(UserOrigin::class)->findAll();
      return $userlist;  
    }

    public function getOneUser($rowid){
        $oneUser = $this->em->getRepository(UserOrigin::class)->find($rowid);
        return $oneUser;
    }


    public function getAllRightUser(){
        $permissionUser = $this->em->getRepository(RightsDef::class)->listOfUserPermission();
        return $permissionUser;
    }

    public function getRightActive($rowid){
        $permissionUseractive = $this->em->getRepository(RightsDef::class)->activatePermission($rowid);
        return $permissionUseractive;
    }

    public function unsetRightUser($fk_id,$fk_user){
        $permissionDesactivate = $this->em->getRepository(RightsDef::class)->deactivatePermission($fk_id,$fk_user);
        return $permissionDesactivate;
    }

    public function setRightUser($fk_id,$fk_user)
    {
        $user = new UserRights();
        $user->setFkId($fk_id);
        $user->setFkUser($fk_user);
        
        $this->em->persist($user);
        $this->em->flush();
    }
}