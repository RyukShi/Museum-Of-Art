<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ArtworkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToOne(inversedBy: 'artworks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classification $classification = null;

    #[ORM\ManyToOne(inversedBy: 'artworks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?City $city = null;

    #[ORM\ManyToOne(inversedBy: 'artworks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Country $country = null;

    #[ORM\ManyToOne(inversedBy: 'artworks')]
    private ?Dynasty $dynasty = null;

    #[ORM\ManyToOne(inversedBy: 'artworks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Excavation $excavation = null;

    #[ORM\ManyToOne(inversedBy: 'artworks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Period $period = null;

    #[ORM\ManyToOne(inversedBy: 'artworks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Region $region = null;

    #[ORM\ManyToOne(inversedBy: 'artworks')]
    private ?Reign $reign = null;

    #[ORM\ManyToOne(inversedBy: 'artworks')]
    private ?State $state = null;

    #[ORM\ManyToOne(inversedBy: 'artworks')]
    private ?Subregion $subregion = null;

    #[ORM\ManyToOne(inversedBy: 'artworks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Department $department = null;

    #[ORM\ManyToOne(inversedBy: 'artworks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DatingArtwork $dating = null;

    #[ORM\ManyToOne(inversedBy: 'artworks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Culture $culture = null;

    #[ORM\ManyToMany(targetEntity: Artist::class, mappedBy: 'artwork')]
    private Collection $artists;

    #[ORM\Column(type: Types::STRING, length: 400, nullable: true)]
    private ?string $wikidataURL = null;

    public function __construct()
    {
        $this->artists = new ArrayCollection();
    }

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

    public function getClassification(): ?Classification
    {
        return $this->classification;
    }

    public function setClassification(?Classification $classification): self
    {
        $this->classification = $classification;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getDynasty(): ?Dynasty
    {
        return $this->dynasty;
    }

    public function setDynasty(?Dynasty $dynasty): self
    {
        $this->dynasty = $dynasty;

        return $this;
    }

    public function getExcavation(): ?Excavation
    {
        return $this->excavation;
    }

    public function setExcavation(?Excavation $excavation): self
    {
        $this->excavation = $excavation;

        return $this;
    }

    public function getPeriod(): ?Period
    {
        return $this->period;
    }

    public function setPeriod(?Period $period): self
    {
        $this->period = $period;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getReign(): ?Reign
    {
        return $this->reign;
    }

    public function setReign(?Reign $reign): self
    {
        $this->reign = $reign;

        return $this;
    }

    public function getState(): ?State
    {
        return $this->state;
    }

    public function setState(?State $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getSubregion(): ?Subregion
    {
        return $this->subregion;
    }

    public function setSubregion(?Subregion $subregion): self
    {
        $this->subregion = $subregion;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getDating(): ?DatingArtwork
    {
        return $this->dating;
    }

    public function setDating(?DatingArtwork $dating): self
    {
        $this->dating = $dating;

        return $this;
    }

    public function getCulture(): ?Culture
    {
        return $this->culture;
    }

    public function setCulture(?Culture $culture): self
    {
        $this->culture = $culture;

        return $this;
    }

    /**
     * @return Collection<int, Artist>
     */
    public function getArtists(): Collection
    {
        return $this->artists;
    }

    public function addArtist(Artist $artist): self
    {
        if (!$this->artists->contains($artist)) {
            $this->artists->add($artist);
            $artist->addArtwork($this);
        }

        return $this;
    }

    public function removeArtist(Artist $artist): self
    {
        if ($this->artists->removeElement($artist)) {
            $artist->removeArtwork($this);
        }

        return $this;
    }

    public function getWikidataURL(): ?string
    {
        return $this->wikidataURL;
    }

    public function setWikidataURL(?string $wikidataURL): self
    {
        $this->wikidataURL = $wikidataURL;

        return $this;
    }
}
