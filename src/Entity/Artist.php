<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $displayName = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $beginDate = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $endDate = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $gender = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $nationality = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $role = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $displayBio = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $alphaSort = null;

    #[ORM\Column(type: Types::STRING, length: 400, nullable: true)]
    private ?string $wikidataURL = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function setDisplayName(string $displayName): self
    {
        $this->displayName = $displayName;

        return $this;
    }

    public function getBeginDate(): ?int
    {
        return $this->beginDate;
    }

    public function setBeginDate(int $beginDate): self
    {
        $this->beginDate = $beginDate;

        return $this;
    }

    public function getEndDate(): ?int
    {
        return $this->endDate;
    }

    public function setEndDate(int $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getDisplayBio(): ?string
    {
        return $this->displayBio;
    }

    public function setDisplayBio(string $displayBio): self
    {
        $this->displayBio = $displayBio;

        return $this;
    }

    public function getAlphaSort(): ?string
    {
        return $this->alphaSort;
    }

    public function setAlphaSort(string $alphaSort): self
    {
        $this->alphaSort = $alphaSort;

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

    public function __toString(): string
    {
        return $this->displayName;
    }
}
