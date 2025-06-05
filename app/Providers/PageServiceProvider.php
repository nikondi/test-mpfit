<?php

namespace App\Providers;

use App\Services\PageService;
use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(PageService::class, function () {
            return new PageService();
        });
    }

    public function boot(): void
    {
    }
}
