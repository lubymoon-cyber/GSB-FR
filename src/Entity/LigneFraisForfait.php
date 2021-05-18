<?php

namespace App\Entity;

use App\Repository\LigneFraisForfaitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LigneFraisForfaitRepository::class)
 */
class LigneFraisForfait
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Justificatif::class, inversedBy="ligneFraisForfaits")
     */
    private $justificatif;

    /**
     * @ORM\ManyToOne(targetEntity=StatutLigne::class, inversedBy="ligneFraisForfaits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $statutLigneFraisForfait;

    /**
     * @ORM\ManyToOne(targetEntity=FraisForfait::class, inversedBy="ligneFraisForfaits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fraisForfait;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="ligneFraisForfaits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateurLigneFraisForfait;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateLigneFraisForfait;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreationLigneFraisForfait;

    /**
     * @ORM\ManyToOne(targetEntity=FicheFrais::class, inversedBy="ligneFraisForfaits")
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

    public function getStatutLigneFraisForfait(): ?StatutLigne
    {
        return $this->statutLigneFraisForfait;
    }

    public function setStatutLigneFraisForfait(?StatutLigne $statutLigneFraisForfait): self
    {
        $this->statutLigneFraisForfait = $statutLigneFraisForfait;

        return $this;
    }

    public function getFraisForfait(): ?FraisForfait
    {
        return $this->fraisForfait;
    }

    public function setFraisForfait(?FraisForfait $fraisForfait): self
    {
        $this->fraisForfait = $fraisForfait;

        return $this;
    }

    public function getUtilisateurLigneFraisForfait(): ?User
    {
        return $this->utilisateurLigneFraisForfait;
    }

    public function setUtilisateurLigneFraisForfait(?User $utilisateurLigneFraisForfait): self
    {
        $this->utilisateurLigneFraisForfait = $utilisateurLigneFraisForfait;

        return $this;
    }

    public function getDateLigneFraisForfait(): ?\DateTimeInterface
    {
        return $this->dateLigneFraisForfait;
    }

    public function setDateLigneFraisForfait(\DateTimeInterface $dateLigneFraisForfait): self
    {
        $this->dateLigneFraisForfait = $dateLigneFraisForfait;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getDateCreationLigneFraisForfait(): ?\DateTimeInterface
    {
        return $this->dateCreationLigneFraisForfait;
    }

    public function setDateCreationLigneFraisForfait(\DateTimeInterface $dateCreationLigneFraisForfait): self
    {
        $this->dateCreationLigneFraisForfait = $dateCreationLigneFraisForfait;

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
