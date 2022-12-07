<?php

namespace App\Enums;

enum Priority: int
{
    // 基本情報
    case HIGH = 1;
    case MIDDLE = 2;
    case LOW = 3;

    // 日本語を追加
    public function label(): string
    {
        return match($this)
        {
            Priority::HIGH => '高',
            Priority::MIDDLE => '中',
            Priority::LOW => '低',
        };
    }
}