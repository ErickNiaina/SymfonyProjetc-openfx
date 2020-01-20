<?php


namespace App\Twig\Extension;


use Twig\TwigFunction;
use App\Entity\RightsDef;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


    class RightsDefExtension extends AbstractExtension
    {
        protected $em;
        private $tokenStorage;
        
        
        public function __construct(EntityManagerInterface $em, TokenStorageInterface $tokenStorage) {
            $this->em = $em;
            $this->tokenStorage = $tokenStorage;
        }
        
        public function getFunctions()
        {
            return [
                new TwigFunction('droitperms', [$this, 'userhavedroitperms']),
                new TwigFunction('droitsubperms', [$this, 'userhavedroitsubperms']), 
            ];
        }


        public function userhavedroitperms($module,$perms,$subperms)
        {
            $user = $this->tokenStorage->getToken()->getUser();
            $iduser = $user->getrowid();

            $droitactiver = $this->em->getRepository(RightsDef::class)->listDroitActiver($iduser);
            dump($droitactiver);
            
            
            if((array_search($module, array_column($droitactiver, 'rd_module')) !== False) && (array_search($perms, array_column($droitactiver, 'rd_perms')) !== False)
                && (array_search($subperms, array_column($droitactiver, 'rd_subperms')) !== False)) {
                return  true;
            } else {
                return false;
            }
            
        }


        public function userhavedroitsubperms($module,$perms)
        {
            $user = $this->tokenStorage->getToken()->getUser();
            $iduser = $user->getrowid();
            
            $droitactiver = $this->em->getRepository(RightsDef::class)->listDroitActiver($iduser);

            if((array_search($module, array_column($droitactiver, 'rd_module')) !== False) && (array_search($perms, array_column($droitactiver, 'rd_perms')) !== False)) {
                return  true;
            } else {
                return  false;
            }   
        }

    }

?>