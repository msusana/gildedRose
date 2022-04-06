<?php

namespace App\Interfaces;

use App\Item;

interface UpdaterInterface
{
    public static function resolve(Item $item):bool;
    public function update():void;
}