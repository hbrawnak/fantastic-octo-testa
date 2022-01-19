<?php

namespace App\Library\Services;

use App\Library\Services\Contracts\CustomServiceInterface;

class Decanto implements CustomServiceInterface
{

    public function getData()
    {
        return 'Decanto';
    }
}
