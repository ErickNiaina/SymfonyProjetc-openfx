<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LlxPointagesfeuilletemps
 *
 * @ORM\Table(name="llx_pointagesFeuilleTemps")
 * @ORM\Entity
 */
class LlxPointagesfeuilletemps
{
    /**
     * @var int
     *
     * @ORM\Column(name="rowid", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rowid;

    /**
     * @var int
     *
     * @ORM\Column(name="fk_employer", type="integer", nullable=false)
     */
    private $fkEmployer;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="pointage_arrivee", type="datetime", nullable=true)
     */
    private $pointageArrivee;

    /**
     * @var string|null
     *
     * @ORM\Column(name="note_arrivee", type="string", length=255, nullable=true)
     */
    private $noteArrivee;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="pointage_depart", type="datetime", nullable=true)
     */
    private $pointageDepart;

    /**
     * @var string|null
     *
     * @ORM\Column(name="note_depart", type="string", length=255, nullable=true)
     */
    private $noteDepart;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="actif", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fk_user_author", type="integer", nullable=true)
     */
    private $fkUserAuthor;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="cree_le", type="datetime", nullable=true)
     */
    private $creeLe;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fk_user_modif", type="integer", nullable=true)
     */
    private $fkUserModif;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifie_le", type="datetime", nullable=true)
     */
    private $modifieLe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var array|null
     *
     * @ORM\Column(name="etat", type="simple_array", length=0, nullable=true)
     */
    private $etat;

    /**
     * @var int|null
     *
     * @ORM\Column(name="total_minute", type="smallint", nullable=true)
     */
    private $totalMinute;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;


}
