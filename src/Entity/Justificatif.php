<?php

namespace App\Entity;

use App\Repository\JustificatifRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JustificatifRepository::class)
 */
class Justificatif
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="justificatifs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateurJustificatif;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreationJustificatif;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateProductionJustificatif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $chemin;

    /**
     * @ORM\ManyToMany(targetEntity=LigneFraisHorsForfait::class, mappedBy="justificatif")
     */
    private $ligneFraisHorsForfaits;

    /**
     * @ORM\ManyToMany(targetEntity=LigneFraisForfait::class, mappedBy="justificatif")
     */
    private $ligneFraisForfaits;

    public function __construct()
    {
        $this->ligneFraisHorsForfaits = new ArrayCollection();
        $this->ligneFraisForfaits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateurJustificatif(): ?User
    {
        return $this->utilisateurJustificatif;
    }

    public function setUtilisateurJustificatif(?User $utilisateurJustificatif): self
    {
        $this->utilisateurJustificatif = $utilisateurJustificatif;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateCreationJustificatif(): ?\DateTimeInterface
    {
        return $this->dateCreationJustificatif;
    }

    public function setDateCreationJustificatif(\DateTimeInterface $dateCreationJustificatif): self
    {
        $this->dateCreationJustificatif = $dateCreationJustificatif;

        return $this;
    }

    public function getDateProductionJustificatif(): ?\DateTimeInterface
    {
        return $this->dateProductionJustificatif;
    }

    public function setDateProductionJustificatif(\DateTimeInterface $dateProductionJustificatif): self
    {
        $this->dateProductionJustificatif = $dateProductionJustificatif;

        return $this;
    }

    public function getChemin(): ?string
    {
        return $this->chemin;
    }

    public function setChemin(string $chemin): self
    {
        $this->chemin = $chemin;

        return $this;
    }

    /**
     * @return Collection|LigneFraisHorsForfait[]
     */
    public function getLigneFraisHorsForfaits(): Collection
    {
        return $this->ligneFraisHorsForfaits;
    }

    public function addLigneFraisHorsForfait(LigneFraisHorsForfait $ligneFraisHorsForfait): self
    {
        if (!$this->ligneFraisHorsForfaits->contains($ligneFraisHorsForfait)) {
            $this->ligneFraisHorsForfaits[] = $ligneFraisHorsForfait;
            $ligneFraisHorsForfait->addJustificatif($this);
        }

        return $this;
    }

    public function removeLigneFraisHorsForfait(LigneFraisHorsForfait $ligneFraisHorsForfait): self
    {
        if ($this->ligneFraisHorsForfaits->removeElement($ligneFraisHorsForfait)) {
            $ligneFraisHorsForfait->removeJustificatif($this);
        }

        return $this;
    }

    /**
     * @return Collection|LigneFraisForfait[]
     */
    public function getLigneFraisForfaits(): Collection
    {
        return $this->ligneFraisForfaits;
    }

    public function addLigneFraisForfait(LigneFraisForfait $ligneFraisForfait): self
    {
        if (!$this->ligneFraisForfaits->contains($ligneFraisForfait)) {
            $this->ligneFraisForfaits[] = $ligneFraisForfait;
            $ligneFraisForfait->addJustificatif($this);
        }

        return $this;
    }

    public function removeLigneFraisForfait(LigneFraisForfait $ligneFraisForfait): self
    {
        if ($this->ligneFraisForfaits->removeElement($ligneFraisForfait)) {
            $ligneFraisForfait->removeJustificatif($this);
        }

        return $this;
    }
}
