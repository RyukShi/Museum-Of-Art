<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DatingArtworkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DatingArtworkRepository::class)]
class DatingArtwork
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $objectBeginDate = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $objectEndDate = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $objectDate = null;

    #[ORM\OneToMany(mappedBy: 'dating', targetEntity: Artwork::class)]
    private Collection $artworks;

    public function __construct()
    {
        $this->artworks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjectBeginDate(): ?int
    {
        return $this->objectBeginDate;
    }

    public function setObjectBeginDate(int $objectBeginDate): self
    {
        $this->objectBeginDate = $objectBeginDate;

        return $this;
    }

    public function getObjectEndDate(): ?int
    {
        return $this->objectEndDate;
    }

    public function setObjectEndDate(int $objectEndDate): self
    {
        $this->objectEndDate = $objectEndDate;

        return $this;
    }

    public function getObjectDate(): ?string
    {
        return $this->objectDate;
    }

    public function setObjectDate(string $objectDate): self
    {
        $this->objectDate = $objectDate;

        return $this;
    }

    public function __toString(): string
    {
        return $this->objectDate;
    }

    /**
     * @return Collection<int, Artwork>
     */
    public function getArtworks(): Collection
    {
        return $this->artworks;
    }

    public function addArtwork(Artwork $artwork): self
    {
        if (!$this->artworks->contains($artwork)) {
            $this->artworks->add($artwork);
            $artwork->setDating($this);
        }

        return $this;
    }

    public function removeArtwork(Artwork $artwork): self
    {
        if ($this->artworks->removeElement($artwork)) {
            // set the owning side to null (unless already changed)
            if ($artwork->getDating() === $this) {
                $artwork->setDating(null);
            }
        }

        return $this;
    }
}
