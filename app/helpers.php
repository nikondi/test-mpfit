<?php

use App\Services\PageService;

if(!function_exists('page')) {
    function page(): PageService {
        return app(PageService::class);
    }
}

if(!function_exists('format_price')) {
    function format_price(float|int $price): string {
        return number_format($price, 2, '.', ' ');
    }
}
