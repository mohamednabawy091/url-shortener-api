<?php

namespace App\Services\Slug;

use App\Repositories\Contracts\UrlRepositoryInterface;
use Illuminate\Support\Str;

class SlugGenerateService 
{

    public function __construct
                        (private UrlRepositoryInterface $urlRepository
                        ){}

    public function generate():string
    {
        $attempts = 0;
        do 
        {
            if(++$attempts > 10){
                throw new \RuntimeException('Failed to generate a unique slug.');
            }
            $slug = Str::random(6);
        } while ($this->urlRepository->slugExists($slug));

        return $slug;
    }
}