<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserRights
 *
 * @ORM\Table(name="user_rights", uniqueConstraints={@ORM\UniqueConstraint(name="uk_user_rights", columns={"fk_user", "fk_id"})})
 * @ORM\Entity
 */
class UserRights
{
    /**
     * @var int
     *
     * @ORM\Column(name="rowid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rowid;

    /**
     * @var int
     *
     * @ORM\Column(name="fk_user", type="integer", nullable=false)
     */
    private $fkUser;

    /**
     * @var int
     *
     * @ORM\Column(name="fk_id", type="integer", nullable=false)
     */
    private $fkId;

    public function getRowid(): ?int
    {
        return $this->rowid;
    }

    public function getFkUser(): ?int
    {
        return $this->fkUser;
    }

    public function setFkUser(int $fkUser): self
    {
        $this->fkUser = $fkUser;

        return $this;
    }

    public function getFkId(): ?int
    {
        return $this->fkId;
    }

    public function setFkId(int $fkId): self
    {
        $this->fkId = $fkId;

        return $this;
    }


}
