<?php

declare(strict_types=1);

namespace Meeting\Entity;

final class Meeting
{

    private $id;

    /**
     * @var string
     */
    private $name;

    private $description;

    private $dateDebut;

    private $dateFin;

    private $communaute;

    public function __construct(int $id, string $name, string $description, string $dateDebut, string $dateFin, Community $community)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->communaute = $community;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDateDebut() : string
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut(string $dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return mixed
     */
    public function getDateFin() : string
    {
        return $this->dateFin;
    }

    /**
     * @param mixed $dateFin
     */
    public function setDateFin(string $dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return mixed
     */
    public function getCommunaute() : Community
    {
        return $this->communaute;
    }

    /**
     * @param mixed $communaute
     */
    public function setCommunaute(Community $communaute)
    {
        $this->communaute = $communaute;
    }

    /**
     * @return mixed
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }




}
