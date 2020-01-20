<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;


class RightsDefRepository extends EntityRepository
{
    
    public function listTousDroitParUtilisateur()
    {
        /*$sql = "SELECT rd FROM App:RightsDef rd 
                WHERE rd.libelle NOT LIKE 'tou%' AND rd.entity IN (0,1) AND rd.perms NOT LIKE '%_advance' ORDER BY rd.module, rd.id";

            $result = $this->getEntityManager()->createQuery($sql)->getScalarResult();*/
        $sql = "SELECT rd FROM App:RightsDef rd ORDER BY rd.module,rd.id";
        $result = $this->getEntityManager()->createQuery($sql)->getScalarResult();
       
        return $result;
    }

    public function listDroitActiver($id)
    {
        $sql = "SELECT ur,rd FROM App:UserRights  ur 
                INNER JOIN App:RightsDef rd WITH ur.fkId = rd.id WHERE ur.fkUser = $id ORDER BY rd.module,rd.id";

        $result = $this->getEntityManager()->createQuery($sql)->getScalarResult();

        return $result;

    }


    public function activerDeasctiverDroitUtilisateur($fkid,$fkuser)
    {
        $sql = "DELETE  FROM App:UserRights  ur 
                 WHERE ur.fkId = $fkid AND ur.fkUser = $fkuser";
        $result = $this->getEntityManager()->createQuery($sql)->getScalarResult();

        return $result;

    }
    
}