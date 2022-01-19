<?php

namespace App\Library\Services;

use App\Library\Services\Contracts\CustomServiceInterface;

class Evanto implements CustomServiceInterface
{
    public function getData(): string
    {
        return 'Hello from Evanto';
    }
}
