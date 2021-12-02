<?php

namespace App\Entity;

use App\Repository\JoueurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JoueurRepository::class)
 */
class Joueur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $niveauEchec;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $niveauVolley;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $niveauTennis;

    /**
     * @ORM\ManyToMany(targetEntity=Equipe::class, inversedBy="joueurs")
     */
    private $Equipe;

    public function __construct()
    {
        $this->Equipe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNiveauEchec(): ?string
    {
        return $this->niveauEchec;
    }

    public function setNiveauEchec(?string $niveauEchec): self
    {
        $this->niveauEchec = $niveauEchec;

        return $this;
    }

    public function getNiveauVolley(): ?string
    {
        return $this->niveauVolley;
    }

    public function setNiveauVolley(?string $niveauVolley): self
    {
        $this->niveauVolley = $niveauVolley;

        return $this;
    }

    public function getNiveauTennis(): ?string
    {
        return $this->niveauTennis;
    }

    public function setNiveauTennis(?string $niveauTennis): self
    {
        $this->niveauTennis = $niveauTennis;

        return $this;
    }

    /**
     * @return Collection|Equipe[]
     */
    public function getEquipe(): Collection
    {
        return $this->Equipe;
    }

    public function addEquipe(Equipe $equipe): self
    {
        if (!$this->Equipe->contains($equipe)) {
            $this->Equipe[] = $equipe;
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): self
    {
        $this->Equipe->removeElement($equipe);

        return $this;
    }
}
