<?php

namespace App\Data;

class SearchArtist
{
    public ?string $displayName = null;
    public ?int $beginDate = null;
    public ?int $endDate = null;
    public ?string $gender = null;
    public ?string $nationality = null;
    public int $limit = 50;
}
