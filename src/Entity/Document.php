<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentRepository::class)]
class Document
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\ManyToMany(targetEntity: source::class, inversedBy: 'documents')]
    private Collection $source;

    public function __construct()
    {
        $this->source = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, source>
     */
    public function getSource(): Collection
    {
        return $this->source;
    }

    public function addSource(source $source): self
    {
        if (!$this->source->contains($source)) {
            $this->source->add($source);
        }

        return $this;
    }

    public function removeSource(source $source): self
    {
        $this->source->removeElement($source);

        return $this;
    }
}
