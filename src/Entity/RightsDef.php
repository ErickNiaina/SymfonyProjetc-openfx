<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 *
 * @ORM\Table(name="rights_def")
 * @ORM\Entity(repositoryClass="App\Repository\RightsDefRepository")
 */
class RightsDef
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="entity", type="integer", nullable=false, options={"default"="1"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $entity = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="module", type="string", length=64, nullable=true)
     */
    private $module;

    /**
     * @var string|null
     *
     * @ORM\Column(name="perms", type="string", length=50, nullable=true)
     */
    private $perms;

    /**
     * @var string|null
     *
     * @ORM\Column(name="subperms", type="string", length=50, nullable=true)
     */
    private $subperms;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=1, nullable=true)
     */
    private $type;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="bydefault", type="boolean", nullable=true)
     */
    private $bydefault = '0';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntity(): ?int
    {
        return $this->entity;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getModule(): ?string
    {
        return $this->module;
    }

    public function setModule(?string $module): self
    {
        $this->module = $module;

        return $this;
    }

    public function getPerms(): ?string
    {
        return $this->perms;
    }

    public function setPerms(?string $perms): self
    {
        $this->perms = $perms;

        return $this;
    }

    public function getSubperms(): ?string
    {
        return $this->subperms;
    }

    public function setSubperms(?string $subperms): self
    {
        $this->subperms = $subperms;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getBydefault(): ?bool
    {
        return $this->bydefault;
    }

    public function setBydefault(?bool $bydefault): self
    {
        $this->bydefault = $bydefault;

        return $this;
    }

    
}
