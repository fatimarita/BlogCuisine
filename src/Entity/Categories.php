<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
 */
class Categories
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
    private $salade;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $salees;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sucrees;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Recette", mappedBy="categories")
     */
    private $recettecategories;

    public function __construct()
    {
        $this->recettecategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalade(): ?string
    {
        return $this->salade;
    }

    public function setSalade(string $salade): self
    {
        $this->salade = $salade;

        return $this;
    }

    public function getSalees(): ?string
    {
        return $this->salees;
    }

    public function setSalees(string $salees): self
    {
        $this->salees = $salees;

        return $this;
    }

    public function getSucrees(): ?string
    {
        return $this->sucrees;
    }

    public function setSucrees(string $sucrees): self
    {
        $this->sucrees = $sucrees;

        return $this;
    }

    /**
     * @return Collection|Recette[]
     */
    public function getRecettecategories(): Collection
    {
        return $this->recettecategories;
    }

    public function addRecettecategory(Recette $recettecategory): self
    {
        if (!$this->recettecategories->contains($recettecategory)) {
            $this->recettecategories[] = $recettecategory;
            $recettecategory->setCategories($this);
        }

        return $this;
    }

    public function removeRecettecategory(Recette $recettecategory): self
    {
        if ($this->recettecategories->contains($recettecategory)) {
            $this->recettecategories->removeElement($recettecategory);
            // set the owning side to null (unless already changed)
            if ($recettecategory->getCategories() === $this) {
                $recettecategory->setCategories(null);
            }
        }

        return $this;
    }
}