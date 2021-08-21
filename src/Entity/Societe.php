<?php

namespace App\Entity;

use App\Repository\SocieteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SocieteRepository::class)
 */
class Societe
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
     * @ORM\ManyToOne(targetEntity=Utilisateurs::class, inversedBy="societes")
     */
    private $Utilisateurs;

    /**
     * @ORM\ManyToMany(targetEntity=Objets::class, mappedBy="Societes")
     */
    private $objets;

    public function __construct()
    {
        $this->objets = new ArrayCollection();
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

    public function getUtilisateurs(): ?Utilisateurs
    {
        return $this->Utilisateurs;
    }

    public function setUtilisateurs(?Utilisateurs $Utilisateurs): self
    {
        $this->Utilisateurs = $Utilisateurs;

        return $this;
    }

    /**
     * @return Collection|Objets[]
     */
    public function getObjets(): Collection
    {
        return $this->objets;
    }

    public function addObjet(Objets $objet): self
    {
        if (!$this->objets->contains($objet)) {
            $this->objets[] = $objet;
            $objet->addSociete($this);
        }

        return $this;
    }

    public function removeObjet(Objets $objet): self
    {
        if ($this->objets->removeElement($objet)) {
            $objet->removeSociete($this);
        }

        return $this;
    }
}
