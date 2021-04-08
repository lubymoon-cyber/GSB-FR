<?php

namespace App\Entity;

use App\Repository\FicheFraisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FicheFraisRepository::class)
 */
class FicheFrais
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="ficheFrais")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateurFicheFrais;

    /**
     * @ORM\ManyToOne(targetEntity=EtatFiche::class, inversedBy="ficheFrais")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etatFicheFrais;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nbJustificatif;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFicheFrais;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreationFicheFrais;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateModificationFicheFrais;

    /**
     * @ORM\Column(type="integer")
     */
    private $montantValide;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateurFicheFrais(): ?User
    {
        return $this->utilisateurFicheFrais;
    }

    public function setUtilisateurFicheFrais(?User $utilisateurFicheFrais): self
    {
        $this->utilisateurFicheFrais = $utilisateurFicheFrais;

        return $this;
    }

    public function getEtatFicheFrais(): ?EtatFiche
    {
        return $this->etatFicheFrais;
    }

    public function setEtatFicheFrais(?EtatFiche $etatFicheFrais): self
    {
        $this->etatFicheFrais = $etatFicheFrais;

        return $this;
    }

    public function getNbJustificatif(): ?string
    {
        return $this->nbJustificatif;
    }

    public function setNbJustificatif(string $nbJustificatif): self
    {
        $this->nbJustificatif = $nbJustificatif;

        return $this;
    }

    public function getDateFicheFrais(): ?\DateTimeInterface
    {
        return $this->dateFicheFrais;
    }

    public function setDateFicheFrais(\DateTimeInterface $dateFicheFrais): self
    {
        $this->dateFicheFrais = $dateFicheFrais;

        return $this;
    }

    public function getDateCreationFicheFrais(): ?\DateTimeInterface
    {
        return $this->dateCreationFicheFrais;
    }

    public function setDateCreationFicheFrais(\DateTimeInterface $dateCreationFicheFrais): self
    {
        $this->dateCreationFicheFrais = $dateCreationFicheFrais;

        return $this;
    }

    public function getDateModificationFicheFrais(): ?\DateTimeInterface
    {
        return $this->dateModificationFicheFrais;
    }

    public function setDateModificationFicheFrais(\DateTimeInterface $dateModificationFicheFrais): self
    {
        $this->dateModificationFicheFrais = $dateModificationFicheFrais;

        return $this;
    }

    public function getMontantValide(): ?int
    {
        return $this->montantValide;
    }

    public function setMontantValide(int $montantValide): self
    {
        $this->montantValide = $montantValide;

        return $this;
    }
}
