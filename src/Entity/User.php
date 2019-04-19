<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Recette", mappedBy="user")
     */
    private $recettes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="user")
     */
    private $usercommentaire;

    public function __construct()

    {
        parent::__construct();
        $this->recettes = new ArrayCollection();
        $this->usercommentaire = new ArrayCollection();
    }

    /**
     * @return Collection|Recette[]
     */
    public function getRecettes(): Collection
    {
        return $this->recettes;
    }

    public function addRecette(Recette $recette): self
    {
        if (!$this->recettes->contains($recette)) {
            $this->recettes[] = $recette;
            $recette->setUser($this);
        }

        return $this;
    }

    public function removeRecette(Recette $recette): self
    {
        if ($this->recettes->contains($recette)) {
            $this->recettes->removeElement($recette);
            // set the owning side to null (unless already changed)
            if ($recette->getUser() === $this) {
                $recette->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getUsercommentaire(): Collection
    {
        return $this->usercommentaire;
    }

    public function addUsercommentaire(Comment $usercommentaire): self
    {
        if (!$this->usercommentaire->contains($usercommentaire)) {
            $this->usercommentaire[] = $usercommentaire;
            $usercommentaire->setUser($this);
        }

        return $this;
    }

    public function removeUsercommentaire(Comment $usercommentaire): self
    {
        if ($this->usercommentaire->contains($usercommentaire)) {
            $this->usercommentaire->removeElement($usercommentaire);
            // set the owning side to null (unless already changed)
            if ($usercommentaire->getUser() === $this) {
                $usercommentaire->setUser(null);
            }
        }

        return $this;
    }
}
