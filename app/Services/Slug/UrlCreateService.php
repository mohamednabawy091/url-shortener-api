<?php

namespace App\Services\Slug;

use App\Models\Url;
use App\Repositories\Contracts\UrlRepositoryInterface;

class UrlCreateService 
{
    public function __construct(private ShortUrlEncoderService $shortUrlEncoderService, private UrlRepositoryInterface $urlRepository)
    {}

    public function createUrl (array $data):Url
    {
        //create first without slug
        $url = $this->urlRepository->create([
            'user_id' => auth()->user->id,
            'original_url' => $data['original_url'],
            'slug' => null
        ]);

        //generate slug from id or custom slug
            $slug = $data['custom_slug'] ?? $this->shortUrlEncoderService->encode($url->id);

        //update slug
            $url->update([
                'slug' => $slug
            ]);

        return $url;
    }
}