<?php

namespace App\Repositories;

use App\Models\Url;
use app\Repositories\Contracts\UrlRepositoryInterface;

class UrlRepository implements UrlRepositoryInterface
{
    public function slugExists(string $slug):bool
    {
        return Url::where('slug', $slug)->exists();
    }

    public function create(array $data): Url
    {
        return Url::create($data);
    }

    public function findBySlug(string $slug): ?Url
    {
        return Url::where('slug', $slug)
            ->first();
    }
    
}