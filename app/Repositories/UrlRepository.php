<?php

namespace App\Repositories;

use App\Models\Url;
use app\Repositories\Contracts\UrlRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class UrlRepository implements UrlRepositoryInterface
{
    private const CACHED_TTL = 3600;

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
        return Cache::remember(
            "slug:$slug",
            self::CACHED_TTL,
            function () use($slug){

                return Url::where('slug', $slug)->first();
            }
        );
    }
}