<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupeRepository::class)
 */
class Groupe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="groupe")
     */
    private $grp;

    public function __construct()
    {
        $this->grp = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, User>
     */
    public function getGrp(): Collection
    {
        return $this->grp;
    }

    public function addGrp(User $grp): self
    {
        if (!$this->grp->contains($grp)) {
            $this->grp[] = $grp;
            $grp->addGroupe($this);
        }

        return $this;
    }

    public function removeGrp(User $grp): self
    {
        if ($this->grp->removeElement($grp)) {
            $grp->removeGroupe($this);
        }

        return $this;
    }
}
