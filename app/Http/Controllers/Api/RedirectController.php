<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UrlRepositoryInterface;

use function Illuminate\Support\now;

class RedirectController extends Controller
{
    public function __construct(private UrlRepositoryInterface $urlRepository)
    {}

    public function __invoke(string $slug)
    {
        $url = $this->urlRepository->findBySlug($slug);

        if(!$url)
        {
            abort(404);
        }

        if(!$url->is_active)
        {
            abort(404);
        }

        if($url->expires_at && $url->expires_at < now())
        {
            abort(404);
        }

        $url->increment('clicks_count');

        return redirect($url->original_url);

    }
}
