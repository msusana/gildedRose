<?php

namespace App\Interfaces;

use App\Item;
use App\Interfaces\UpdaterInterface;

interface FactoryInterface
{
    public function create(string $updater, Item $item):UpdaterInterface;

}