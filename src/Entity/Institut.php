<?php

namespace App\Entity;

use App\Repository\InstitutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InstitutRepository::class)
 */
class Institut
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Etudiant::class, mappedBy="instit", orphanRemoval=true)
     */
    private $institut_Id;

    public function __construct()
    {
        $this->institut_Id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getInstitutId(): Collection
    {
        return $this->institut_Id;
    }

    public function addInstitutId(Etudiant $institutId): self
    {
        if (!$this->institut_Id->contains($institutId)) {
            $this->institut_Id[] = $institutId;
            $institutId->setInstit($this);
        }

        return $this;
    }

    public function removeInstitutId(Etudiant $institutId): self
    {
        if ($this->institut_Id->removeElement($institutId)) {
            // set the owning side to null (unless already changed)
            if ($institutId->getInstit() === $this) {
                $institutId->setInstit(null);
            }
        }

        return $this;
    }
}
