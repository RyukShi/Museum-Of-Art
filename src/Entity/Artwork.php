<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ArtworkRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtworkRepository::class)]
class Artwork
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $objectName = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $dimensions = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $medium = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    private ?bool $isHighlight = false;

    #[ORM\Column(type: Types::BOOLEAN)]
    private ?bool $isPublicDomain = false;

    #[ORM\Column(type: Types::STRING, length: 400, nullable: true)]
    private ?string $primaryImage = null;

    #[ORM\Column(type: Types::STRING, length: 400, nullable: true)]
    private ?string $primaryImageSmall = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private array $additionalImages = [];

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $accessionYear = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjectName(): ?string
    {
        return $this->objectName;
    }

    public function setObjectName(string $objectName): self
    {
        $this->objectName = $objectName;

        return $this;
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

    public function getDimensions(): ?string
    {
        return $this->dimensions;
    }

    public function setDimensions(string $dimensions): self
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    public function getMedium(): ?string
    {
        return $this->medium;
    }

    public function setMedium(string $medium): self
    {
        $this->medium = $medium;

        return $this;
    }

    public function isIsHighlight(): ?bool
    {
        return $this->isHighlight;
    }

    public function setIsHighlight(bool $isHighlight): self
    {
        $this->isHighlight = $isHighlight;

        return $this;
    }

    public function isIsPublicDomain(): ?bool
    {
        return $this->isPublicDomain;
    }

    public function setIsPublicDomain(bool $isPublicDomain): self
    {
        $this->isPublicDomain = $isPublicDomain;

        return $this;
    }

    public function getPrimaryImage(): ?string
    {
        return $this->primaryImage;
    }

    public function setPrimaryImage(string $primaryImage): self
    {
        $this->primaryImage = $primaryImage;

        return $this;
    }

    public function getPrimaryImageSmall(): ?string
    {
        return $this->primaryImageSmall;
    }

    public function setPrimaryImageSmall(?string $primaryImageSmall): self
    {
        $this->primaryImageSmall = $primaryImageSmall;

        return $this;
    }

    public function getAdditionalImages(): array
    {
        return $this->additionalImages;
    }

    public function setAdditionalImages(?array $additionalImages): self
    {
        $this->additionalImages = $additionalImages;

        return $this;
    }

    public function getAccessionYear(): ?string
    {
        return $this->accessionYear;
    }

    public function setAccessionYear(string $accessionYear): self
    {
        $this->accessionYear = $accessionYear;

        return $this;
    }

    public function __toString(): string
    {
        return $this->title;
    }
}
