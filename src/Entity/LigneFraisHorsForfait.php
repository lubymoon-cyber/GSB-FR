<?php

namespace App\Entity;

use App\Repository\LigneFraisHorsForfaitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LigneFraisHorsForfaitRepository::class)
 */
class LigneFraisHorsForfait
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Justificatif::class, inversedBy="ligneFraisHorsForfaits")
     */
    private $justificatif;

    /**
     * @ORM\ManyToOne(targetEntity=StatutLigne::class, inversedBy="ligneFraisHorsForfaits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $statutLigneFraisHorsForfait;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="ligneFraisHorsForfaits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateurLigneFraisHorsForfait;

    /**
     * @ORM\Column(type="boolean")
     */
    private $horsClassification;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateLigneFraisHorsForfait;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreationLigneFraisHorsForfait;

    /**
     * @ORM\ManyToOne(targetEntity=FicheFrais::class, inversedBy="ligneFraisHorsForfaits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ficheFrais;

    public function __construct()
    {
        $this->justificatif = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Justificatif[]
     */
    public function getJustificatif(): Collection
    {
        return $this->justificatif;
    }

    public function addJustificatif(Justificatif $justificatif): self
    {
        if (!$this->justificatif->contains($justificatif)) {
            $this->justificatif[] = $justificatif;
        }

        return $this;
    }

    public function removeJustificatif(Justificatif $justificatif): self
    {
        $this->justificatif->removeElement($justificatif);

        return $this;
    }

    public function getStatutLigneFraisHorsForfait(): ?StatutLigne
    {
        return $this->statutLigneFraisHorsForfait;
    }

    public function setStatutLigneFraisHorsForfait(?StatutLigne $statutLigneFraisHorsForfait): self
    {
        $this->statutLigneFraisHorsForfait = $statutLigneFraisHorsForfait;

        return $this;
    }

    public function getUtilisateurLigneFraisHorsForfait(): ?User
    {
        return $this->utilisateurLigneFraisHorsForfait;
    }

    public function setUtilisateurLigneFraisHorsForfait(?User $utilisateurLigneFraisHorsForfait): self
    {
        $this->utilisateurLigneFraisHorsForfait = $utilisateurLigneFraisHorsForfait;

        return $this;
    }

    public function getHorsClassification(): ?bool
    {
        return $this->horsClassification;
    }

    public function setHorsClassification(bool $horsClassification): self
    {
        $this->horsClassification = $horsClassification;

        return $this;
    }

    public function getDateLigneFraisHorsForfait(): ?\DateTimeInterface
    {
        return $this->dateLigneFraisHorsForfait;
    }

    public function setDateLigneFraisHorsForfait(\DateTimeInterface $dateLigneFraisHorsForfait): self
    {
        $this->dateLigneFraisHorsForfait = $dateLigneFraisHorsForfait;

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

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDateCreationLigneFraisHorsForfait(): ?\DateTimeInterface
    {
        return $this->dateCreationLigneFraisHorsForfait;
    }

    public function setDateCreationLigneFraisHorsForfait(\DateTimeInterface $dateCreationLigneFraisHorsForfait): self
    {
        $this->dateCreationLigneFraisHorsForfait = $dateCreationLigneFraisHorsForfait;

        return $this;
    }

    public function getFicheFrais(): ?FicheFrais
    {
        return $this->ficheFrais;
    }

    public function setFicheFrais(?FicheFrais $ficheFrais): self
    {
        $this->ficheFrais = $ficheFrais;

        return $this;
    }
}
