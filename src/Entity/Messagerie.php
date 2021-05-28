<?php

namespace App\Entity;

use App\Repository\MessagerieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessagerieRepository::class)
 */
class Messagerie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="messageries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateurMessagerie;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="messageries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateurDestinataireMessagerie;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="messageries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateurExpediteurMessagerie;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etat;

    /**
     * @ORM\Column(type="boolean")
     */
    private $archive;

    /**
     * @ORM\Column(type="text")
     */
    private $objet;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateMessageMessagerie;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateurMessagerie(): ?User
    {
        return $this->utilisateurMessagerie;
    }

    public function setUtilisateurMessagerie(?User $utilisateurMessagerie): self
    {
        $this->utilisateurMessagerie = $utilisateurMessagerie;

        return $this;
    }

    public function getUtilisateurDestinataireMessagerie(): ?User
    {
        return $this->utilisateurDestinataireMessagerie;
    }

    public function setUtilisateurDestinataireMessagerie(?User $utilisateurDestinataireMessagerie): self
    {
        $this->utilisateurDestinataireMessagerie = $utilisateurDestinataireMessagerie;

        return $this;
    }

    public function getUtilisateurExpediteurMessagerie(): ?User
    {
        return $this->utilisateurExpediteurMessagerie;
    }

    public function setUtilisateurExpediteurMessagerie(?User $utilisateurExpediteurMessagerie): self
    {
        $this->utilisateurExpediteurMessagerie = $utilisateurExpediteurMessagerie;

        return $this;
    }

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getArchive(): ?bool
    {
        return $this->archive;
    }

    public function setArchive(bool $archive): self
    {
        $this->archive = $archive;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }

    public function getDateMessageMessagerie(): ?\DateTimeInterface
    {
        return $this->dateMessageMessagerie;
    }

    public function setDateMessageMessagerie(\DateTimeInterface $dateMessageMessagerie): self
    {
        $this->dateMessageMessagerie = $dateMessageMessagerie;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}