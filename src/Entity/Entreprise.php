<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $department = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\OneToMany(mappedBy: 'entreprise', targetEntity: contact::class)]
    private Collection $pole;

    public function __construct()
    {
        $this->pole = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment(string $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, contact>
     */
    public function getPole(): Collection
    {
        return $this->pole;
    }

    public function addPole(contact $pole): self
    {
        if (!$this->pole->contains($pole)) {
            $this->pole->add($pole);
            $pole->setEntreprise($this);
        }

        return $this;
    }

    public function removePole(contact $pole): self
    {
        if ($this->pole->removeElement($pole)) {
            // set the owning side to null (unless already changed)
            if ($pole->getEntreprise() === $this) {
                $pole->setEntreprise(null);
            }
        }

        return $this;
    }
}
