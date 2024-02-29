<?php

namespace Common\Admin\Sitemap;

use Common\Core\BaseController;
use Illuminate\Http\JsonResponse;

class SitemapController extends BaseController
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function generate(): JsonResponse
    {
        $sitemap = class_exists('App\Services\SitemapGenerator')
            ? app('App\Services\SitemapGenerator')
            : app(BaseSitemapGenerator::class);
        app($sitemap->generate());
        return $this->success([]);
    }
}
