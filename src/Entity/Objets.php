<?php

namespace App\Entity;

use App\Repository\ObjetsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ObjetsRepository::class)
 */
class Objets
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity=Societe::class, inversedBy="objets")
     */
    private $Societes;

    public function __construct()
    {
        $this->Societes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Societe[]
     */
    public function getSocietes(): Collection
    {
        return $this->Societes;
    }

    public function addSociete(Societe $societe): self
    {
        if (!$this->Societes->contains($societe)) {
            $this->Societes[] = $societe;
        }

        return $this;
    }

    public function removeSociete(Societe $societe): self
    {
        $this->Societes->removeElement($societe);

        return $this;
    }
}
