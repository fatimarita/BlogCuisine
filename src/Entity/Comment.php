<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $stars;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Recette", mappedBy="comment")
     */
    private $recettecommentaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="usercommentaire")
     */
    private $user;

    public function __construct()
    {
        $this->recettecommentaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getStars(): ?int
    {
        return $this->stars;
    }

    public function setStars(?int $stars): self
    {
        $this->stars = $stars;

        return $this;
    }

    /**
     * @return Collection|Recette[]
     */
    public function getRecettecommentaire(): Collection
    {
        return $this->recettecommentaire;
    }

    public function addRecettecommentaire(Recette $recettecommentaire): self
    {
        if (!$this->recettecommentaire->contains($recettecommentaire)) {
            $this->recettecommentaire[] = $recettecommentaire;
            $recettecommentaire->setComment($this);
        }

        return $this;
    }

    public function removeRecettecommentaire(Recette $recettecommentaire): self
    {
        if ($this->recettecommentaire->contains($recettecommentaire)) {
            $this->recettecommentaire->removeElement($recettecommentaire);
            // set the owning side to null (unless already changed)
            if ($recettecommentaire->getComment() === $this) {
                $recettecommentaire->setComment(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
