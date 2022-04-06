<?php

namespace App;

use App\ItemClassifier;
use App\DirectorFactories;


final class GildedRose
{
    private array $items = [];
    private DirectorFactories $directory;

    public function __construct($items, DirectorFactories $directory )
    {
        $this->items = $items;
        $this->directory = $directory;

    }

    public function updateQuality()
    {
        foreach ($this->items as $item) {
            $this->updateItem($item);
        }
    }


    public function updateItem(Item $item)
    {
        $updater = $this->directory->itemClassifier->categorize($item);
      
        $instance = $this->directory->updaterFactory->create($updater, $item);
 
        $instance->update();


    }

    

}
