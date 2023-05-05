<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\ManyToOne(targetEntity=institut::class, inversedBy="institut_Id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $instit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }
        /**
     * Get instit
     *
     * @return \Entity\Institut
     */

    public function getInstit(): ?institut
    {
        return $this->instit;
    }
      /**
     * Set instit
     *
     * @param \Entity\Institut $instit
     *
     * @return etudiant
     */
    public function setInstit($instit)
    {
        $this->instit = $instit;

        return $this;
    }


    /*public function setInstit(?institut $instit): self
    {
        $this->instit = $instit;

        return $this;
    }*/
}
