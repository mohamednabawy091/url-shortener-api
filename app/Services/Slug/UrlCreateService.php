<?php

namespace App\Services\Slug;

use App\Models\Url;
use App\Repositories\Contracts\UrlRepositoryInterface;
use App\Services\Slug\SlugGenerateService;

class UrlCreateService 
{
    public function __construct(private SlugGenerateService $slugGenerateService, private UrlRepositoryInterface $urlRepository)
    {}

    public function createUrl (array $data):Url
    {
        $slug = $data['custom_slug'] ?? $this->slugGenerateService->generate();
        

        $url = $this->urlRepository->create([
            'user_id' => auth()->user->id,
            'original_url' => $data['original_url'],
            'slug' => $slug
        ]);

        return $url;
    }
}