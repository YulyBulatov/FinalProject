<?php

namespace App\Entity;

use App\Repository\ChecklistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChecklistRepository::class)]
class Checklist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isChecked = null;

    #[ORM\ManyToMany(targetEntity: Document::class)]
    private Collection $document;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'checklists')]
    private Collection $username;

    public function __construct()
    {
        $this->document = new ArrayCollection();
        $this->username = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isIsChecked(): ?bool
    {
        return $this->isChecked;
    }

    public function setIsChecked(?bool $isChecked): self
    {
        $this->isChecked = $isChecked;

        return $this;
    }

    /**
     * @return Collection<int, Document>
     */
    public function getDocument(): Collection
    {
        return $this->document;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->document->contains($document)) {
            $this->document->add($document);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        $this->document->removeElement($document);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsername(): Collection
    {
        return $this->username;
    }

    public function addUsername(User $username): self
    {
        if (!$this->username->contains($username)) {
            $this->username->add($username);
        }

        return $this;
    }

    public function removeUsername(User $username): self
    {
        $this->username->removeElement($username);

        return $this;
    }
}
