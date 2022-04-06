<?php

namespace App;

use App\Interfaces\FactoryInterface;
use App\Interfaces\UpdaterInterface;
use App\Item;

class UpdaterFactory implements FactoryInterface
{
   
    public function create(string $updater, Item $item):UpdaterInterface
    {
        return new $updater($item);
    }

}