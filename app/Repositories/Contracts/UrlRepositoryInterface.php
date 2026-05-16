<?php

namespace App\Repositories\Contracts;

use App\Models\Url;

interface UrlRepositoryInterface 
{
    public function slugExists(string $slug): bool;
    public function create(array $data): Url;
    public function findBySlug(string $slug): ?Url;
}