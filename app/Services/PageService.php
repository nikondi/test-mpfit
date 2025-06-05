<?php

namespace App\Services;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class PageService
{
    protected array $data = [];

    public function title(string $title): static
    {
        $this->data['title'] = $title;
        return $this;
    }

    public function render($view, $data = []): Response|View
    {
        return view($view, [...$this->data, ...$data]);
    }
}
