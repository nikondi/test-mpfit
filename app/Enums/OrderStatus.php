<?php

namespace App\Enums;

enum OrderStatus: string {
    case NEW = 'new';
    case DONE = 'done';

    public function getLabel(): string
    {
        return match ($this) {
            self::NEW => __('order.status.new'),
            self::DONE => __('order.status.done'),
        };
    }
}
