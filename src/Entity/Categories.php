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
     * @ORM\OneToMany(targetEntity="App\Entity\Recette", mappedBy="categories")
     */
    private $recettecategories;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeCategories;

    public function __construct()
    {
        $this->recettecategories = new ArrayCollection();
    }

    public function __toString()
    {
       return $this->typeCategories;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTypeCategories(): ?string
    {
        return $this->typeCategories;
    }

    public function setTypeCategories(string $typeCategories): self
    {
        $this->typeCategories = $typeCategories;

        return $this;
    }
}
