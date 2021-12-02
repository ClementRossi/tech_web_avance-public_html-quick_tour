<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipeRepository::class)
 */
class Equipe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $identifiant;

    /**
     * @ORM\Column(type="array")
     */
    private $ListeJoueur = [];

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $NiveauEquipe;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Club;

    /**
     * @ORM\ManyToMany(targetEntity=Joueur::class, mappedBy="Equipe")
     */
    private $joueurs;

    public function __construct()
    {
        $this->joueurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function setIdentifiant(string $identifiant): self
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    public function getListeJoueur(): ?array
    {
        return $this->ListeJoueur;
    }

    public function setListeJoueur(array $ListeJoueur): self
    {
        $this->ListeJoueur = $ListeJoueur;

        return $this;
    }

    public function getNiveauEquipe(): ?int
    {
        return $this->NiveauEquipe;
    }

    public function setNiveauEquipe(?int $NiveauEquipe): self
    {
        $this->NiveauEquipe = $NiveauEquipe;

        return $this;
    }

    public function getClub(): ?string
    {
        return $this->Club;
    }

    public function setClub(?string $Club): self
    {
        $this->Club = $Club;

        return $this;
    }

    /**
     * @return Collection|Joueur[]
     */
    public function getJoueurs(): Collection
    {
        return $this->joueurs;
    }

    public function addJoueur(Joueur $joueur): self
    {
        if (!$this->joueurs->contains($joueur)) {
            $this->joueurs[] = $joueur;
            $joueur->addEquipe($this);
        }

        return $this;
    }

    public function removeJoueur(Joueur $joueur): self
    {
        if ($this->joueurs->removeElement($joueur)) {
            $joueur->removeEquipe($this);
        }

        return $this;
    }
}
