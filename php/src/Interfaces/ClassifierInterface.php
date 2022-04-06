<?php

namespace App\Interfaces;

use App\Item;

interface ClassifierInterface
{
    public function categorize(Item $item):string;
    public function getFilenames():array;

}